import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { Icon } from 'leaflet';
import axiosClient from "./axiosClient";
import { useTranslation } from 'react-i18next';
import ReactPaginate from 'react-paginate';
import UserHeader from './components/UserHeader';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faHeart as solidHeart } from '@fortawesome/free-solid-svg-icons';
import { faHeart as regularHeart } from '@fortawesome/free-regular-svg-icons';

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
          <div className="relative bg-custom-sand rounded-full flex items-center overflow-visible shadow-md h-10 w-full max-w-sm mx-auto
                      sm-mobile:w-11/12 
                      md-mobile:w-5/6 
                      lg-mobile:w-3/4 
                      tablet:w-2/3
                      laptop:w-1/2 
                      large-laptop:w-1/3 
                      4k:w-1/4">
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
          <div key={index} className="relative bg-custom-sand rounded-xl flex items-center overflow-visible h-20 my-3 w-full hover:bg-custom-olive
                                      sm-mobile:h-16 sm-mobile:my-1 
                                      md-mobile:h-18 
                                      lg-mobile:h-20 
                                      tablet:h-24
                                      laptop:my-3 
                                      large-laptop:h-32 large-laptop:my-4 
                                      4k:h-36 4k:my-5">
                <Link to={club.url} className="flex items-center w-full h-full">
                  <img
                src={club.icon.options.iconUrl}
                alt={club.team}
                className="absolute left-16 w-24 h-24 top-1/2 transform -translate-y-1/2 md:left-12
                          sm-mobile:left-2 sm-mobile:w-12 sm-mobile:h-12 
                          md-mobile:left-4 md-mobile:w-16 md-mobile:h-16 
                          lg-mobile:left-8 lg-mobile:w-18 lg-mobile:h-18 
                          tablet:left-12 tablet:w-24 tablet:h-24 
                          md:left-12 md:w-20 md:h-20 
                          lg:left-16 lg:w-24 lg:h-24
                          laptop:left-14 laptop:w-28 laptop:h-28 
                          large-laptop:left-16 large-laptop:w-32 large-laptop:h-32 
                          4k:left-20 4k:w-36 4k:h-36"
              />
                 <div className="flex justify-center items-center w-full h-full">
                <span className="text-black font-semibold uppercase text-center text-lg
                                sm-mobile:text-xs 
                                md-mobile:text-md 
                                lg-mobile:text-md
                                tablet:text-xl
                                laptop:text-2xl 
                                large-laptop:text-3xl 
                                4k:text-4xl`">
                  {club.team}
                </span>
                  </div>
                </Link>
                <button
                  className={`text-4xl ${isFavorite(club) ? 'text-red-500 transform -translate-x-20' : 'text-black-500 transform -translate-x-20'}`}
                  onClick={() => toggleFavorite(club)}
                >
                  <FontAwesomeIcon icon={isFavorite(club) ? solidHeart : regularHeart} />
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
  activeClassName={"bg-custom-brown py-1"}
  containerClassName={"flex items-center justify-center mt-4"}
  breakClassName="px-3 py-2 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"
  pageLinkClassName={"px-3 py-2 text-white border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
  nextLinkClassName={"px-3 py-3 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
  previousClassName={"px-3 py-2 mx-1 text-white border rounded cursor-pointer transition duration-300 ease-in-out hover:bg-custom-olive hover:text-white"}
/>
      </div>
    </div>
  );
};

export default ClubList;