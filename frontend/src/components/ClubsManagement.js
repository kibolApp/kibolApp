import React, { useState, useEffect } from 'react';
import axiosClient from "../axiosClient";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEdit, faTrashAlt, faPlus } from '@fortawesome/free-solid-svg-icons';
import ReactPaginate from 'react-paginate';
import { useTranslation } from 'react-i18next';

const ClubManagement = () => {
  const { t } = useTranslation();
  const [clubs, setClubs] = useState([]);
  const [currentClub, setCurrentClub] = useState({
    team: '',
    latitude: '',
    longitude: '',
    address: '',
    url_logo: '',
    url: '',
  });
  const [editingClubId, setEditingClubId] = useState(null);

  const [isModalOpen, setIsModalOpen] = useState(false);
  const [pageNumber, setPageNumber] = useState(0);
  const [selectedPage, setSelectedPage] = useState(0);
  const clubsPerPage = 8;
  const pagesVisited = pageNumber * clubsPerPage;

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
        url: club.url,
      });
    } else {
      setEditingClubId(null);
      setCurrentClub({
        team: '',
        latitude: '',
        longitude: '',
        address: '',
        url_logo: '',
        url: '',
      });
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
      url: '',
    });
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
        url_logo: currentClub.url_logo,
        url: currentClub.url,
      });
      setClubs([...clubs, response.data]);
      setCurrentClub({
        team: '',
        latitude: '',
        longitude: '',
        address: '',
        url_logo: '',
        url: '',
      });
      closeModal();
    } catch (error) {
      console.error('Error adding club:', error);
    }
  };

  const handleEditClub = async () => {
    try {
      const updatedClub = { ...currentClub };
      const response = await axiosClient.post(`/clubsup/${editingClubId}`, updatedClub);
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
        url: '',
      });
    } catch (error) {
      console.error('Error editing club:', error);
    }
  };

  const handleDeleteClub = async (clubId) => {
    try {
      const confirmed = window.confirm('Czy na pewno chcesz usunąć ten klub?');
      if (confirmed) {
      await axiosClient.post(`/clubsde/${clubId}`);
      const updatedClubs = clubs.filter((club) => club.id !== clubId);
      setClubs(updatedClubs);
      }
    } catch (error) {
      console.error('Error deleting club:', error);
    }
  };

  const modalOverlayStyles =
    "fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50 flex items-center justify-center";

  const modalContentStyles =
    "bg-custom-sand p-8 rounded-2xl shadow-md max-w-md w-full text-center transform -translate-x-1/2 -translate-y-1/2 absolute top-1/2 left-1/2";

    const changePage = ({ selected }) => {
      setPageNumber(selected);
      setSelectedPage(selected);
    };
    

  const displayedClubs = clubs.slice(pagesVisited, pagesVisited + clubsPerPage);

  return (
    <div className="flex-grow flex items-center justify-center p-4">
      <div className="bg-custom-sand p-8 rounded-2xl shadow-md max-w-5xl w-full text-center">
        <h1 className="text-custom-brown text-4xl font-bold mb-6">{t('clubManagementPanel')}</h1>

        <div>
          <h2 className="text-2xl font-bold mb-4"></h2>
          <button
            onClick={() => openModal(null)}
            className="bg-custom-olive px-4 py-2 text-white rounded-md mb-4"
          >
            <FontAwesomeIcon icon={faPlus} className="mr-2" />
            {t('addClub')}
          </button>
        </div>

        <table className="w-full mb-8">
          <thead>
            <tr>
              <th>{t('id')}</th>
              <th>{t('logo')}</th>
              <th>{t('name')}</th>
              <th>{t('latitude')}</th>
              <th>{t('longitude')}</th>
              <th>{t('headquarters')}</th>
              <th>{t('url')}</th>
              <th>{t('actions')}</th>
            </tr>
          </thead>
          <tbody>
            {displayedClubs.map((club) => (
              <tr key={club.id}>
                <td>{club.id}</td>
                <img
                  src={club.url_logo}
                  alt={`Logo ${club.team}`}
                  style={{ maxWidth: '50px', maxHeight: '50px' }}
                />
                <td>{club.team}</td>
                <td>{club.longitude}</td>
                <td>{club.latitude}</td>
                <td>{club.address}</td>
                <td>{club.url}</td>
                <td>
                  <div className="flex space-x-2">
                    <button
                      onClick={() => openModal(club)}
                      className="bg-custom-olive px-4 py-2 text-white rounded-md"
                    >
                      <FontAwesomeIcon icon={faEdit} className="mr-2" />
                      {t('edit')}
                    </button>
                    <button
                      onClick={() => handleDeleteClub(club.id)}
                      className="bg-red-500 px-4 py-2 text-white rounded-md"
                    >
                      <FontAwesomeIcon icon={faTrashAlt} className="mr-2" />
                      {t('delete')}
                    </button>
                  </div>
                </td>
              </tr>
            ))}
          </tbody>
        </table>

        <ReactPaginate
  previousLabel={t('previous')}
  nextLabel={t('next')}
  pageCount={Math.ceil(clubs.length / clubsPerPage)}
  onPageChange={changePage}
  activeClassName={"bg-custom-brown py-2"}
  containerClassName={"flex items-center justify-center mt-4"}
  breakClassName="px-3 py-2 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"
  pageLinkClassName={"px-3 py-2 text-white border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
  nextLinkClassName={"px-3 py-2 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
  previousClassName={"px-3 py-2 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
/>



        <div className={`${isModalOpen ? modalOverlayStyles : 'hidden'}`}>
          <div className={modalContentStyles}>
            <input
              type="text"
              value={currentClub.team}
              onChange={(e) => setCurrentClub({ ...currentClub, team: e.target.value })}
              placeholder={t('name')}
              className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
            />
            <input
              type="text"
              value={currentClub.latitude}
              onChange={(e) => setCurrentClub({ ...currentClub, latitude: e.target.value })}
              placeholder={t('latitude')}
              className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
            />
            <input
              type="text"
              value={currentClub.longitude}
              onChange={(e) => setCurrentClub({ ...currentClub, longitude: e.target.value })}
              placeholder={t('longitude')}
              className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
            />
            <input
              type="text"
              value={currentClub.address}
              onChange={(e) => setCurrentClub({ ...currentClub, address: e.target.value })}
              placeholder={t('address')}
              className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
            />
            <input
              type="text"
              value={currentClub.url_logo}
              onChange={(e) => setCurrentClub({ ...currentClub, url_logo: e.target.value })}
              placeholder={t('urllogo')}
              className="p-2 rounded-md bg-custom-light-tan text-black placeholder-black mb-4"
            />
             <input
              type="text"
              value={currentClub.url}
              onChange={(e) => setCurrentClub({ ...currentClub, url: e.target.value })}
              placeholder={t('url')}
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
                {editingClubId ? t('edit') : t('add')}
              </button>
              <button
                onClick={closeModal}
                className="bg-red-500 px-4 py-2 text-white rounded-md ml-2"
              >
                <FontAwesomeIcon icon={faTrashAlt} className="mr-2" />
                {t('cancel')}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ClubManagement;
