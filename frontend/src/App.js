import React from 'react';
import Map from './components/Map';
import UserHeader from './components/UserHeader';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEnvelope, faMagnifyingGlass } from '@fortawesome/free-solid-svg-icons'

const App = () => {
  return (
    <>
      <div className="flex flex-col min-h-screen bg-custom-gray">
        <UserHeader />
        <div className="flex justify-beetween">
        <Map />
        <div className="p-4">
        <div className="flex flex-col items-start ml-4">
            <label htmlFor="search" className="text-white mb-2 bg-custom-brown rounded">
             <p> Aby znaleźć najbliższy klub piłkarski </p>
             <p> Kliknij prawy przycisk myszki w dowolnym </p>
             <p> miejscu na mapie!</p>
            </label>

            <div class="max-w-md mt-2 ">
        <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
        <div class="grid h-full w-6 text-custom-brown">
        </div>
        <input
        class="peer h-full w-full outline-none text-sm text-custom-brown "
        type="text"
        id="search"
        placeholder="Search for club.."/>
        <button>
        <FontAwesomeIcon icon={faMagnifyingGlass} beat size="xl" className="mr-6 text-custom-brown" />
        </button>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </>
  );
};

export default App;
