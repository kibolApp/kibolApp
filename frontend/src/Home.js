import React from 'react';
import { Link } from 'react-router-dom';

const Home = () => {
  return (
    <>
    <div className="min-h-screen bg-custom-gray flex flex-col">
      <div className='text-white'>
      <h1>Strona główna</h1>
      <Link to="/auth">Przejdź do formularza logowania</Link>
      </div>
      </div>
    </>
  );
};

export default Home;
