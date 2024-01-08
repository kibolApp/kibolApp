import React, { useState, useEffect } from 'react';
import { useTranslation } from 'react-i18next';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import UserHeader from './components/UserHeader';
import axiosClient from "./axiosClient";
import { useStateContext } from "./contexts/ContextProvider";

const UserPanel = () => {

  const { t } = useTranslation();
  const [selectedForm, setSelectedForm] = useState('');
  const [user, setUser] = useState(null);
  const {setToken}=useStateContext();

  useEffect(() => {
    const fetchUserProfile = async () => {
      try {
        const response = await axiosClient.get('/getCurrentUser');
        setUser(response.data.user);
      } catch (error) {
        console.error('Error fetching user profile:', error);
      }
    };

    fetchUserProfile();
  }, []);

  const ChangeEmailForm = () => {
    const [oldEmail, setOldEmail] = useState('');
    const [newEmail, setNewEmail] = useState('');
    const [confirmEmail, setConfirmEmail] = useState('');

    const handleChangeEmail = async () => {
        const response = await axiosClient.post(`/changeEmail/${user.id}`, {
          oldEmail,
          newEmail,
          confirmEmail,
        });
        window.location.reload();
    };

    return (
      <div className="mt-4 flex flex-col items-center 
                      sm-mobile:px-6
                      md-mobile:px-8 
                      lg-mobile:px-10 
                      tablet:px-12 
                      laptop:px-16 
                      large-laptop:px-20 
                      4k:px-24">
        <input
          className="mb-2 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black
                    sm-mobile:w-11/12 sm-mobile:text-xs
                    md-mobile:w-11/12 md-mobile:text-sm
                    lg-mobile:w-11/12 lg-mobile:text-sm
                    tablet:w-5/6 tablet:text-md
                    laptop:w-3/4 laptop:text-lg
                    large-laptop:w-2/3 large-laptop:text-xl
                    4k:w-1/2 4k:text-2xl"
          type="email"
          placeholder={t('oldEmail')}
          value={oldEmail}
          onChange={(e) => setOldEmail(e.target.value)}
        />
        <input
          className="mb-2 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black
                    sm-mobile:w-11/12 sm-mobile:text-xs
                    md-mobile:w-11/12 md-mobile:text-sm
                    lg-mobile:w-11/12 lg-mobile:text-sm
                    tablet:w-5/6 tablet:text-md
                    laptop:w-3/4 laptop:text-lg
                    large-laptop:w-2/3 large-laptop:text-xl
                    4k:w-1/2 4k:text-2xl"
          type="email"
          placeholder={t('newEmail')}
          value={newEmail}
          onChange={(e) => setNewEmail(e.target.value)}
        />
        <input
          className="mb-4 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black
                    sm-mobile:w-11/12 sm-mobile:text-xs
                    md-mobile:w-11/12 md-mobile:text-sm
                    lg-mobile:w-11/12 lg-mobile:text-sm
                    tablet:w-5/6 tablet:text-md
                    laptop:w-3/4 laptop:text-lg
                    large-laptop:w-2/3 large-laptop:text-xl
                    4k:w-1/2 4k:text-2xl"
          type="email"
          placeholder={t('confirmEmail')}
          value={confirmEmail}
          onChange={(e) => setConfirmEmail(e.target.value)}
        />
        <button
          className="w-5/6 md:w-1/2 py-3 py-3 mb-4 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold rounded"
          onClick={handleChangeEmail}
        >
          {t('change')}
        </button>
      </div>
    );
  };
  
  const ChangeUsernameForm = () => {
    const [oldUsername, setOldUsername] = useState('');
    const [newUsername, setNewUsername] = useState('');
  
    const handleChangeUsername = async () => {
        const response = await axiosClient.post(`/changeName/${user.id}`, {
          oldName: oldUsername,
          newName: newUsername,
        });
        window.location.reload();
    };
  
    return (
      <div className="mt-4 flex flex-col items-center
                      sm-mobile:px-6
                      md-mobile:px-8 
                      lg-mobile:px-10 
                      tablet:px-12 
                      laptop:px-16 
                      large-laptop:px-20 
                      4k:px-24">
        <input
          className="mb-2 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black
                    sm-mobile:w-11/12 sm-mobile:text-xs
                    md-mobile:w-11/12 md-mobile:text-sm
                    lg-mobile:w-11/12 lg-mobile:text-sm
                    tablet:w-5/6 tablet:text-md
                    laptop:w-3/4 laptop:text-lg
                    large-laptop:w-2/3 large-laptop:text-xl
                    4k:w-1/2 4k:text-2xl"
          type="text"
          placeholder={t('oldUsername')}
          value={oldUsername}
          onChange={(e) => setOldUsername(e.target.value)}
        />
        <input
          className="mb-4 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black
                    sm-mobile:w-11/12 sm-mobile:text-xs
                    md-mobile:w-11/12 md-mobile:text-sm
                    lg-mobile:w-11/12 lg-mobile:text-sm
                    tablet:w-5/6 tablet:text-md
                    laptop:w-3/4 laptop:text-lg
                    large-laptop:w-2/3 large-laptop:text-xl
                    4k:w-1/2 4k:text-2xl"
          type="text"
          placeholder={t('newUsername')}
          value={newUsername}
          onChange={(e) => setNewUsername(e.target.value)}
        />
        <button
          className="w-5/6 md:w-1/2 py-3 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold rounded"
          onClick={handleChangeUsername}
        >
          {t('change')}
        </button>
      </div>
    );
  };
  
  const ChangePasswordForm = () => {
    const [oldPassword, setOldPassword] = useState('');
    const [newPassword, setNewPassword] = useState('');
    const [confirmPassword, setConfirmPassword] = useState('');
  
    const handleChangePassword = async () => {
        const response = await axiosClient.post(`/changePassword/${user.id}`, {
          oldPassword,
          newPassword,
          confirmPassword,
        });
        window.location.reload();
    };
  
    return (
      <div className="mt-4 flex flex-col items-center
                      sm-mobile:px-6
                      md-mobile:px-8 
                      lg-mobile:px-10 
                      tablet:px-12 
                      laptop:px-16 
                      large-laptop:px-20 
                      4k:px-24">
        <input
          className="mb-2 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black
                    sm-mobile:w-11/12 sm-mobile:text-xs
                    md-mobile:w-11/12 md-mobile:text-sm
                    lg-mobile:w-11/12 lg-mobile:text-sm
                    tablet:w-5/6 tablet:text-md
                    laptop:w-3/4 laptop:text-lg
                    large-laptop:w-2/3 large-laptop:text-xl
                    4k:w-1/2 4k:text-2xl"
          type="password"
          placeholder={t('oldPassword')}
          value={oldPassword}
          onChange={(e) => setOldPassword(e.target.value)}
        />
        <input
          className="mb-2 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black
                    sm-mobile:w-11/12 sm-mobile:text-xs
                    md-mobile:w-11/12 md-mobile:text-sm
                    lg-mobile:w-11/12 lg-mobile:text-sm
                    tablet:w-5/6 tablet:text-md
                    laptop:w-3/4 laptop:text-lg
                    large-laptop:w-2/3 large-laptop:text-xl
                    4k:w-1/2 4k:text-2xl"
          type="password"
          placeholder={t('newPassword')}
          value={newPassword}
          onChange={(e) => setNewPassword(e.target.value)}
        />
        <input
          className="mb-4 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black placeholder-black
                    sm-mobile:w-11/12 sm-mobile:text-xs
                    md-mobile:w-11/12 md-mobile:text-sm
                    lg-mobile:w-11/12 lg-mobile:text-sm
                    tablet:w-5/6 tablet:text-md
                    laptop:w-3/4 laptop:text-lg
                    large-laptop:w-2/3 large-laptop:text-xl
                    4k:w-1/2 4k:text-2xl"
          type="password"
          placeholder={t('confirmPassword')}
          value={confirmPassword}
          onChange={(e) => setConfirmPassword(e.target.value)}
        />
        <button
          className="w-5/6 md:w-1/2 py-3 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold rounded"
          onClick={handleChangePassword}
        >
          {t('change')}
        </button>
      </div>
    );
  };
  
  const ChangeClubForm = ({ onClubChange }) => {
    const [clubs, setClubs] = useState([]);
    const [selectedClub, setSelectedClub] = useState(user?.club ? user.club.team : '');
  
    useEffect(() => {
      const fetchClubs = async () => {
        try {
          const response = await axiosClient.get('/clubs');
          setClubs(response.data);
        } catch (error) {
          console.error('Error fetching clubs:', error);
        }
      };
  
      fetchClubs();
    }, []);
  
    const handleChangeClub = async () => {
      try {
        const response = await axiosClient.post(`/changeClub/${user.id}`, {
          newClub: selectedClub,
        });
        window.location.reload();
        onClubChange();
      } catch (error) {
        console.error('Error changing club:', error);
      }
      
    };
  
    return (
      <div className="mt-4 flex flex-col items-center
                      sm-mobile:px-6
                      md-mobile:px-8 
                      lg-mobile:px-10 
                      tablet:px-12 
                      laptop:px-16 
                      large-laptop:px-20 
                      4k:px-24">
        <select
          className="mb-4 w-5/6 md:w-1/2 px-3 py-2 rounded bg-custom-light-tan rounded-md text-black"
          value={selectedClub}
          onChange={(e) => setSelectedClub(e.target.value)}
        >
          <option value="" disabled>
            {t('selectClub')}
          </option>
          {clubs.map((club) => (
            <option key={club.id} value={club.team}>
              {club.team}
            </option>
          ))}
        </select>
        <button
          className="w-5/6 md:w-1/2 py-3 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold rounded"
          onClick={handleChangeClub}
        >
          {t('changeClub')}
        </button>
      </div>
    );
  };

  const handleDeleteUser = async (userId) => {
    try {
      const confirmed = window.confirm(t('confirmDeleteUser'));
      if (confirmed) {
        axiosClient.post("/logout").then(() => {setUser({});setToken(null);});
        await axiosClient.delete(`/users/${userId}`);
        const updatedUsers = user.filter((user) => user.id !== userId);
        setUser(updatedUsers);
      }
    } catch (error) {
      console.error('Error deleting user:', error);
    }
  };

  return (
    <div className="min-h-screen font-body bg-custom-gray flex flex-col">
      <UserHeader />
      <div className="flex-grow flex items-center justify-center">
        <div className="bg-custom-sand p-16 rounded-2xl shadow-2xl max-w-4xl w-full m-4 text-center
                        sm-mobile:p-6 sm-mobile:max-w-xs
                        md-mobile:p-8 md-mobile:max-w-sm
                        lg-mobile:p-10 lg-mobile:max-w-lg
                        tablet:p-14 tablet:max-w-xl
                        laptop:p-26 laptop:max-w-2xl
                        large-laptop:p-20 large-laptop:max-w-3xl
                        4k:p-30 4k:max-w-4xl">
        <h1 className="text-custom-brown text-4xl font-bold mb-6
                      sm-mobile:text-2xl
                      md-mobile:text-2xl 
                      lg-mobile:text-3xl 
                      tablet:text-3xl 
                      laptop:text-4xl 
                      large-laptop:text-4xl 
                      4k:text-5xl"
                      >{t('hello')} {user ? user.name : t('guest')}
      </h1>
          
          <div className="mb-6">
          {user ? (
  <div>
    <p><span className='font-bold'>{t('email')}:</span> {user.email}</p>
    <p><span className='font-bold'>{t('username')}:</span> {user.name}</p>
    <p><span className='font-bold'>{t('selectedClub')}:</span> {user.club ? user.club.team : t('noClubSelected')}</p>
  </div>
) : (
  <p>{t('userNotLoggedIn')}</p>
)}

          </div>

          <div className="space-y-6 mb-12">
            <div className="flex justify-center items-center space-x-4 space-y-4
                            sm-mobile:flex-col sm-mobile:space-x-0 sm-mobile:space-y-4
                            md-mobile:flex-col md-mobile:space-x-0 md-mobile:space-y-4
                            lg-mobile:flex-col lg-mobile:space-x-0 lg-mobile:space-y-4
                            tablet:flex-row tablet:space-x-4 tablet:space-y-0
                            laptop:flex-row laptop:space-x-4 laptop:space-y-0
                            large-laptop:flex-row large-laptop:space-x-4 large-laptop:space-y-0
                            4k:flex-row 4k:space-x-4 4k:space-y-0">
              {['Email', 'Username', 'Password', 'Club'].map((option) => (
                <button
                  key={option}
                  className="bg-custom-olive p-4 rounded-full shadow-lg hover:shadow-xl transition duration-500 ease-in-out font-medium text-white
                            sm-mobile:p-2 sm-mobile:text-sm
                            md-mobile:p-2  md-mobile:text-sm
                            lg-mobile:p-2 lg-mobile:text-sm
                            tablet:p-4 tablet:text-xs
                            laptop:p-4 laptop:text-md
                            large-laptop:p-4 large-laptop:text-base 
                            4k:p-4 4k:text-2xl"
                  onClick={() => setSelectedForm(`change${option}`)}
                >
                  {t(`changeYour${option}`)}
                </button>
              ))}
            </div>
            <button
              className="bg-red-500 p-4 rounded-full shadow-lg hover:shadow-xl transition duration-500 ease-in-out font-medium text-white
                          sm-mobile:p-2 sm-mobile:text-sm
                          md-mobile:p-2  md-mobile:text-sm
                          lg-mobile:p-2 lg-mobile:text-sm
                          tablet:p-4 tablet:text-sm
                          laptop:p-4 laptop:text-md
                          large-laptop:p-4 large-laptop:text-base
                          4k:p-4 4k:text-2xl"
              onClick={() => handleDeleteUser(user.id)}
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
          </div>
        </div>
      </div>
    </div>
  );
};
export default UserPanel;