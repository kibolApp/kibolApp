import React, { useState, useEffect } from 'react';
import { MapContainer, TileLayer, Marker, Popup, useMapEvents, Polygon, Tooltip, LayersControl, FeatureGroup } from 'react-leaflet';
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
  var [areasData,setareasData]=useState([])
 

  useEffect(() => {
    
    const fetchData = async () => {
      try {
        const areasResponse = await axiosClient.get('/getlongandlatforborders');
        setareasData(areasResponse.data);
        
        const clubsResponse = await axiosClient.get('/clubs');
        const transformedData = await Promise.all(
          clubsResponse.data.map(async (club) => {
            const clubAreas = await getValidClubAreas(club.team);
            return {
              id: club.id,
              team: club.team,
              location: [club.latitude, club.longitude],
              address: club.address,
              icon: new Icon({ iconUrl: club.url_logo, iconSize: [46, 46] }),
              url: "/clubpage/" + club.url,
              areas: clubAreas,
            };
          })
        );
  
        setMarkersData(transformedData);
        console.log(markersData)
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };
  
    fetchData();
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

  const getValidClubAreas = (team) => {
    const clubData = areasData.find(array => array.some(item => item && item.name === team));
    if (clubData) {
      const validData = clubData.filter(item => item.lat !== null && item.lng !== null);
      const validAreas = validData.map(({ lat, lng }) => ({ lat, lng }));
      return validAreas;
    } else {
      return [];
    }
  };

  return (
    <div className="w-11/12 h-11/12 mx-24">
      <MapContainer
        center={center}
        zoom={13}
        className="h-screen rounded-2xl"
        maxBoundsViscosity={0.9}
        minZoom={6}
        maxZoom={18}
        attributionControl={false}
        scrollWheelZoom={true}
        doubleClickZoom={false}
        zoomControl={true}
      >
        <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />
        <LayersControl position="topright">
          <LocationMarker />
          <LayersControl.Overlay name="Areas" checked={true}>
          {markersData.map((marker, index) => (
            
            <FeatureGroup pathOptions={{ color: 'red' }} >
                <div key={index}>
                 {marker.areas.map((area, areaIndex) => (
                  <Polygon
                  key={`area-${areaIndex}-${marker.team}`}  // Dodano klucz dla wymuszenia ponownego renderowania
                  pathOptions={{ color: 'red' }}
                  positions={area}
                  >
                    <Tooltip sticky>Obszar drużyny {marker.team}</Tooltip>
                  </Polygon>
                ))}
                </div>
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
    </div>
  );
};
export default CustomMap;
