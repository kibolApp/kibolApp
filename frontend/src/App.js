import React from 'react';
import { Link } from 'react-router-dom';
import Header from './components/Header';

const App = () => {
    return (
        <>
        <div className="min-h-screen bg-custom-gray flex flex-col">
        <Header />
          <div className='text-white'>
          <Link to="/">Home</Link>
          </div>
          </div>
        </>
      );
};

export default App;