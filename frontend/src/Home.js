import React from 'react';
import { Link } from 'react-router-dom';
import Header from './components/Header';

const Home = () => {
  return (
    <>
    <div className="min-h-screen bg-custom-gray flex flex-col">
    <Header />
      <div className='text-white'>
      <h1>Strona główna</h1>
      <Link to="/auth">Przejdź do formularza logowania</Link>
      <p><Link to="/app">Przejdź do mapy</Link></p>
      </div>
      </div>
    </>
  );
};

export default Home;
