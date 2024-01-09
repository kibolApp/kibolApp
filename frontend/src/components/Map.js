import React, { useState, useEffect } from 'react';
import { MapContainer, TileLayer, Marker, Popup, useMapEvents, Polygon, Tooltip } from 'react-leaflet';
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

  const areasData = [
    {
      team: "Cracovia Kraków",
      areas: [
        [
          { lat: 50.06213458295723, lng: 19.934340315138286 },
        { lat: 50.05557189565738, lng: 19.885426591545496 },
        { lat: 50.03185069902199, lng: 19.88848488407004 },
        { lat: 50.0251514855436, lng: 19.939623159272628 },
        { lat: 50.04163742969706, lng: 19.948513027112114 },
        { lat: 50.05913458295723, lng: 19.934340315138286 },
        ]],
    },
    {
      team: "Wisła Kraków",
      areas: [
        [
         { lat: 50.05721491636078, lng: 19.907203231912007 },
        { lat: 50.063258155128466, lng: 19.94805494702055 },
        { lat: 50.085634888833, lng: 19.9592726055117 },
        { lat: 50.11930541531717, lng: 19.90924538333519 },
        { lat: 50.086813198755834, lng: 19.869409276652732 },
        { lat: 50.059510553034045, lng: 19.878830850451436 },
        { lat: 50.05721491636078, lng: 19.907203231912007 },
        ]
      ],
    },
  ];

  useEffect(() => {
    axiosClient.get('/clubs')
      .then(({ data }) => {
        const transformedData = data.map(club => {
          const clubAreas = getClubAreas(club.team);
          return {
            team: club.team,
            location: [club.latitude, club.longitude],
            address: club.address,
            icon: new Icon({ iconUrl: club.url_logo, iconSize: [46, 46] }),
            url: "/clubpage/" + club.url,
            areas: clubAreas,
          };
        });
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

  const getClubAreas = (team) => {
    const clubData = areasData.find(item => item.team.toLowerCase() === team.toLowerCase());
    return clubData ? clubData.areas : [];
  };

  return (
    <div className="w-11/12 h-11/12 mx-24">
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
