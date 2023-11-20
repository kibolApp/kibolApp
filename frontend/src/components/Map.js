import React from 'react';
import { MapContainer, TileLayer, Marker, Popup } from 'react-leaflet';
import 'leaflet/dist/leaflet.css';
import markers from './markersData';
import MarkerClusterGroup from 'react-leaflet-cluster'

const Map = () => {
  const polandBounds = [
    [49.002304, 14.122253],
    [54.835556, 24.145867]
  ];

  const center = [52.0, 19.0];
  const zoom = 6;

  return (
    <div className="w-9/12 h-9/12 mx-5 my-5">
      <MapContainer
        center={center}
        zoom={zoom}
        className="h-screen rounded-2xl"
        maxBounds={polandBounds}
        maxBoundsViscosity={0.9}
        minZoom={6}
        maxZoom={20}
      >
        <TileLayer
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        />
        <MarkerClusterGroup>   
        {markers.map((marker, index) => (
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
      </MapContainer>
    </div>
  );
};

export default Map;