import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { Icon } from 'leaflet';
import axiosClient from "./axiosClient";
import { useTranslation } from 'react-i18next';
import ReactPaginate from 'react-paginate';
import UserHeader from './components/UserHeader';

const ClubList = () => {
  const [searchTerm, setSearchTerm] = useState('');
  const [filteredClubs, setFilteredClubs] = useState([]);
  const [markersData, setMarkersData] = useState([]);
  const [pageNumber, setPageNumber] = useState(0);
  const [favoriteClubs, setFavoriteClubs] = useState([]);

  const clubsPerPage = 8;
  const pagesVisited = pageNumber * clubsPerPage;
  const { t } = useTranslation();
  const pageCount = Math.ceil(filteredClubs.length / clubsPerPage);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const userFavoritesPromise = axiosClient.get('/getUserFavorites');
        const clubsPromise = axiosClient.get('/clubs');
  
        const [userFavoritesResponse, clubsResponse] = await Promise.all([userFavoritesPromise, clubsPromise]);
  
        const favoriteClubsData = userFavoritesResponse.data.favoriteClubs;
        const allClubsData = clubsResponse.data;
  
        const allClubs = allClubsData.map(club => ({
          id: club.id,
          team: club.team,
          icon: new Icon({ iconUrl: club.url_logo, iconSize: [46, 46] }),
          url: "/clubpage/" + club.url,
        })).sort((a, b) => a.team.localeCompare(b.team));
  
        const favoriteClubsFiltered = allClubs.filter(club => favoriteClubsData.some(favoriteClub => favoriteClub.id === club.id));
        const nonFavoriteClubs = allClubs.filter(club => !favoriteClubsData.some(favoriteClub => favoriteClub.id === club.id));
        const sortedClubs = [...favoriteClubsFiltered, ...nonFavoriteClubs];
  
        setMarkersData(sortedClubs);
        setFilteredClubs(sortedClubs);
        setFavoriteClubs(favoriteClubsData);
      } catch (error) {
        console.error(error);
      }
    };
  
    fetchData();
  }, []);

  const handleSearchChange = (e) => {
    const term = e.target.value;
    setSearchTerm(term);
    setPageNumber(0);
    const filtered = markersData.filter((club) =>
      club.team.toLowerCase().includes(term.toLowerCase())
    );
    setFilteredClubs(filtered);
  };

  const changePage = ({ selected }) => {
    setPageNumber(selected);
  };

  const displayedClubs = filteredClubs.slice(pagesVisited, pagesVisited + clubsPerPage);

  const toggleFavorite = async (club) => {
    if (isFavorite(club)) {
      await removeFromFavorites(club);
    } else {
      await addToFavorites(club);
    }
    // Refresh user's favorite clubs after modification
    axiosClient.get('/getUserFavorites')
      .then(({ data }) => {
        setFavoriteClubs(data.favoriteClubs);
      })
      .catch(err => {
        console.error(err);
      });
  };

  const isFavorite = (club) => {
    return favoriteClubs.some(favoriteClub => favoriteClub.id === club.id);
  };

  const addToFavorites = (club) => {
    axiosClient.post('/addToFavorites', { club_id: club.id })
      .then(() => {
        setFavoriteClubs([...favoriteClubs, club]);
      })
      .catch(error => {
        console.error(error);
      });
  };

  const removeFromFavorites = (club) => {
    axiosClient.post('/removeFromFavorites', { club_id: club.id })
      .then(() => {
        setFavoriteClubs(favoriteClubs.filter(favoriteClub => favoriteClub.id !== club.id));
      })
      .catch(error => {
        console.error(error);
      });
  };

  return (
    <div className="min-h-screen font-body bg-custom-gray flex flex-col">
      <UserHeader />
      <div className="container mx-auto p-4">
        <div className="my-6">
          <div className="relative bg-custom-sand rounded-full flex items-center overflow-visible shadow-md h-10 w-full max-w-md mx-auto">
            <input
              type="text"
              className="w-full h-full rounded-full px-4"
              placeholder={t('searchPlaceholder')}
              value={searchTerm}
              onChange={handleSearchChange}
            />
          </div>
        </div>
        <div className="overflow-x-auto rounded mb-4">
          <div className="flex flex-col items-center">
            {displayedClubs.map((club, index) => (
              <div key={index} className={`relative bg-custom-sand rounded-xl flex items-center overflow-visible h-20 my-3 w-full hover:bg-custom-olive`}>
                <Link to={club.url} className="flex items-center w-full h-full">
                  <img
                    src={club.icon.options.iconUrl}
                    alt={club.team}
                    className="absolute left-16 w-24 h-24 top-1/2 transform -translate-y-1/2"
                  />
                  <div className="flex justify-center items-center w-full h-full">
                    <span className="text-black font-semibold uppercase text-center text-lg">
                      {club.team}
                    </span>
                  </div>
                </Link>
                <button
                  className={`text-4xl ${isFavorite(club) ? 'text-yellow-500 transform -translate-x-20' : 'text-gray-500 transform -translate-x-20'}`}
                  onClick={() => toggleFavorite(club)}
                >
                  {isFavorite(club) ? '❤️' : '🤍'}
                </button>
              </div>
            ))}
          </div>
        </div>
        <ReactPaginate
          previousLabel={'Previous'}
          nextLabel={'Next'}
          pageCount={pageCount}
          onPageChange={changePage}
          containerClassName={"flex items-center justify-center mt-4"}
          pageClassName={"px-3 py-1 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
          breakClassName="px-3 py-1 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"
          previousClassName={"px-3 py-1 text-white mx-1 border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
          nextClassName={"px-3 py-1 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
          activeClassName={"bg-custom-olive text-white"}
        />
      </div>
    </div>
  );
  
};

export default ClubList;
