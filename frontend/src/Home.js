import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

const Home = () => {

  const [isSticky, setIsSticky] = useState(false);

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
  "https://i.imgur.com/fv4tZQm.png",
  "https://i.imgur.com/IEmbAX2.png",
  "https://i.imgur.com/JzWdITG.jpg",
  "https://i.imgur.com/dSmkyv5.png"
  ];

const Banner = ({ backgroundImage }) => {
  return (
    <section className="relative w-full min-h-screen bg-cover flex justify-center items-center" style={{ backgroundImage: `url(${backgroundImage})` }}>
      <h2 className="text-white text-8xl uppercase text-center leading-snug font-semibold">
        Witaj w <br /> Kibol<span className="text-custom-tan">APP</span>
      </h2>
    </section>
  );
};

return (
  <>
    <header className={`${isSticky ? 'bg-custom-brown' : 'bg-black bg-opacity-50'} fixed top-0 left-0 w-full z-10 transition-all ease-in-out duration-1000`}>
      <div className="flex items-center justify-between w-full px-10 py-5">
        <div className="flex-shrink-0">
          <img src={data[0]} alt="KibolAPP Logo" className={`absolute top-0 left-0 h-16 object-contain transition-opacity ease-in-out duration-1000 ${isSticky ? 'opacity-0' : 'opacity-100'}`}/>
          <img src={data[1]} alt="Sticky Logo" className={`absolute top-0 left-0 h-16 object-contain transition-opacity ease-in-out duration-1000 ${!isSticky ? 'opacity-0' : 'opacity-100'}`}/>
        </div>
        <nav className='flex-grow'>
          <ul className="flex justify-end">
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300 text-green-500"><Link to="/home">Start</Link></a>
            </li>
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300"><Link to="/app">Lokalizacja klubów</Link></a>
            </li>
            <li className="text-white mx-4 font-semibold">
              <a href="#" className="hover:text-gray-300">Spis klubów</a>
            </li>
            <li className="text-white mx-4 font-semibold">
              <a className="hover:text-gray-300"><Link to="/auth">Logowanie / Rejestracja</Link></a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <Banner backgroundImage={data[2]} />

    {/* About Us */}
    <section className="flex flex-col md:flex-row items-center justify-center text-center bg-[#353230] text-white p-6 md:p-32">
      <div className="md:flex-1 md:mr-6">
        <h2 className="text-3xl font-bold mb-4">Czym jest kibolApp - ABOUT</h2>
          <p className="text-lg mb-6">
            KibolApp to innowacyjna strona stworzona dla pasjonatów piłki nożnej i kibiców, którzy chcą poznać kulisy relacji między klubami.
          </p>
          <p className="text-lg mb-6">
            Aplikacja umożliwia śledzenie lokalizacji klubów, a także dostarcza informacje na temat przyjaźni i konfliktów między różnymi drużynami.
          </p>
      </div>
      <div className="md:flex-1 max-w-md mx-auto">
        <img src={data[3]} alt="About Us" className="w-full h-auto rounded-lg" />
      </div>
    </section>

    {/* Contact Us */}
    <section className="bg-custom-sand py-16">
      <div className="flex justify-center">
        <div className="max-w-2xl w-full">
          <h3 className="text-white text-3xl text-center mb-10 font-bold">Masz pytania? <span className="text-custom-brown uppercase font-bold">Skontaktuj się z nami</span></h3>
            <form className="flex flex-col items-center">
              <div className="flex w-full mb-6">
                <input type="text" placeholder="Name" className="flex-1 bg-transparent border-b border-black text-black px-2 py-1 outline-none placeholder-black placeholder-opacity-50 mr-4" />
                <input type="email" placeholder="E-mail" className="flex-1 bg-transparent border-b border-black text-black px-2 py-1 outline-none placeholder-black placeholder-opacity-50" />
              </div>
              <div className="w-full mb-6">
                <textarea placeholder="Napisz swoją wiadmość tutaj..." className="w-full bg-transparent border-b border-black text-black px-2 py-1 outline-none placeholder-black placeholder-opacity-50 h-24 resize-none"></textarea>
              </div>
              <div className="w-full flex justify-center">
                <input type="submit" value="Wyślij!" className="bg-custom-olive text-custom-sand uppercase tracking-widest cursor-pointer font-bold px-4 py-2" />
              </div>
            </form>
        </div>
      </div>
    </section>
    </>

  );
};

export default Home;
