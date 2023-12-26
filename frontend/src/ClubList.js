import UserHeader from './components/UserHeader';
import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { Icon } from 'leaflet';
import axiosClient from "./axiosClient";
import { useTranslation } from 'react-i18next';

const ClubList = () => {
    const [searchTerm, setSearchTerm] = useState('');
    const [filteredClubs, setFilteredClubs] = useState([]);
    const [markersData, setMarkersData] = useState([]);
    const { t } = useTranslation();
    const changeLanguage = (lng) => {
        t.changeLanguage(lng);
      }

    useEffect(() => {
        axiosClient.get('/clubs')
          .then(({ data }) => {
            console.log(data);
            const transformedData = data.map(club => ({
              team: club.team,
              icon: new Icon({ iconUrl: club.url_logo, iconSize: [46, 46] }),
              url: "/clubpage/" + club.url,
            }));
            const sortedData = transformedData.slice().sort((a, b) => a.team.localeCompare(b.team));
                setMarkersData(sortedData);
                setFilteredClubs(sortedData)
          })
          .catch(err => {
            console.error(err);
          });
      }, []);

    const handleSearchChange = (e) => {
        const term = e.target.value;
        setSearchTerm(term);
        const filtered = markersData.filter((club) =>
            club.team.toLowerCase().includes(term.toLowerCase())
        );
        setFilteredClubs(filtered);
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
                        {filteredClubs.map((club, index) => (
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
                        </div>
                        ))}
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ClubList;