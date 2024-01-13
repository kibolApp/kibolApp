import React from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';
import polska from '../assets/polska.png';
import gb from '../assets/gb.png';
import logoblack from '../assets/logoblack.png';
import banner from '../assets/banner.jpg';

export default function HomeHeader() {
const { t } = useTranslation();

  const changeLanguage = (lng) => {
    t.changeLanguage(lng);
  };

const data = [
    logoblack, //logo
    banner, //baner
    polska, //Polska
    gb //GB
    ];
    
return (
    <header className="fixed top-0 left-0 w-full flex items-center justify-between bg-black bg-opacity-50 px-10 py-2 z-10">
    <div className="flex items-center">
        <img src={data[0]} alt="KibolAPP Logo" className="h-16" />
        <div className="flex">
        <button onClick={() => changeLanguage('pl')}><img src={data[2]} alt="Poland Flag" className="h-8 w-12 object-cover mb-2 rounded-md border-solid"/></button>
        <button onClick={() => changeLanguage('en')}><img src={data[3]} alt="GB Flag" className="h-8 w-12 object-cover rounded-md border-solid"/></button>
        </div>
      </div>

    <nav className='flex-grow font-body'>
      <ul className="flex justify-end">
        <li className="text-white mx-4 font-semibold">
          <Link to="/home" className="hover:text-gray-300 text-green-500">{t('start')}</Link>
        </li>
        <li className="text-white mx-4 font-semibold">
          <Link to="/app" className="hover:text-gray-300">{t('clubLocations')}</Link>
        </li>
        <li className="text-white mx-4 font-semibold">
          <Link to="/clublist" className="hover:text-gray-300">{t('clubList')}</Link>
        </li>
        <li className="text-white mx-4 font-semibold">
          <Link to="/auth" className="hover:text-gray-300">{t('loginRegister')}</Link>
        </li>
      </ul>
    </nav>
</header>
);
};
