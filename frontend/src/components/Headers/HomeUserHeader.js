import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';

export default function HomeUserHeader() {

    const [isSticky, setIsSticky] = useState(false);
    const { t } = useTranslation();

    useEffect(() => {
        const handleScroll = () => {
          setIsSticky(window.scrollY > 0);
        };
    
        window.addEventListener('scroll', handleScroll);
    
        return () => {
          window.removeEventListener('scroll', handleScroll);
        };
      }, []);

      const data = [
        "https://i.imgur.com/fv4tZQm.png", //logo black
        "https://i.imgur.com/IEmbAX2.png", //logo brown
        "https://i.imgur.com/F6Iag9a.png", //user
        "https://i.imgur.com/m5aXfio.png", //Polska
        "https://i.imgur.com/rQiArPt.png" //GB
        ];

    const { i18n } = useTranslation();
    const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
    } 

    return(
        <header className={`${isSticky ? 'bg-custom-brown' : 'bg-black bg-opacity-50'} fixed font-body top-0 left-0 w-full z-10 transition-all ease-in-out duration-1000`}>
        <div className="flex items-center justify-between w-full px-10 py-5">
            <div className="flex items-center space-x-4">
                <div className="relative h-16">
                <img src={data[0]} alt="KibolAPP Logo" className={`top-0 left-0 h-16 w-26 object-contain transition-opacity ease-in-out duration-1000 ${isSticky ? 'opacity-0' : 'opacity-100'}`}/>
                <img src={data[1]} alt="Sticky Logo" className={`absolute top-0 left-0 h-16 w-26 object-contain transition-opacity ease-in-out duration-1000 ${!isSticky ? 'opacity-0' : 'opacity-100'}`}/>          
                </div>
                <div className="flex flex-col justify-center">
                    <button onClick={() => changeLanguage('pl')}><img src={data[3]} alt="Poland Flag" className="h-8 w-12 object-cover mb-2 rounded-md border-solid"/></button>
                    <button onClick={() => changeLanguage('en')}><img src={data[4]} alt="GB Flag" className="h-8 w-12 object-cover rounded-md border-solid"/></button>
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
                        <img src={data[2]} alt="RightIcon" className="h-20" />
                    </Link>
                    </button>
                </ul>
            </nav>
        </div>
    </header>
    );
}