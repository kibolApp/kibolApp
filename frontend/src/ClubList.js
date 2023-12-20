import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import UserHeader from './components/UserHeader';

const clubs = [
    'Arka Gdynia',
    'Bruk-Bet Termalica Nieciecza',
    'Chrobry Głogów',
    'Cracovia Kraków',
    'GKS Katowice',
    'GKS Tychy',
    'Górnik Łęczna',
    'Górnik Zabrze',
    'Jagiellonia Białystok',
    'Korona Kielce',
    'Lechia Gdańsk',
    'Lech Poznań',
    'Legia Warszawa',
    'ŁKS Łódź',
    'Miedź Legnica',
    'Motor Lublin',
    'Odra Opole',
    'Piast Gliwice',
    'Podbeskidzie Bielsko-Biała',
    'Pogoń Szczecin',
    'Polonia Warszawa',
    'Puszcza Niepołomice',
    'Radomiak Radom',
    'Raków Częstochowa',
    'Resovia Rzeszów',
    'Ruch Chorzów',
    'Śląsk Wrocław',
    'Stal Mielec',
    'Stal Rzeszów',
    'Warta Poznań',
    'Widzew Łódź',
    'Wisła Kraków',
    'Wisła Płock',
    'Zagłębie Lubin',
    'Zagłębie Sosnowiec',
    'Znicz Pruszków',
];
    
const ClubList = () => {
    const [searchTerm, setSearchTerm] = useState('');
    const [filteredClubs, setFilteredClubs] = useState(clubs);

    const handleSearchChange = (e) => {
        const term = e.target.value;
        setSearchTerm(term);
        const filtered = clubs.filter((club) =>
            club.toLowerCase().includes(term.toLowerCase())
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
                            <td className="py-2">{club}</td>
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