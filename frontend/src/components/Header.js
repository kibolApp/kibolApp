import React from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

export default function Header() {
  const { i18n } = useTranslation();

  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
    notify();
  };

  const data = [
    "https://i.imgur.com/AMBEfm7.png", //arrow
    "https://i.imgur.com/IEmbAX2.png", //logo
    "https://i.imgur.com/m5aXfio.png", //Polska
    "https://i.imgur.com/rQiArPt.png" //GB
  ];

  const notify = () => {
    const message = i18n.language === 'pl' ? 'Zmieniono język!' : 'Language change!';
    
    toast.success(message, {
      position: "top-left",
      autoClose: 200,
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
          <img src={data[0]} alt="LeftIcon" className="h-16 rounded-full shadow-lg drop-shadow-lg hover:opacity-80 hover:scale-110 hover:bg-custom-sand transition duration-300 ease-in-out" />
        </Link>
      </button>
      
      <div className="flex items-center space-x-4">
        <div className="flex flex-col justify-center">
          <button onClick={() => changeLanguage('pl')} ><img src={data[2]} alt="Poland Flag" className="h-8 w-12 object-cover mb-2 rounded-md border-solid"/></button>
          <button onClick={() => changeLanguage('en')}><img src={data[3]} alt="GB Flag" className="h-8 w-12 object-cover rounded-md border-solid"/></button>
        </div>
        <img src={data[1]} alt="RightIcon" className="h-20 border-2 border-custom-sand" />
      </div>
    </header>
  );
};
