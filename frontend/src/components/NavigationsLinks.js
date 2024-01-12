import React from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faHome, faMapMarkerAlt, faFutbol, faUser, faRightFromBracket } from '@fortawesome/free-solid-svg-icons';
import axiosClient from "../axiosClient";
import { useStateContext } from "../contexts/ContextProvider";

const NavigationLinks = () => {
  const { t } = useTranslation();
  const {setUser,setToken}=useStateContext();
  const handleLogout = async (e) => {

    axiosClient
      .post("/logout")
      .then(() => {
        setUser({});
        setToken(null);
        window.location.reload()
      });
  };


  return (
    <>
      <li className="text-white mx-2 sm-mobile:mx-3 md-mobile:mx-4 font-medium sm-mobile:font-semibold sm-mobile:mr-0 md-mobile:mr-0">
        <a className="hover:text-gray-300 flex items-center">
          <FontAwesomeIcon data-testid="home-icon" icon={faHome} size="lg" className="mr-1"/>
          <span className="hidden lg-mobile:inline"><Link to="/home">{t('start')}</Link></span>
        </a>
      </li>
      <li className="text-white mx-2 sm-mobile:mx-3 md-mobile:mx-4 font-medium sm-mobile:font-semibold sm-mobile:mr-0 md-mobile:mr-0">
        <a className="hover:text-gray-300 flex items-center">
          <FontAwesomeIcon data-testid="map-marker-icon" icon={faMapMarkerAlt} size="lg" className="mr-1" />
          <span className="hidden lg-mobile:inline"><Link to="/app">{t('clubLocations')}</Link></span>
        </a>
      </li>
      <li className="text-white mx-2 sm-mobile:mx-3 md-mobile:mx-4 font-medium sm-mobile:font-semibold sm-mobile:mr-0 md-mobile:mr-0" >
        <a className="hover:text-gray-300 flex items-center">
          <FontAwesomeIcon data-testid="futbol-icon" icon={faFutbol} size="lg" className="mr-1"/>
          <span className="hidden lg-mobile:inline"><Link to="/clublist">{t('clubList')}</Link></span>
        </a>
      </li>
      <li className="text-white mx-2 sm-mobile:mx-3 md-mobile:mx-4 font-medium sm-mobile:font-semibold sm-mobile:mr-0 md-mobile:mr-0" >
        <a className="hover:text-gray-300 flex items-center">
          <FontAwesomeIcon icon={faUser} size="lg" className="mr-1" />
          <span className="hidden lg-mobile:inline"><Link to="/Profile">{t('profile')}</Link></span>
        </a>
      </li>
      <li className="text-white mx-2 sm-mobile:mx-3 md-mobile:mx-4 font-medium sm-mobile:font-semibold sm-mobile:mr-0 md-mobile:mr-0">
        <a className="hover:text-gray-300 flex items-center">
          <FontAwesomeIcon onClick={handleLogout} icon={faRightFromBracket} size="lg" className="mr-1" />
        </a>
      </li>
    </>
  );
};

export default NavigationLinks;