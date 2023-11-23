import React from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';

export default function UserHeader() {
const { t } = useTranslation();

  const changeLanguage = (lng) => {
    t.changeLanguage(lng);
  };

const data = [
    "https://i.imgur.com/fv4tZQm.png", //logo black
    "https://i.imgur.com/F6Iag9a.png", //User Profile
    "https://i.imgur.com/m5aXfio.png", //Polska
    "https://i.imgur.com/rQiArPt.png" //GB
    ];
    
return (
    <header className="flex justify-between items-center p-5 bg-custom-brown">
      <button>
        <Link to="/">
          <img src={data[0]} alt="LeftIcon" className="h-16 bg-custom-gray rounded-full shadow-lg drop-shadow-lg hover:opacity-80 hover:scale-110 hover:bg-custom-gray-dark transition duration-300 ease-in-out" />
        </Link>
      </button>
      
      <div className="flex items-center space-x-4">
      <nav className='flex-grow'>
          <ul className="flex justify-end">
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300"><Link to="/home">{t('start')}</Link></a>
            </li>
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300 text-green-500"><Link to="/app">{t('clubLocations')}</Link></a>
            </li>
            <li className="text-white mx-4 font-semibold">
              <a href="#" className="hover:text-gray-300">{t('clubList')}</a>
            </li>
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300"><Link to="/auth">{t('loginRegister')}</Link></a>
            </li>
          </ul>
        </nav>
        <div className="flex flex-col justify-center">
          <button onClick={() => changeLanguage('pl')}><img src={data[2]} alt="Poland Flag" className="h-8 w-12 object-cover mb-2 rounded-md border-solid"/></button>
          <button onClick={() => changeLanguage('en')}><img src={data[3]} alt="GB Flag" className="h-8 w-12 object-cover rounded-md border-solid"/></button>
        </div>
        
        {/* User Logo */}
        <button>
        <img src={data[1]} alt="RightIcon" className="h-20" />
        </button>
      </div>
    </header>
);
};
