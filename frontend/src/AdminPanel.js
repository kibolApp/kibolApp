import React, { useState } from 'react';
import UserHeader from './components/UserHeader';
import ClubManagement from './components/ClubsManagement';
import UserManagement from './components/UsersManagement';
import { useTranslation } from 'react-i18next';

const AdminPanel = () => {
  const [selectedTab, setSelectedTab] = useState('users');
  const { t } = useTranslation();

  return (
    <div className="min-h-screen bg-custom-gray flex flex-col items-center">
      <UserHeader />
      <div className="mb-4 mt-6 flex">
      <button
  onClick={() => setSelectedTab('users')}
  className={`mr-2 px-4 py-2 rounded-md text-xs
            sm-mobile:px-3 sm-mobile:py-1  sm-mobile:text-xs
            md-mobile:px-3 md-mobile:py-1 md-mobile:text-sm
            lg-mobile:px-4 lg-mobile:py-2 lg-mobile:text-sm
            tablet:px-4 tablet:py-2 tablet:text-md
            laptop:px-4 laptop:py-2 laptop:text-lg
            large-laptop:px-4 large-laptop:py-2 large-laptop:text-xl
            4k:px-4 py-1 4k:py-2 4k:text-2xl 
            ${
    selectedTab === 'users' ? 'px-3 py-1 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out bg-custom-olive hover:bg-custom-olive hover:text-white' : 'bg-custom-olive hover:text-white'
  }`}
      > {t('users')}
      </button>
<button onClick={() => setSelectedTab('clubs')}
        className={`px-4 py-2 rounded-md text-xs
                    sm-mobile:px-3 sm-mobile:py-1  sm-mobile:text-xs
                    md-mobile:px-3 md-mobile:py-1 md-mobile:text-sm
                    lg-mobile:px-4 lg-mobile:py-2 lg-mobile:text-sm
                    tablet:px-4 tablet:py-2 tablet:text-md
                    laptop:px-4 laptop:py-2 laptop:text-lg
                    large-laptop:px-4 large-laptop:py-2 large-laptop:text-xl
                    4k:px-4 py-1 4k:py-2 4k:text-2xl 
        ${ selectedTab === 'clubs' ? 'px-3 py-1 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out bg-custom-olive hover:bg-custom-olive hover:text-white' : 'bg-custom-olive hover:text-white'
  }`}
> {t('clubs')}
</button>
      </div>
      <div className="mb-4 
                      sm-mobile:p-6 
                      md-mobile:p-8 
                      lg-mobile:p-10 
                      tablet:p-12 
                      laptop:p-16 
                      large-laptop:p-20 
                      4k:p-24">
        {selectedTab === 'users' ? <UserManagement /> : <ClubManagement />}
      </div>
    </div>
  );
};

export default AdminPanel;
