import React from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';

export default function UserHeader() {

    const { t } = useTranslation();

      const data = [
        "https://i.imgur.com/AMBEfm7.png", //arrow
        "https://i.imgur.com/m5aXfio.png", //Polska
        "https://i.imgur.com/rQiArPt.png", //GB
        "https://i.imgur.com/F6Iag9a.png" //user
        ];

    const { i18n } = useTranslation();
    const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
    } 

    return(
        <header className="flex justify-between items-center p-5 bg-custom-brown">
        <button className='mr-4'>
            <Link to="/">
            <img src={data[0]} alt="LeftIcon" className="h-16 rounded-full shadow-lg drop-shadow-lg hover:opacity-80 hover:scale-110 hover:bg-custom-sand transition duration-300 ease-in-out" />
            </Link>
        </button>
      
        <div className="flex items-center space-x-4">
            <div className="flex flex-col justify-center">
                <button onClick={() => changeLanguage('pl')} ><img src={data[1]} alt="Poland Flag" className="h-8 w-12 object-cover mb-2 rounded-md border-solid"/></button>
                <button onClick={() => changeLanguage('en')}><img src={data[2]} alt="GB Flag" className="h-8 w-12 object-cover rounded-md border-solid"/></button>
            </div>
        </div>
        <nav className='flex-grow'>
            <ul className="flex justify-end items-center">
                <li className="text-white mx-6 font-semibold">
                    <a className="hover:text-gray-300 text-green-500"><Link to="/home">{t('start')}</Link></a>
                </li>
                <li className="text-white mx-6 font-semibold">
                    <a className="hover:text-gray-300"><Link to="/app">{t('clubLocations')}</Link></a>
                </li>
                <li className="text-white mx-6 font-semibold">
                    <a className="hover:text-gray-300"><Link to="/clubpage">{t('clubList')}</Link></a>
                </li>
                <li className="text-white mx-6 font-semibold">
                    <a className="hover:text-gray-300">Logout</a>
                </li>
                <button>
                <Link to="/Profile">
                    <img src={data[3]} alt="RightIcon" className="h-20" />
                </Link>
                </button>
            </ul>
        </nav>
    </header>
    );
}