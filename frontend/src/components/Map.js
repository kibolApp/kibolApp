import React from 'react';
import { MapContainer, TileLayer } from 'react-leaflet';
import 'leaflet/dist/leaflet.css';

const Map = () => {
  const polandBounds = [
    [49.002304, 14.122253],
    [54.835556, 24.145867]
  ];

  return (
    <div className="w-9/12 h-9/12 mx-5 my-5">
      <MapContainer
        center={[52.0, 19.0]}
        zoom={6}
        className="h-screen rounded-2xl"
        maxBounds={polandBounds}
        maxBoundsViscosity={0.9}
        minZoom={6.2}
        maxZoom={19}
      >
        <TileLayer
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        />
      </MapContainer>
      </div>
    
  );
};

export default Map;
