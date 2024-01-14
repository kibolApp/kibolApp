import React, { useState, useEffect } from 'react';
import { MapContainer, TileLayer, Marker, Popup, useMapEvents, Polygon, Tooltip, LayersControl, FeatureGroup } from 'react-leaflet';
import 'leaflet/dist/leaflet.css';
import MarkerClusterGroup from 'react-leaflet-cluster';
import axiosClient from "../axiosClient";
import { Icon } from 'leaflet';
import { Link } from 'react-router-dom';
import map from '../assets/map.png';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';


const CustomMap = () => {
  const notify = () => {
    toast.warn("Uważaj na czerwone obszary", {
      position: "top-center",
      autoClose: 2000,
      limit: 1,
      hideProgressBar: false,
      newestOnTop: false,
      closeOnClick: true,
      rtl: false,
      pauseOnFocusLoss: false,
      draggable: true,
      pauseOnHover: true,
      theme: "dark",
      transition: "Bounce",
    });
  };
  const center = [52.0, 19.0];
  const polandBounds = [
    [49.002304, 14.122253],
    [54.835556, 24.145867]
  ];
  const [user, setUser] = useState(null);
  var [markersData, setMarkersData] = useState([]);
  const userLocationIcon = new Icon({ iconUrl: map, iconSize: [32, 32] });



  useEffect(() => {
    notify();
    axiosClient.get('/getCurrentUser')
      .then(({ data }) => {
        const payload = {
          name: data.club.team
        }
        axiosClient.get('/clubswithnegative', { params: payload })
          .then(({ data }) => {
            const transformedData = data.map(club => {
              return {
                team: club.team,
                location: [club.latitude, club.longitude],
                address: club.address,
                icon: new Icon({ iconUrl: club.url_logo, iconSize: [46, 46] }),
                url: "/clubpage/" + club.url,
                urlData: club.urlData ?? {},
              };
            });
            setMarkersData(transformedData);

          })
          .catch(err => {

          });
      });
  }, []);

  useEffect(() => {
    if (markersData.length > 0) {
    }
  }, [markersData]);


  const LocationMarker = () => {
    const [position, setPosition] = useState(null);
    const map = useMapEvents({
      mouseover() {
        map.locate();
      },
      locationfound(e) {
        setPosition(e.latlng);
        map.flyTo(e.latlng, 13);
      },
    });



    return position === null ? null : (
      <Marker position={position} icon={userLocationIcon}>
        <Popup>Your Localization</Popup>
      </Marker>
    );
  };


  return (
    <div className="w-11/12 h-11/12 mx-24">
      <MapContainer
        center={center}
        zoom={6}
        className="h-screen rounded-2xl"
        maxBoundsViscosity={0.9}
        minZoom={6}
        maxZoom={18}
        attributionControl={false}
        scrollWheelZoom={true}
        doubleClickZoom={false}
        zoomControl={true}
        maxBounds={polandBounds}
      >
        <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />
        <LayersControl position="topright">
          <LocationMarker />
          <LayersControl.Overlay name="Areas" checked={true}>

            {markersData.map((marker, index) => (
              console.log(markersData),
              <FeatureGroup key={index}>
                {Array.isArray(marker.urlData) && marker.urlData.length > 0 && (
                  <Polygon
                    pathOptions={{ color: 'red' }}
                    positions={marker.urlData.map(area => [area.lat, area.lng])}
                  >
                    <Tooltip sticky>Obszar drużyny {marker.team}</Tooltip>
                  </Polygon>
                )}
              </FeatureGroup>
            ))}
          </LayersControl.Overlay>

          <LayersControl.Overlay name="Clubs" checked={true}>
            <MarkerClusterGroup>
              {markersData.map((marker, index) => (
                <Marker key={index} position={marker.location} icon={marker.icon}>
                  <Popup>
                    <div>
                      <Link to={marker.url}><h2 className="text-center text-custom-brown font-semibold">{marker.team}</h2></Link>
                      <p>{marker.address}</p>
                    </div>
                  </Popup>
                </Marker>
              ))}
            </MarkerClusterGroup>
          </LayersControl.Overlay>
        </LayersControl>
      </MapContainer>
      <ToastContainer />
    </div>
  );
};
export default CustomMap;
