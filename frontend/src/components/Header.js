import React from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import polska from '../assets/polska.png';
import gb from '../assets/gb.png';
import logobrown from '../assets/logobrown.png';
import arrow from '../assets/arrow.png';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faArrowLeft } from '@fortawesome/free-solid-svg-icons';

export default function Header() {
  const { i18n } = useTranslation();

  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
    notify();
  };

  const data = [
    logobrown,
    polska,
    gb,
    arrow
  ];

  const notify = () => {
    const message = i18n.language === 'pl' ? 'Zmieniono język!' : 'Language changed!';
    
    toast.success(message, {
      position: "top-left",
      autoClose: 1000,
      hideProgressBar: false,
      closeOnClick: true,
      pauseOnHover: true,
      draggable: true,
      progress: undefined,
      theme: "dark",
    });
  };
  

  return (
    <header className="flex justify-between items-center p-5 bg-custom-brown">
      <button>
        <Link to="/">
          <FontAwesomeIcon icon={faArrowLeft} className="h-12 mx-5 text-white hover:opacity-80 hover:scale-110 transition duration-300 ease-in-out" />
        </Link>
      </button>
      
      <div className="flex items-center space-x-4">
        <div className="flex flex-col justify-center">
          <button onClick={() => changeLanguage('pl')} ><img src={data[1]} alt="Poland Flag" className="h-8 w-12 object-cover mb-2 rounded-md border-solid"/></button>
          <button onClick={() => changeLanguage('en')}><img src={data[2]} alt="GB Flag" className="h-8 w-12 object-cover rounded-md border-solid"/></button>
        </div>
        <img src={data[0]} alt="RightIcon" className="h-20 border-2 border-custom-sand" />
      </div>
    </header>
  );
};
