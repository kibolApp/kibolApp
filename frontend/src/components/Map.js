import React, { useState, useEffect } from 'react';
import { MapContainer, TileLayer, Marker, Popup, useMapEvents, Polygon, Rectangle, Tooltip } from 'react-leaflet';
import 'leaflet/dist/leaflet.css';
import MarkerClusterGroup from 'react-leaflet-cluster';
import axiosClient from "../axiosClient";
import { Icon } from 'leaflet';
import { Link } from 'react-router-dom';

const CustomMap = () => {
  const center = [52.0, 19.0];
  const zoom = 6;
  const polandBounds = [
    [49.002304, 14.122253],
    [54.835556, 24.145867]
  ];

  const [markersData, setMarkersData] = useState([]);
  const userLocationIcon = new Icon({ iconUrl: 'https://i.imgur.com/iulwF9C.png', iconSize: [32, 32] });

  useEffect(() => {
    axiosClient.get('/clubs')
      .then(({ data }) => {
        console.log(data);
        const transformedData = data.map(club => ({
          team: club.team,
          location: [club.latitude, club.longitude],
          address: club.address,
          icon: new Icon({ iconUrl: club.url_logo, iconSize: [46, 46] }),
          url:"/clubpage/" + club.url,
          //area: club.area, TU będzie
          areas: [
            [
              [club.latitude - 0.01, club.longitude - 0.01],
              [club.latitude + 0.01, club.longitude + 0.01],
            ],
            [
              [club.latitude, club.longitude - 0.02],
              [club.latitude + 0.02, club.longitude],
              [club.latitude, club.longitude + 0.02],
            ],
          ],
        }));
        setMarkersData(transformedData);
      })
      .catch(err => {
        console.error(err);
      });
  }, []);

  const LocationMarker = () => {
    const [position, setPosition] = useState(null);
    const map = useMapEvents({
      contextmenu() {
        map.locate();
      },
      locationfound(e) {
        setPosition(e.latlng);
        map.flyTo(e.latlng, 16);
      },
    });

    return position === null ? null : (
      <Marker position={position} icon={userLocationIcon}>
        <Popup>Your Localization</Popup>
      </Marker>
    );
  };

  return (
    <div className="w-9/12 h-9/12 mx-7 my-5">
      <MapContainer
        center={center}
        zoom={zoom}
        className="h-screen rounded-2xl"
        maxBoundsViscosity={0.9}
        minZoom={6}
        maxZoom={18}
        maxBounds={polandBounds}
        attributionControl={false}
        scrollWheelZoom={true}
        doubleClickZoom={false}
        zoomControl={true}
      >
        <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />
        <LocationMarker />
        <MarkerClusterGroup>
          {markersData.map((marker, index) => (
            <div key={index}>
              {marker.areas.map((area, areaIndex) => (
                <Polygon
                  key={`area-${index}-${areaIndex}`}
                  pathOptions={{ color: 'purple' }}
                  positions={area}
                >
                  <Tooltip sticky>Obszar dla {marker.team}</Tooltip>
                </Polygon>
              ))}
              <Marker key={index} position={marker.location} icon={marker.icon}>
                <Popup>
                  <div>
                    <Link to={marker.url}><h2 className="text-center text-custom-brown font-semibold">{marker.team}</h2></Link>
                    <p>{marker.address}</p>
                  </div>
                </Popup>
              </Marker>
            </div>
          ))}
        </MarkerClusterGroup>
      </MapContainer>
    </div>
  );
  
};

export default CustomMap;
