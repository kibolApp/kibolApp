import React, { useState, useEffect } from 'react';
import axiosClient from '../axiosClient';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEdit, faTrashAlt, faPlus } from '@fortawesome/free-solid-svg-icons';
import ReactPaginate from 'react-paginate';

const UserManagement = () => {
  const [users, setUsers] = useState([]);
  const [currentUser, setCurrentUser] = useState({
    name: '',
    email: '',
    password: '',
  });
  const [editingUserId, setEditingUserId] = useState(null);
  const [editingPassword, setEditingPassword] = useState('');

  const [isModalOpen, setIsModalOpen] = useState(false);
  const [pageNumber, setPageNumber] = useState(0);
  const [selectedPage, setSelectedPage] = useState(0);
  const usersPerPage = 8;
  const pagesVisited = pageNumber * usersPerPage;

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
    } else {
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
      const confirmed = window.confirm('Czy na pewno chcesz usunąć tego użytkownika?');
      if (confirmed) {
        await axiosClient.delete(`/users/${userId}`);
        const updatedUsers = users.filter((user) => user.id !== userId);
        setUsers(updatedUsers);
      }
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

  const changePage = ({ selected }) => {
    setPageNumber(selected);
    setSelectedPage(selected);
  };

  const displayedUsers = users.slice(pagesVisited, pagesVisited + usersPerPage);

  return (
    <div className="flex-grow flex items-center justify-center p-2 w-full text-center overflow-x-auto rounded-2xl shadow-md max-w-3xl
                    sm-mobile:px-6
                    md-mobile:px-8
                    lg-mobile:px-10
                    tablet:px-12
                    laptop:px-16
                    large-laptop:px-20
                    4k:px-24">
      <div className="bg-custom-sand p-8 rounded-2xl shadow-md max-w-3xl w-full text-center">
        <h1 className="text-custom-brown text-4xl font-bold mb-6 
                      sm-mobile:text-lg 
                      md-mobile:text-2xl 
                      lg-mobile:text-3xl 
                      tablet:text-4xl 
                      laptop:text-4xl 
                      large-laptop:text-4xl 
                      4k:text-6xl">Panel zarządzania użytkownikami</h1>

        <div>
          <h2 className="text-2xl font-bold mb-4">
            {editingUserId ? 'Edytuj' : 'Nowy użytkownik'}
          </h2>
          <button
            onClick={() => openModal(null)}
            className="bg-custom-olive px-4 py-2 text-white rounded-md mb-4"
          >
            <FontAwesomeIcon icon={faPlus} className="mr-2" />
            Dodaj użytkownika
          </button>
          <div className="w-full overflow-x-auto">
          <table className="w-full mb-8 
                            sm-mobile:text-xs 
                            md-mobile:text-sm 
                            lg-mobile:text-base 
                            tablet:text-md
                            laptop:text-lg 
                            large-laptop:text-xl
                            4k:text-3xl">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Email</th>
                <th>Akcje</th>
              </tr>
            </thead>
            <tbody>
              {displayedUsers.map((user) => (
                <tr key={user.id}>
                  <td>{user.id}</td>
                  <td>{user.name}</td>
                  <td>{user.email}</td>
                  <td>
                    <button
                      onClick={() => openModal(user)}
                      className="bg-custom-olive px-4 py-2 text-white rounded-md mr-2
                                sm-mobile:px-3 sm-mobile:py-1 sm-mobile:text-xs 
                                md-mobile:px-3 md-mobile:py-1 md-mobile:text-xs
                                lg-mobile:px-3 lg-mobile:py-1 lg-mobile:text-base 
                                tablet:px-3 tablet:py-1 tablet:text-base 
                                laptop:px-4 laptop:py-2 laptop:text-base
                                large-laptop:px-4 large-laptop:py-2 large-laptop:text-base 
                                4k:px-4 4k:py-2 4k:text-2xl"
                    >
                      <FontAwesomeIcon icon={faEdit} className="mr-2 
                                                                sm-mobile:text-xs 
                                                                md-mobile:text-xs
                                                                lg-mobile:text-base 
                                                                tablet:text-base 
                                                                laptop:text-base
                                                                large-laptop:text-base 
                                                                4k:text-2xl" />
                      Edytuj
                    </button>
                    <button
                      onClick={() => handleDeleteUser(user.id)}
                      className="bg-red-500 px-4 py-2 text-white rounded-md
                                sm-mobile:px-3 sm-mobile:py-1 sm-mobile:text-xs 
                                md-mobile:px-3 md-mobile:py-1 md-mobile:text-sm 
                                lg-mobile:px-3 lg-mobile:py-1 lg-mobile:text-base 
                                tablet:px-3 tablet:py-1 tablet:text-base 
                                laptop:px-4 laptop:py-2 laptop:text-base
                                large-laptop:px-4 large-laptop:py-2 large-laptop:text-base 
                                4k:px-4 4k:py-2 4k:text-2xl"
                    >
                      <FontAwesomeIcon icon={faTrashAlt} className="mr-2
                                                                    sm-mobile:text-xs 
                                                                    md-mobile:text-sm 
                                                                    lg-mobile:text-base 
                                                                    tablet:text-base
                                                                    laptop:text-base 
                                                                    large-laptop:text-base
                                                                    4k:text-2xl" />
                      Usuń
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
          </div>

          <ReactPaginate
          previousLabel={'Poprzednia'}
          nextLabel={'Następna'}
          pageCount={Math.ceil(users.length / usersPerPage)}
          onPageChange={changePage}
          containerClassName={"flex items-center justify-center mt-4"}
          pageClassName={"px-3 py-1 mx-1 border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
          breakClassName="px-3 py-1 mx-1 border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"
          previousClassName={"px-3 py-1 mx-1 border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
          nextClassName={"px-3 py-1 mx-1 border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
          activeClassName={"bg-custom-olive text-white"}
          initialPage={selectedPage}
          />

          <div className={`${isModalOpen ? modalOverlayStyles : 'hidden'}`}>
            <div className={modalContentStyles}>
          <input
            type="text"
            value={currentUser.name}
            onChange={(e) => setCurrentUser({ ...currentUser, name: e.target.value })}
            placeholder="Nazwa"
            className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
          />
          <input
            type="email"
            value={currentUser.email}
            onChange={(e) => setCurrentUser({ ...currentUser, email: e.target.value })}
            placeholder="Email"
            className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
          />
          <input
            type="password"
            value={editingPassword}
            onChange={(e) => setEditingPassword(e.target.value)}
            placeholder="Hasło"
            className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
          />
          <div className="flex justify-center">
            <button
              onClick={() => {
                if (editingUserId) {
                  handleEditUser();
                } else {
                  handleAddUser();
                }
                closeModal();
              }}
              className="bg-custom-olive px-4 py-2 text-white rounded-md mr-2"
            >
              <FontAwesomeIcon icon={editingUserId ? faEdit : faPlus} className="mr-2" />
              {editingUserId ? 'Edytuj' : 'Dodaj'}
            </button>
            <button
              onClick={closeModal}
              className="bg-red-500 px-4 py-2 text-white rounded-md ml-2"
            >
              <FontAwesomeIcon icon={faTrashAlt} className="mr-2" />
              Anuluj
            </button>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default UserManagement;
