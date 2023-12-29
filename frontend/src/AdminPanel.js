import React, { useState } from 'react';
import UserHeader from './components/UserHeader';
import ClubManagement from './components/ClubsManagement';
import UserManagement from './components/UsersManagement';

const AdminPanel = () => {
  const [selectedTab, setSelectedTab] = useState('users');

  return (
    <div className="min-h-screen bg-custom-gray flex flex-col items-center">
      <UserHeader />
      <div className="mb-4 mt-6 flex">
        <button
          onClick={() => setSelectedTab('users')}
          className={`mr-2 px-4 py-2 rounded-md ${
            selectedTab === 'users' ? 'bg-custom-olive text-white' : 'bg-white text-black'
          }`}
        >
          Użytkownicy
        </button>
        <button
          onClick={() => setSelectedTab('clubs')}
          className={`px-4 py-2 rounded-md ${
            selectedTab === 'clubs' ? 'bg-custom-olive text-white' : 'bg-white text-black'
          }`}
        >
          Kluby
        </button>
      </div>
      <div className="mb-4">
        {selectedTab === 'users' ? <UserManagement /> : <ClubManagement />}
      </div>
    </div>
  );
};

export default AdminPanel;
