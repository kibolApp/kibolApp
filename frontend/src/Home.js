import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';
import axiosClient from "./axiosClient";
import { useStateContext } from "./contexts/ContextProvider";

const Home = () => {

  const {setUser,setToken}=useStateContext();
  const [isSticky, setIsSticky] = useState(false);
  const { t } = useTranslation();
  const [formData, setFormData] = useState({
    username: '',
    email: '',
    message: '',
  });

  const { i18n } = useTranslation();

  const handleLogout = async (e) => {
    e.preventDefault();

    axiosClient
      .post("/logout")
      .then(() => {
        setUser({});
        setToken(null);
      });
  };

  const handleFormSubmit = async (e) => {
    e.preventDefault();
    await axiosClient.post('/send-email', formData);
  };

  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  }

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
  "https://i.imgur.com/JzWdITG.jpg", //banner
  "https://i.imgur.com/dSmkyv5.png", //aboutus
  "https://i.imgur.com/m5aXfio.png", //Polska
  "https://i.imgur.com/rQiArPt.png" //GB
  ];

const Banner = ({ backgroundImage }) => {
  return (
    <section className="relative w-full min-h-screen font-head bg-cover flex justify-center items-center" style={{ backgroundImage: `url(${backgroundImage})` }}>
      <h2 className="text-white text-8xl uppercase text-center leading-snug font-semibold">
        {t('welcome')}<br /> {t('kibol')}<span className="text-custom-tan">{t('APP')}</span>
      </h2>
    </section>
  );
};

return (
  <>
    <header className={`${isSticky ? 'bg-custom-brown' : 'bg-black bg-opacity-50'} fixed font-body top-0 left-0 w-full z-10 transition-all ease-in-out duration-1000`}>
      <div className="flex items-center justify-between w-full px-10 py-5">
        <div className="flex items-center space-x-4">
            <div className="relative h-16">
              <img src={data[0]} alt="KibolAPP Logo" className={`top-0 left-0 h-16 w-26 object-contain transition-opacity ease-in-out duration-1000 ${isSticky ? 'opacity-0' : 'opacity-100'}`}/>
              <img src={data[1]} alt="Sticky Logo" className={`absolute top-0 left-0 h-16 w-26 object-contain transition-opacity ease-in-out duration-1000 ${!isSticky ? 'opacity-0' : 'opacity-100'}`}/>          </div>
            <div className="flex flex-col justify-center">
            <button onClick={() => changeLanguage('pl')}><img src={data[4]} alt="Poland Flag" className="h-8 w-12 object-cover mb-2 rounded-md border-solid"/></button>
            <button onClick={() => changeLanguage('en')}><img src={data[5]} alt="GB Flag" className="h-8 w-12 object-cover rounded-md border-solid"/></button>
            </div>
        </div>
        <nav className='flex-grow'>
          <ul className="flex justify-end">
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300 text-green-500"><Link to="/home">{t('start')}</Link></a>
            </li>
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300"><Link to="/app">{t('clubLocations')}</Link></a>
            </li>
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300"><Link to="/clublist">{t('clubList')}</Link></a>
            </li>
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300"><Link to="/auth">{t('loginRegister')}</Link></a>
            </li>
            <li className="text-white mx-4 font-semibold">
          <button onClick={handleLogout} className="hover:text-gray-300">{t('logout')}</button>
        </li>
          </ul>
        </nav>
      </div>
    </header>

    <Banner backgroundImage={data[2]} />

    {/* About Us */}
    <section className="flex flex-col md:flex-row items-center font-body justify-center text-center bg-[#353230] text-white p-6 md:p-32">
      <div className="md:flex-1 md:mr-6">
        <h2 className="text-3xl font-bold mb-4">{t('aboutTitle')}</h2>
          <p className="text-lg mb-6">{t('aboutText1')}</p>
          <p className="text-lg mb-6">{t('aboutText2')}</p>
      </div>
      <div className="md:flex-1 max-w-md mx-auto">
        <img src={data[3]} alt="About Us" className="w-full h-auto rounded-lg" />
      </div>
    </section>

    {/* Contact Us */}
    <section className="bg-custom-sand font-body py-16">
      <div className="flex justify-center">
        <div className="max-w-2xl w-full">
          <h3 className="text-white text-3xl text-center mb-10 font-bold">{t('questionTitle')}<span className="text-custom-brown uppercase font-bold">{t('contactUs')}</span></h3>
            <form className="flex flex-col items-center">
              <div className="flex w-full mb-6">
                <input type="text" placeholder={t('usernamePlaceholder')} value={formData.username} maxLength={50} className="flex-1 bg-transparent border-b border-black text-black px-2 py-1 outline-none placeholder-black placeholder-opacity-50 mr-4" onChange={(e) => setFormData({ ...formData, username: e.target.value })} />
                <input type="email" placeholder={t('emailPlaceholder')} value={formData.email} maxLength={50} className="flex-1 bg-transparent border-b border-black text-black px-2 py-1 outline-none placeholder-black placeholder-opacity-50" onChange={(e) => setFormData({ ...formData, email: e.target.value })} />
              </div>
              <div className="w-full mb-6">
                <textarea placeholder={t('messagePlaceholder')} value={formData.message}maxLength={200} className="w-full bg-transparent border-b border-black text-black px-2 py-1 outline-none placeholder-black placeholder-opacity-50 h-24 resize-none" onChange={(e) => setFormData({ ...formData, message: e.target.value })} ></textarea>
              </div>
              <div className="w-full flex justify-center">
                <input type="submit" onClick={handleFormSubmit} value={t('sendMessage')} className="bg-custom-olive text-custom-sand uppercase tracking-widest cursor-pointer font-bold px-4 py-2" />
              </div>
            </form>
        </div>
      </div>
    </section>
    </>
  );
};

export default Home;
