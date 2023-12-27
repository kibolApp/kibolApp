import React, { useState, useEffect } from 'react';
import axiosClient from "./axiosClient";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEdit, faTrashAlt, faPlus } from '@fortawesome/free-solid-svg-icons';
import UserHeader from './components/UserHeader';
import { useTranslation } from 'react-i18next';

const AdminPanel = () => {
  const { t } = useTranslation();
  const [users, setUsers] = useState([]);
  const [currentUser, setCurrentUser] = useState({
    name: '',
    email: '',
    password: '',
  });
  const [editingUserId, setEditingUserId] = useState(null);
  const [editingPassword, setEditingPassword] = useState('');

  const [isModalOpen, setIsModalOpen] = useState(false);

  const openModal = (user) => {
    setIsModalOpen(true);

    if (user) {
      setEditingUserId(user.id);
      setCurrentUser({
        name: user.name,
        email: user.email,
        password: '',
      });
      setEditingPassword('');
    } 
    else {
      setEditingUserId(null);
      setCurrentUser({
        name: '',
        email: '',
        password: '',
      });
      setEditingPassword('');
    }
  };

  const closeModal = () => {
    setIsModalOpen(false);
    setEditingUserId(null);
    setCurrentUser({
      name: '',
      email: '',
      password: '',
    });
    setEditingPassword('');
  };

  useEffect(() => {
    const fetchUsers = async () => {
      try {
        const response = await axiosClient.get('/users');
        setUsers(response.data);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    fetchUsers();
  }, []);

  const handleAddUser = async () => {
    try {
      const response = await axiosClient.post('/users', {
        name: currentUser.name,
        email: currentUser.email,
        password: editingPassword,
      });
      setUsers([...users, response.data]);
      setCurrentUser({
        name: '',
        email: '',
        password: '',
      });
      closeModal();
    } catch (error) {
      console.error('Error adding user:', error);
    }
  };

  const handleEditUser = async () => {
    try {
      const updatedUser = { ...currentUser, password: editingPassword };
      const response = await axiosClient.put(`/users/${editingUserId}`, updatedUser);
      const updatedUsers = users.map((user) =>
        user.id === editingUserId ? response.data : user
      );
      setUsers(updatedUsers);
      setEditingUserId(null);
      setCurrentUser({
        name: '',
        email: '',
        password: '',
      });
      setEditingPassword('');
    } catch (error) {
      console.error('Error editing user:', error);
    }
  };

  const handleDeleteUser = async (userId) => {
    try {
      await axiosClient.delete(`/users/${userId}`);
      const updatedUsers = users.filter((user) => user.id !== userId);
      setUsers(updatedUsers);
    } catch (error) {
      console.error('Error deleting user:', error);
    }
  };

  const modalOverlayStyles = `
    fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50
    flex items-center justify-center
  `;

  const modalContentStyles = `
    bg-custom-sand p-8 rounded-2xl shadow-md max-w-md w-full text-center
    transform -translate-x-1/2 -translate-y-1/2 absolute top-1/2 left-1/2
  `;

  return (
    <div className="min-h-screen bg-custom-gray flex flex-col">
      <UserHeader />

      <div className="flex-grow flex items-center justify-center p-4">
        <div className="bg-custom-sand p-8 rounded-2xl shadow-md max-w-3xl w-full text-center">
          <h1 className="text-custom-brown text-4xl font-bold mb-6">{t('adminPanelTitle')}</h1>

          <table className="w-full mb-8">
            <thead>
              <tr>
                <th>{t('id')}</th>
                <th>{t('name')}</th>
                <th>{t('email')}</th>
                <th>{t('actions')}</th>
              </tr>
            </thead>
            <tbody>
              {users.map((user) => (
                <tr key={user.id}>
                  <td>{user.id}</td>
                  <td>{user.name}</td>
                  <td>{user.email}</td>
                  <td>
                    <button 
                      onClick={() => openModal(user)} 
                      className="bg-custom-olive px-4 py-2 text-white rounded-md mr-2">
                      <FontAwesomeIcon icon={faEdit} className="mr-2" />{t('edit')}
                    </button>
                    <button
                      onClick={() => handleDeleteUser(user.id)}
                      className="bg-red-500 px-4 py-2 text-white rounded-md">
                      <FontAwesomeIcon icon={faTrashAlt} className="mr-2" />{t('delete')}
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>

          <div className="mb-6">
            <h2 className="text-2xl font-bold mb-4">
              {editingUserId ? t('editUser') : t('newUser')}
            </h2>
            <button
              onClick={() => openModal(null)}
              className="bg-custom-olive px-4 py-2 text-white rounded-md mb-4">
              <FontAwesomeIcon icon={faPlus} className="mr-2" />{t('addUser')}
            </button>
            <div className={`${isModalOpen ? modalOverlayStyles : 'hidden'}`}>
              <div className={modalContentStyles}>
                <input
                  type="text"
                  value={currentUser.name}
                  onChange={(e) => setCurrentUser({ ...currentUser, name: e.target.value })}
                  placeholder={t('namePlaceholder')}
                  className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
                />
                <input
                  type="email"
                  value={currentUser.email}
                  onChange={(e) => setCurrentUser({ ...currentUser, email: e.target.value })}
                  placeholder={t('emailPlaceholder')}
                  className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
                />
                <input
                  type="password"
                  value={editingPassword}
                  onChange={(e) => setEditingPassword(e.target.value)}
                  placeholder={t('passwordPlaceholder')}
                  className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
                />
                <div className="flex justify-center">
                  <button
                    onClick={() => {
                      if (editingUserId) {
                        handleEditUser();
                      } 
                      else {
                        handleAddUser();
                      }
                      closeModal();
                    }}
                    className="bg-custom-olive px-4 py-2 text-white rounded-md mr-2">
                    <FontAwesomeIcon icon={editingUserId ? faEdit : faPlus} className="mr-2" />
                    {editingUserId ? t('editUser') : t('add')}
                  </button>
                  <button
                    onClick={closeModal}
                    className="bg-red-500 px-4 py-2 text-white rounded-md ml-2">
                    <FontAwesomeIcon icon={faTrashAlt} className="mr-2" />{t('cancel')}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default AdminPanel;
