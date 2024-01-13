import React from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';
import NavigationLinks from '../components/NavigationsLinks';
import polska from '../assets/polska.png';
import gb from '../assets/gb.png';
import logoblack from '../assets/logoblack.png';

export default function UserHeader() {
const { t } = useTranslation();
const { i18n } = useTranslation();
const changeLanguage = (lng) => {
  i18n.changeLanguage(lng);
}

const data = [
    logoblack, //logo black
    polska, //Polska
    gb //GB
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
      <button onClick={() => changeLanguage('pl')}><img src={data[1]} alt="Poland Flag" className="h-8 w-12 object-cover mb-2 rounded-md border-solid"/></button>
      <button onClick={() => changeLanguage('en')}><img src={data[2]} alt="GB Flag" className="h-8 w-12 object-cover rounded-md border-solid"/></button>
    </div>
  </div>

      
      <div className="flex items-center space-x-4 font-body">
      <nav className='flex-grow'>
          <ul className="flex justify-end">
           <NavigationLinks />
          </ul>
        </nav>
      </div>
    </header>
);
};
