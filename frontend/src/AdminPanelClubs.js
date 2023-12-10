import React, { useState, useEffect } from 'react';
import axiosClient from "./axiosClient";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEdit, faTrashAlt, faPlus } from '@fortawesome/free-solid-svg-icons';
import UserHeader from './components/UserHeader';

const AdminPanelClubs = () => {
  const [clubs, setClubs] = useState([]);
  const [currentClub, setCurrentClub] = useState({
    team: '',
    latitude: '',
    longitude: '',
    address: '',
    url_logo: '',
  });
  const [editingClubId, setEditingClubId] = useState(null);
  const [editingPassword, setEditingPassword] = useState('');

  const [isModalOpen, setIsModalOpen] = useState(false);

  const openModal = (club) => {
    setIsModalOpen(true);

    if (club) {
      
      setEditingClubId(club.id);
      setCurrentClub({
        team: club.team,
        latitude: club.latitude,
        longitude: club.longitude,
        address: club.address,
        url_logo: club.url_logo,
      });
      setEditingPassword('');
    } else {
      
      setEditingClubId(null);
      setCurrentClub({
        team: '',
        latitude: '',
        longitude: '',
        address: '',
        url_logo: '',
      });
      setEditingPassword('');
    }
  };

  const closeModal = () => {
    setIsModalOpen(false);
    setEditingClubId(null);
    setCurrentClub({
        team: '',
        latitude: '',
        longitude: '',
        address: '',
        url_logo: '',
    });
    setEditingPassword('');
  };

  useEffect(() => {
    const fetchClubs = async () => {
      try {
        const response = await axiosClient.get('/clubs');
        setClubs(response.data);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    fetchClubs();
  }, []);

  const handleAddClub = async () => {
    try {
      const response = await axiosClient.post('/clubs', {
        team: currentClub.team,
        latitude: currentClub.latitude,
        longitude: currentClub.longitude,
        address: currentClub.address,
        url_logo: currentClub.editingClubData,
      });
      setClubs([...clubs, response.data]);
      setCurrentClub({
        team: '',
        latitude: '',
        longitude: '',
        address: '',
        url_logo: '',
      });
      closeModal();
    } catch (error) {
      console.error('Error adding club:', error);
    }
  };

  const handleEditClub = async () => {
    try {
      const updatedClub = { ...currentClub, password: editingPassword };
      const response = await axiosClient.put(`/clubs/${editingClubId}`, updatedClub);
      const updatedClubs = clubs.map((club) =>
       club.id === editingClubId ? response.data : club
      );
      setClubs(updatedClubs);
      setEditingClubId(null);
      setCurrentClub({
        team: '',
        latitude: '',
        longitude: '',
        address: '',
        url_logo: '',
      });
      setEditingPassword('');
    } catch (error) {
      console.error('Error editing club:', error);
    }
  };

  const handleDeleteClub = async (clubId) => {
    try {
      await axiosClient.delete(`/clubs/${clubId}`);
      const updatedClubs = clubs.filter((club) => club.id !== clubId);
      setClubs(updatedClubs);
    } catch (error) {
      console.error('Error deleting club:', error);
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
          <h1 className="text-custom-brown text-4xl font-bold mb-6">Panel zarządzania klubami</h1>

          <h2 className="text-2xl font-bold mb-4">
              {editingClubId ? 'Edytuj' : 'Nowy klub'}
            </h2>
            <button
              onClick={() => openModal(null)}
              className="bg-custom-olive px-4 py-2 text-white rounded-md mb-4"
            >
              <FontAwesomeIcon icon={faPlus} className="mr-2" />
              Dodaj klub
            </button>

          <table className="w-full mb-8">
            <thead>
              <tr>
              <th>ID</th>
                <th>Nazwa</th>
                <th>Współrzędne szerokość </th>
                <th>Współrzędne długość</th>
                <th>Adres</th>
                <th>Logo</th>
              </tr>
            </thead>
            <tbody>
              {clubs.map((club) => (
                <tr key={club.id}>
                  <td>{club.id}</td>
                  <td>{club.team}</td>
                  <td>{club.latitude}</td>
                  <td>{club.longitude}</td>
                  <td>{club.address}</td>
                  <td>{club.url_logo}</td>
                  <td>
                    <button
                      onClick={() => openModal(club)}
                      className="bg-custom-olive px-4 py-2 text-white rounded-md mr-2"
                    >
                      <FontAwesomeIcon icon={faEdit} className="mr-2" />
                      Edytuj
                    </button>
                    <button
                      onClick={() => handleDeleteClub(club.id)}
                      className="bg-red-500 px-4 py-2 text-white rounded-md"
                    >
                      <FontAwesomeIcon icon={faTrashAlt} className="mr-2" />
                      Usuń
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>

          <div className="mb-6">
            <div className={`${isModalOpen ? modalOverlayStyles : 'hidden'}`}>
              <div className={modalContentStyles}>
                <input
                  type="text"
                  value={currentClub.team}
                  onChange={(e) => setCurrentClub({ ...currentClub, team: e.target.value })}
                  placeholder="Nazwa"
                  className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
                />
                 <input
                  type="text"
                  value={currentClub.latitude}
                  onChange={(e) => setCurrentClub({ ...currentClub, latitude: e.target.value })}
                  placeholder="Szerokość"
                  className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
                />
                 <input
                  type="text"
                  value={currentClub.longitude}
                  onChange={(e) => setCurrentClub({ ...currentClub, longitude: e.target.value })}
                  placeholder="Długość"
                  className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
                />
                  <input
                  type="text"
                  value={currentClub.address}
                  onChange={(e) => setCurrentClub({ ...currentClub, address: e.target.value })}
                  placeholder="Adres"
                  className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
                />
                  <input
                  type="text"
                  value={currentClub.url_logo}
                  onChange={(e) => setCurrentClub({ ...currentClub, url_logo: e.target.value })}
                  placeholder="Url logo"
                  className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
                />

                <div className="flex justify-center">
                  <button
                    onClick={() => {
                      if (editingClubId) {
                        handleEditClub();
                      } else {
                        handleAddClub();
                      }
                      closeModal();
                    }}
                    className="bg-custom-olive px-4 py-2 text-white rounded-md mr-2"
                  >
                    <FontAwesomeIcon icon={editingClubId ? faEdit : faPlus} className="mr-2" />
                    {editingClubId ? 'Edytuj' : 'Dodaj'}
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
    </div>
  );
};

export default AdminPanelClubs;
