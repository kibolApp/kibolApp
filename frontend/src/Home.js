import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';
import axiosClient from "./axiosClient";
import { useStateContext } from "./contexts/ContextProvider";
import NavigationLinks from './components/NavigationsLinks';
import Modal from 'react-modal';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faFutbol, faExclamation } from '@fortawesome/free-solid-svg-icons';

const Home = () => {
  const [clubsData, setClubsData] = useState([]);
  const { setUser, setToken } = useStateContext();
  const [userClub, setUserClub] = useState(1)
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [isSticky, setIsSticky] = useState(false);
  const { t } = useTranslation();
  const [formData, setFormData] = useState({
    username: '',
    email: '',
    message: '',
  });
  const [selectedClub, setSelectedClub] = useState(null);
  const { i18n } = useTranslation();
  const [isDropdownOpen, setIsDropdownOpen] = useState(true);
  const [userlogin, setuserlogin] = useState([])




  const handleFormSubmit = async (e) => {
    e.preventDefault();
    await axiosClient.post('/send-email', formData);
  };

  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  }

  useEffect(() => {
    axiosClient.get('/getCurrentUser')
      .then(({ data }) => {
        setUserClub(data.club ?? [])
        setuserlogin(data.user)
      }
      )
    axiosClient.get('/clubsname')
      .then(({ data }) => {
        setClubsData(data)
      }
      )

    const handleScroll = () => {
      setIsSticky(window.scrollY > 0);
    };

    window.addEventListener('scroll', handleScroll);

    return () => {
      window.removeEventListener('scroll', handleScroll);
    };
  }, []);


  useEffect(() => {

    if (userClub === null || userClub.length === 0) {
      setIsModalOpen(true);
    } else {
      setIsModalOpen(false);
    }
  }, [userClub]);
  const closeEditModal = () => {
    setIsModalOpen(false);
  };




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
        <h2 className="text-white uppercase text-center leading-snug font-semibold 
                      sm-mobile:text-3xl 
                      md-mobile:text-4xl
                      lg-mobile:text-5xl 
                      tablet:text-6xl 
                      laptop:text-8xl 
                      large-laptop:text-8xl 
                      4k:text-12xl">
          {t('welcome')}<br /> {t('kibol')}<span className="text-custom-tan">{t('APP')}</span>
        </h2>
      </section>
    );


  };


  const handleClubSelection = (team) => {
    setSelectedClub(team);
  };

  const chanheUserClub = () => {
    const payload = {
      newClub: selectedClub
    }
    axiosClient.post(`/changeClub/${userlogin.id}`, payload)
      .then(setIsModalOpen(false))
  }




  return (
    <>
      <header className={`${isSticky ? 'bg-custom-brown' : 'bg-black bg-opacity-50'} fixed font-body top-0 left-0 w-full z-10 transition-all ease-in-out duration-1000`}>
        <div className="flex items-center justify-between w-full px-10 py-5">
          <div className="flex items-center space-x-4">
            <div className="relative h-16">
              <img src={data[0]} alt="KibolAPP Logo" className={`top-0 left-0 h-16 w-26 object-contain transition-opacity ease-in-out duration-1000 h-8 sm-mobile:h-12 md-mobile:h-12 lg-mobile:h-14 tablet:h-16 ${isSticky ? 'opacity-0' : 'opacity-100'}`} />
              <img src={data[1]} alt="Sticky Logo" className={`absolute top-0 left-0 h-16 w-26 object-contain transition-opacity ease-in-out duration-1000 h-8 sm-mobile:h-12 md-mobile:h-12 lg-mobile:h-14 tablet:h-16 ${!isSticky ? 'opacity-0' : 'opacity-100'}`} /></div>
            <div className="flex flex-col justify-center">
              <button onClick={() => changeLanguage('pl')}><img src={data[4]} alt="Poland Flag" className="h-8 w-full object-cover mb-2 rounded-md border-solid sm-mobile:h-7 md-mobile:h-8 tablet:w-10 tablet:h-8 sm-mobile:mb-1.5 md-mobile:mb-2" /></button>
              <button onClick={() => changeLanguage('en')}><img src={data[5]} alt="GB Flag" className="h-8 w-full object-cover rounded-md border-solid sm-mobile:h-7 md-mobile:h-8 tablet:w-10 tablet:h-8" /></button>
            </div>
          </div>
          <nav className='flex-grow'>
            <ul className="flex justify-end">
              <NavigationLinks />
            </ul>
          </nav>
        </div>
      </header>

      <Banner backgroundImage={data[2]} />

      {/* About Us */}
      <section className="flex flex-col md:flex-row items-center font-body justify-center text-center bg-[#353230] text-white p-6 md:p-32 
                        sm-mobile:p-6 
                        md-mobile:p-8 
                        lg-mobile:p-10 
                        tablet:p-12 
                        laptop:p-16 
                        large-laptop:p-20 
                        4k:p-24">
        <div className="md:flex-1 md:mr-6">
          <h2 className="font-bold mb-4 
                        sm-mobile:text-lg
                        md-mobile:text-xl 
                        lg-mobile:text-2xl 
                        tablet:text-2xl 
                        laptop:text-3xl 
                        large-laptop:text-3xl 
                        4k:text-5xl">{t('aboutTitle')}</h2>
          <p className="mb-6 text-base 
                        sm-mobile:text-sm 
                        md-mobile:text-md 
                        lg-mobile:text-md 
                        tablet:text-lg
                        laptop:text-lg
                        large-laptop:text-xl
                        4k:text-4xl">{t('aboutText1')}</p>
          <p className="mb-6 text-base 
                        sm-mobile:text-sm
                        md-mobile:text-md 
                        lg-mobile:text-md
                        tablet:text-lg 
                        laptop:text-lg 
                        large-laptop:text-xl
                        4k:text-4xl">{t('aboutText2')}</p>
        </div>
        <div className="md:flex-1 max-w-md mx-auto">
          <img src={data[3]} alt="About Us" className="w-full h-auto rounded-lg" />
        </div>
      </section>

      {/* Contact Us */}
      <section className="bg-custom-sand font-body py-16 
                        sm-mobile:py-6 
                        md-mobile:py-8 
                        lg-mobile:py-10 
                        tablet:py-12 
                        laptop:py-16 
                        large-laptop:py-20 
                        4k:py-24">
        <div className="flex justify-center">
          <div className="max-w-md w-full px-4 
                        sm-mobile:max-w-sm 
                        md-mobile:max-w-md 
                        lg-mobile:max-w-lg 
                        tablet:max-w-xl 
                        laptop:max-w-2xl 
                        large-laptop:max-w-2xl 
                        4k:max-w-4xl">
            <h3 className="text-white text-3xl text-center mb-10 font-bold">{t('questionTitle')}<span className="text-custom-brown uppercase font-bold">{t('contactUs')}</span></h3>
            <form className="flex flex-col items-center
                              sm-mobile:px-6 
                              md-mobile:px-6 
                              lg-mobile:px-8
                              tablet:px-10 
                              laptop:px-12 
                              large-laptop:px-16 
                              4k:px-20">
              <div className="flex w-full mb-6 
                              sm-mobile:flex-row 
                              md-mobile:flex-row 
                              lg-mobile:flex-row 
                              tablet:flex-row 
                              laptop:flex-row 
                              large-laptop:flex-row 
                              4k:flex-row">
                <input type="text" placeholder={t('usernamePlaceholder')} value={formData.username} maxLength={50}
                  className="flex-1 bg-transparent border-b border-black text-black px-1 py-1 outline-none placeholder-black placeholder-opacity-50 mb-4 
                                sm-mobile:mr-0 sm-mobile:mb-4 sm-mobile:w-2/12 sm-mobile:text-xs
                                md-mobile:mr-0 md-mobile:mb-4 md-mobile:w-11/12 md-mobile:text-sm
                                lg-mobile:mr-0 lg-mobile:mb-4 lg-mobile:w-11/12 lg-mobile:text-base
                                tablet:mr-4 tablet:mb-0 tablet:text-base
                                laptop:mr-4 laptop:mb-0 laptop:text-base
                                large-laptop:mr-4 large-laptop:mb-0 large-laptop:text-base
                                4k:mr-4 4k:mb-0 4k:text-2xl"
                  onChange={(e) => setFormData({ ...formData, username: e.target.value })} />
                <input type="email" placeholder={t('emailPlaceholder')} value={formData.email} maxLength={50}
                  className="flex-1 bg-transparent border-b border-black text-black px-2 py-1 outline-none placeholder-black placeholder-opacity-50 
                                  sm-mobile:mr-0 sm-mobile:mb-4 sm-mobile:w-2/12 sm-mobile:text-xs
                                  md-mobile:mr-0 md-mobile:mb-4 md-mobile:w-11/12 md-mobile:text-sm
                                  lg-mobile:mr-0 lg-mobile:mb-4 lg-mobile:w-11/12 lg-mobile:text-base
                                  tablet:mr-4 tablet:mb-0 tablet:text-base
                                  laptop:mr-4 laptop:mb-0 laptop:text-base
                                  large-laptop:mr-4 large-laptop:mb-0 large-laptop:text-base
                                  4k:mr-4 4k:mb-0 4k:text-2xl"
                  onChange={(e) => setFormData({ ...formData, email: e.target.value })} />
              </div>
              <div className="w-full mb-6">
                <textarea placeholder={t('messagePlaceholder')} value={formData.message} maxLength={200}
                  className="w-full bg-transparent border-b border-black text-black px-2 py-1 outline-none placeholder-black placeholder-opacity-50 h-24 resize-none 
                              sm-mobile:mr-0 sm-mobile:mb-4 sm-mobile:text-xs
                              md-mobile:mr-0 md-mobile:mb-4 md-mobile:text-sm
                              lg-mobile:mr-0 lg-mobile:mb-4 lg-mobile:text-base
                              tablet:mr-4 tablet:mb-0 tablet:text-base
                              laptop:mr-4 laptop:mb-0 laptop:text-base
                              large-laptop:mr-4 large-laptop:mb-0 large-laptop:text-base
                              4k:mr-4 4k:mb-0 4k:text-2xl"
                  onChange={(e) => setFormData({ ...formData, message: e.target.value })} ></textarea>
              </div>
              <div className="w-full flex justify-center">
                <input type="submit" onClick={handleFormSubmit} value={t('sendMessage')} className="bg-custom-olive text-custom-sand uppercase tracking-widest cursor-pointer font-bold px-4 py-2" />
              </div>
            </form>
          </div>
        </div>
      </section>
      <Modal
        isOpen={isModalOpen}
        onRequestClose={closeEditModal}
        contentLabel="Example Modal"
        className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-custom-gray  p-6 rounded-md w-2/6 h-5/6"
        overlayClassName="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50"
      >
        <div>
          <h2 className="text-2xl text-white font-bold mb-4 relative">
          {t('chooseCLub')}
            <FontAwesomeIcon icon={faFutbol} size="xl" className="absolute right-0 top-1/2 transform -translate-y-1/2 text-white" />
          </h2>
          {isDropdownOpen && (
            <form onSubmit={(e) => { e.preventDefault(); chanheUserClub(); }}>
              <select
                onChange={(e) => handleClubSelection(e.target.value)}
                value={selectedClub}
                className="border border-gray-300 p-2 rounded-md mb-4"
              >
                <option value="" disabled>{t('selectClub')}</option>
                {clubsData.map((club) => (
                  <option key={club.id} value={club}>
                    {club}
                  </option>
                ))}
              </select>
              <button
                type="submit"
                className="bg-green-500 text-white px-4 py-2 font-bold rounded-md ml-2"
              >
                {t('submit')}
              </button>
            </form>
          )}
          <p className='font-bold mt-2 text-white'>
          {t('chosen')} <span className='text-green-500 text-lg underline'>{selectedClub}</span>
          </p>
          <p className='text-white items-center absolute text-lg bottom-0 mb-6 border-b border-red-500'>
          {t('warning')}
            <FontAwesomeIcon icon={faExclamation} beat size="2xl" className="ml-2" />
          </p>
        </div>
      </Modal>

    </>

  );
};

export default Home;
