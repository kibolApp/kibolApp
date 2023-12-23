import UserHeader from './components/UserHeader';
import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { Icon } from 'leaflet';
import axiosClient from "./axiosClient";

const ClubList = () => {
    const [searchTerm, setSearchTerm] = useState('');
    const [filteredClubs, setFilteredClubs] = useState([]); // Initialize with an empty array initially
    const [markersData, setMarkersData] = useState([]);

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
                            placeholder="Search for a club..."
                            value={searchTerm}
                            onChange={handleSearchChange}
                        />
                    </div>
                </div>
            <div className="overflow-x-auto rounded mb-4">
                <table className="w-full text-center font-bold">
                    <tbody>
                        {filteredClubs.map((club, index) => (
                            <tr key={index} className={`${index % 2 === 0 ? 'bg-custom-sand' : 'bg-custom-light-tan'}`}>
                                <td className="py-2">
                                    <div>
                                        <Link to={club.url}>
                                            <h2 className="text-center text-custom-brown font-semibold"><img src={club.icon.options.iconUrl} alt="club logo" className="w-8 h-8" />{club.team}</h2>
                                        </Link>
                                    </div>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    );
};

export default ClubList;