import React from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';

export default function UserHeader() {
const { t } = useTranslation();
const { i18n } = useTranslation();
const changeLanguage = (lng) => {
  i18n.changeLanguage(lng);
}

const data = [
    "https://i.imgur.com/fv4tZQm.png", //logo black
    "https://i.imgur.com/GKDLtl5.png", //User Profile
    "https://i.imgur.com/m5aXfio.png", //Polska
    "https://i.imgur.com/rQiArPt.png" //GB
    ];
    
return (
  <header className="flex top-0 left-0 w-full justify-between items-center bg-custom-brown px-10 py-4 z-10">
  <div className="flex items-center">
    <button>
      <Link to="/">
        <img src={data[0]} alt="LeftIcon" className="h-16 bg-custom-gray rounded-xl shadow-lg drop-shadow-lg hover:opacity-80 hover:scale-110 hover:bg-custom-gray-dark transition duration-300 ease-in-out" />
      </Link>
    </button>
    <div className="flex flex-col justify-center px-4">
      <button onClick={() => changeLanguage('pl')}><img src={data[2]} alt="Poland Flag" className="h-8 w-12 object-cover mb-2 rounded-md border-solid"/></button>
      <button onClick={() => changeLanguage('en')}><img src={data[3]} alt="GB Flag" className="h-8 w-12 object-cover rounded-md border-solid"/></button>
    </div>
  </div>

      
      <div className="flex items-center space-x-4 font-body">
      <nav className='flex-grow'>
          <ul className="flex justify-end">
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300"><Link to="/home">{t('start')}</Link></a>
            </li>
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300 "><Link to="/app">{t('clubLocations')}</Link></a>
            </li>
            <li className="text-white mx-4 font-semibold">
            <a className="hover:text-gray-300"><Link to="/clublist">{t('clubList')}</Link></a>
            </li>
          </ul>
        </nav>
        <button>
          <Link to="/Profile">
        <img src={data[1]} alt="RightIcon" className="h-24" />
          </Link>
        </button>
      </div>
    </header>
);
};
