import React, { useState } from 'react';
import UserHeader from './components/UserHeader';
import ClubManagement from './components/ClubsManagement';
import UserManagement from './components/UsersManagement';
import { useTranslation } from 'react-i18next';
import RelationsManagement from './components/RelationsManagement';

const AdminPanel = () => {
  const [selectedTab, setSelectedTab] = useState('users');
  const { t } = useTranslation();

  return (
    <div className="min-h-screen bg-custom-gray flex flex-col items-center">
      <UserHeader />
      <div className="mb-4 mt-6 flex">
        <button
          onClick={() => setSelectedTab('users')}
          className={`mr-2 px-4 py-2 rounded-md ${
            selectedTab === 'users'
              ? 'px-3 py-1 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out bg-custom-olive hover:bg-custom-olive hover:text-white'
              : 'bg-custom-olive hover:text-white'
          }`}
        >
          {t('users')}
        </button>
        <button
          onClick={() => setSelectedTab('clubs')}
          className={`px-4 py-2 rounded-md mx-2 ${
            selectedTab === 'clubs'
              ? 'px-3 py-1 mx-2 text-white border rounded cursor-pointer transition duration-300 ease-in-out bg-custom-olive hover:bg-custom-olive hover:text-white'
              : 'bg-custom-olive hover:text-white'
          }`}
        >
          {t('clubs')}
        </button>
        <button
          onClick={() => setSelectedTab('relations')}
          className={`px-4 py-2 rounded-md mx-2 ${
            selectedTab === 'relations'
              ? 'px-3 py-1 mx-2 text-white border rounded cursor-pointer transition duration-300 ease-in-out bg-custom-olive hover:bg-custom-olive hover:text-white'
              : 'bg-custom-olive hover:text-white'
          }`}
        >
          {t('relations')}
        </button>
      </div>
      <div className="mb-4">
        {selectedTab === 'users' ? <UserManagement /> : null}
        {selectedTab === 'clubs' ? <ClubManagement /> : null}
        {selectedTab === 'relations' ? <RelationsManagement /> : null}
      </div>
    </div>
  );
};

export default AdminPanel;
