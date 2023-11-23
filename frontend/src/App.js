import React from 'react';
import Map from './components/Map';
import UserHeader from './components/UserHeader';

const App = () => {
  return (
    <>
      <div className="min-h-fit bg-custom-gray">
        <UserHeader />
        <div className="flex justify-beetween">
        <Map />
        <div className="p-4">
        <div className="flex flex-col items-start mt-8 ml-8">
            <label htmlFor="search" className="text-white mb-2 bg-custom-brown rounded">
             <p> Aby znaleźć najbliższy klub piłkarski </p>
             <p> Kliknij prawy przycisk myszki w dowolnym </p>
             <p> miejscu na mapie!</p>
            </label>
            
          </div>
        </div>
        </div>
      </div>
    </>
  );
};

export default App;
