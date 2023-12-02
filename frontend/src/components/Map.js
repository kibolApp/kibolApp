import React, { useState, useEffect } from 'react';
import { MapContainer, TileLayer, Marker, Popup, useMapEvents } from 'react-leaflet';
import 'leaflet/dist/leaflet.css';
import MarkerClusterGroup from 'react-leaflet-cluster';
import markersData from './markersData';

const LocationMarker = ({ clubs }) => {
  const [position, setPosition] = useState(null);
  const [nearestClub, setNearestClub] = useState(null);

  const map = useMapEvents({
    contextmenu() {
      locateUser(); 
    },
    locationfound(e) {
      setPosition(e.latlng);
      findNearestClub(e.latlng);
      map.flyTo(e.latlng, 18);
    },
  });

  const locateUser = () => {
    map.locate();
  };
  const findNearestClub = (userLocation) => {
    let minDistance = Infinity;
    let nearest = null;

    clubs.forEach((club) => {
      const distance = userLocation.distanceTo(club.location);
      if (distance < minDistance) {
        minDistance = distance;
        nearest = club;
      }
    });

    setNearestClub(nearest);
    setTimeout(() => {
      setNearestClub(null);
    }, 1);
  };

  useEffect(() => {
    if (nearestClub) {
      map.flyTo(nearestClub.location, 12);
    }
  }, [nearestClub, map]);

  return (
    <>
      {nearestClub && (
        <Marker position={nearestClub.location} icon={nearestClub.icon}>
          <Popup>
            <div>
              <h2 className="text-center text-custom-brown font-semibold">{nearestClub.team}</h2>
              <p>{nearestClub.address}</p>
            </div>
          </Popup>
        </Marker>
      )}
    </>
  );
};

const CustomMap = () => {
  const center = [52.0, 19.0];
  const zoom = 6;
  const polandBounds = [
    [49.002304, 14.122253],
    [54.835556, 24.145867]
  ];

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
        <MarkerClusterGroup>
          {markersData.map((marker, index) => (
            <Marker key={index} position={marker.location} icon={marker.icon}>
              <Popup>
                <div>
                  <h2 className="text-center text-custom-brown font-semibold">{marker.team}</h2>
                  <p>{marker.address}</p>
                </div>
              </Popup>
            </Marker>
          ))}
        </MarkerClusterGroup>
        <LocationMarker clubs={markersData} />
      </MapContainer>
    </div>
  );
};

export default CustomMap;