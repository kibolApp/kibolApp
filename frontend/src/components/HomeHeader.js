import React from 'react';

export default function HomeHeader() {

const data = [
    "https://i.imgur.com/fv4tZQm.png", //logo
    "https://i.imgur.com/JzWdITG.jpg", //baner
    ];
    
return (
    <header className="fixed top-0 left-0 w-full flex items-center justify-between bg-black bg-opacity-50 px-10 py-2 z-10">
    <div className="text-white uppercase text-2xl font-bold">
        <img src={data[0]} alt="KibolAPP Logo" className="h-16" />
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
</header>
);
};
