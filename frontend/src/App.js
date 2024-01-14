import React from 'react';
import Map from './components/Map';
import UserHeader from './components/UserHeader';
import { useTranslation } from 'react-i18next';

const App = () => {
  const { t } = useTranslation();

  return (
    <>
      <div className="flex flex-col min-h-screen bg-custom-gray">
        <UserHeader />
        <div className="p-4 flex items-center justify-center">
          <div className="flex flex-col items-center font-body">

          </div>
        </div>
        <div className="flex justify-beetween mt-0">
          <Map />
        </div>
      </div>
    </>
  );
};

export default App;
