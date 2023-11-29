import React, { useState } from 'react';
import Header from './components/Header';
import { useTranslation } from 'react-i18next';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

const UserPanel = () => {

  const [selectedForm, setSelectedForm] = useState('');
  const { t } = useTranslation();

  const ChangeEmailForm = () => (
    <div className="mt-4 flex flex-col items-center">
      <input className="mb-2 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black" type="email" placeholder={t('oldEmail')} />
      <input className="mb-2 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black" type="email" placeholder={t('newEmail')} />
      <input className="mb-4 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black" type="email" placeholder={t('confirmNewEmail')} />
      <button className="w-5/6 md:w-1/2 py-3 py-3 mb-4 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold rounded">
        {t('change')}
      </button>
    </div>
  );
  
  const ChangeUsernameForm = () => (
    <div className="mt-4 flex flex-col items-center">
      <input className="mb-2 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black" type="text" placeholder={t('oldUsername')} />
      <input className="mb-4 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black" type="text" placeholder={t('newUsername')} />
      <button className="w-5/6 md:w-1/2 py-3 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold rounded">
        {t('change')}
      </button>
    </div>
  );
  
  const ChangePasswordForm = () => (
    <div className="mt-4 flex flex-col items-center">
      <input className="mb-2 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder={t('oldPassword')} />
      <input className="mb-2 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder={t('newPassword')} />
      <input className="mb-4 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder={t('confirmNewPassword')} />
      <button className="w-5/6 md:w-1/2 py-3 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold rounded">
        {t('change')}
      </button>
    </div>
  );
  
  const ChangeClubForm = () => (
    <div className="mt-4 flex flex-col items-center">
      <input className="mb-4 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black" type="text" placeholder={t('newClub')}/>
      <button className="w-5/6 md:w-1/2 py-3 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold rounded">
        {t('change')}
      </button>
    </div>
  );
  
  const DeleteButton= () => (
    <div className="mt-4 flex flex-col items-center">
      <button className="w-5/6 md:w-1/2 py-3 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
        {t('confirmDelete')}
      </button>
    </div>
  );

  return (
    <div className="min-h-screen bg-custom-gray flex flex-col">
      <Header />
      <div className="flex-grow flex items-center justify-center">
        <div className="bg-custom-sand p-16 rounded-2xl shadow-2xl max-w-4xl w-full m-4 text-center">
          <h1 className="text-custom-brown text-4xl font-bold mb-6">{t('helloUsername')}</h1>
          
          <div className="mb-6">
            <p><span className='font-bold'>{t('email')}:</span> user@example.com</p>
            <p><span className='font-bold'>{t('username')}:</span> [Username]</p>
            <p><span className='font-bold'>{t('selectedClub')}:</span> [Club Name]</p>
          </div>

          <div className="space-y-6 mb-12">
            <div className="flex justify-center items-center space-x-4">
              {['Email', 'Username', 'Password', 'Club'].map((option) => (
                <button
                  key={option}
                  className="bg-custom-olive p-4 rounded-full shadow-lg hover:shadow-xl transition duration-500 ease-in-out font-bold text-white"
                  onClick={() => setSelectedForm(`change${option}`)}
                >
                  {t(`changeYour${option}`)}
                </button>
              ))}
            </div>
            <button
              className="bg-red-500 p-4 rounded-full shadow-lg hover:shadow-xl transition duration-500 ease-in-out font-bold text-white"
              onClick={() => setSelectedForm('deleteAccount')}
            >
              {t('deleteAccount')}
            </button>
          </div>

          <div key={selectedForm} className={`transition-opacity transform duration-500 ease-in-out ${selectedForm ? 'scale-100 opacity-100' : 'scale-95 opacity-0'}`}>
            {selectedForm === 'changeEmail' && (
              <ChangeEmailForm t={t} />
            )}
            {selectedForm === 'changeUsername' && (
              <ChangeUsernameForm t={t} />
            )}
            {selectedForm === 'changePassword' && (
              <ChangePasswordForm t={t} />
            )}
            {selectedForm === 'changeClub' && (
              <ChangeClubForm t={t} />
            )}
            {selectedForm === 'deleteAccount' && (
              <DeleteButton t={t} />
            )}
          </div>
        </div>
      </div>
    </div>
  );
};
export default UserPanel;