import React from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faHome, faMapMarkerAlt, faFutbol } from '@fortawesome/free-solid-svg-icons';

const NavigationLinks = () => {
  const { t } = useTranslation();

  return (
    <>
      <li className="text-white mx-4 font-semibold">
        <a className="hover:text-gray-300">
          <FontAwesomeIcon data-testid="home-icon" icon={faHome} bounce size="lg" className="text-custom-gray"/>
          <Link to="/home">{t(' Start')}</Link>
        </a>
      </li>
      <li className="text-white mx-4 font-semibold">
        <a className="hover:text-gray-300">
          <FontAwesomeIcon data-testid="map-marker-icon" icon={faMapMarkerAlt} bounce size="lg" className="text-custom-gray" />
          <Link to="/app">{t(' ClubLocations')}</Link>
        </a>
      </li>
      <li className="text-white mx-4 font-semibold">
        <a className="hover:text-gray-300">
          <FontAwesomeIcon data-testid="futbol-icon" icon={faFutbol} bounce size="lg" className="text-custom-gray"/>
          <Link to="/clublist">{t(' ClubList')}</Link>
        </a>
      </li>
    </>
  );
};

export default NavigationLinks;