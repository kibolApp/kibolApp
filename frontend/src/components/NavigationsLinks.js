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
        console.log('1');
      });
  };


  return (
    <>
      <li className="text-white mx-4 font-semibold">
        <a className="hover:text-gray-300">
          <FontAwesomeIcon data-testid="home-icon" icon={faHome} size="lg" className=""/>
          <Link to="/home">{t(' Start')}</Link>
        </a>
      </li>
      <li className="text-white mx-4 font-semibold">
        <a className="hover:text-gray-300">
          <FontAwesomeIcon data-testid="map-marker-icon" icon={faMapMarkerAlt} size="lg" className="" />
          <Link to="/app">{t(' ClubLocations')}</Link>
        </a>
      </li>
      <li className="text-white mx-4 font-semibold">
        <a className="hover:text-gray-300">
          <FontAwesomeIcon data-testid="futbol-icon" icon={faFutbol} size="lg" className=""/>
          <Link to="/clublist">{t(' ClubList')}</Link>
        </a>
      </li>
      <li className="text-white mx-4 font-semibold">
        <a className="hover:text-gray-300">
          <FontAwesomeIcon icon={faUser} size="lg" className="" />
          <Link to="/Profile">{t(' Profile')}</Link>
        </a>
      </li>
      <li className="text-white mx-4 font-semibold">
        <a className="hover:text-gray-300">
          <FontAwesomeIcon onClick={handleLogout} icon={faRightFromBracket} size="lg" className="" />
        </a>
      </li>
    </>
  );
};

export default NavigationLinks;