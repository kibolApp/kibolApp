import React from 'react';
import Header from './components/Header';
import Map from './components/Map';

const App = () => {
  return (
    <>
      <div className="min-h-fit bg-custom-gray">
        <Header />
        <div className="flex justify-beetween">
        <Map />
        <div className="p-4">
        <div className="flex flex-col items-start mt-8 ml-8">
            <label htmlFor="search" className="text-white mb-2">
              Wyszukaj klub:
            </label>
            <input
              type="text"
              id="search"
              className="border rounded px-2 py-1 mb-4"
              placeholder="Wyszukaj klub..."
            />
             <button className="bg-custom-brown text-white px-4 py-2 rounded">
                  Szukaj
             </button>
          </div>
        </div>
        </div>
      </div>
    </>
  );
};

export default App;
