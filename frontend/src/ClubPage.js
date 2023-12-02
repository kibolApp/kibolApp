import React from 'react';
import UserHeader from './components/UserHeader';

const ClubPage = () => {

    const data = [
        "https://i.imgur.com/AJ27Q2w.png"
    ];

    const ClubBanner = () => {
        return (
            <div className="relative bg-custom-sand rounded-xl flex items-center overflow-visible shadow-md pl-16 pr-20 h-20">
                <img src={data[0]} alt="MKS MIEDŹ LEGNICA" className="absolute w-36 h-36 -ml-8 top-1/2 transform -translate-y-1/2" />
            <span className="text-white font-semibold uppercase text-center text-4xl w-full">MKS MIEDŹ LEGNICA</span>
            </div>
            );
        };
    
    const goodRelations = [
    "WKS Śląsk Wrocław",
    "Lechia Gdańsk",
    "Promień Żary",
    "BKS Stal Bielsko-Biała",

    ];

    const badRelations = [
    "Arka Gdynia",
    "BKS Bolesławiec",
    "Chrobry Głogów",
    "Cracovia Kraków",
    "GKS Katowice",
    "GKS Tychy",
    "Górnik Polkowice",
    "Górnik Wałbrzych",
    "Górnik Zabrze",
    "Lech Poznań",
    "Legia Warszawa",
    "Motor Lublin",
    "Odra Opole",
    "Podbeskidzie Bielsko-Biała",
    "Polonia Świdnica",
    "Pogoń Szczecin",
    "Radomiak Radom",
    "Ruch Chorzów",
    "Sandecja Nowy Sącz",
    "Stal Rzeszów",
    "Stal Stalowa Wola",
    "Widzew Łódź",
    "Wisła Kraków",
    "Zawisza Bydgoszcz",
    "Zagłębie Lubin"
    ];


  return (
    <div className="min-h-screen bg-custom-gray flex flex-col">
      <UserHeader />
      <div className="container mx-auto p-4">
        <div className="mt-12">
            <ClubBanner />
        </div>
            
        <div className="mt-16 bg-custom-sand p-4 shadow-lg rounded-lg mx-auto">
            <div className="my-6 ml-6">
            <h2 className="text-2xl font-bold mb-2 text-white">DOBRE STOSUNKI / ZGODY</h2>
            <ul className="list-disc pl-5 text-lg">
                {goodRelations.map(relation => (
                <li key={relation} className="text-green-700 font-bold">{relation}</li>
                ))}
            </ul>
            </div>

            <div className="my-6 ml-6">
            <h2 className="text-2xl font-bold mb-2 text-white">ZŁE STOSUNKI / KOSY</h2>
            <ul className="list-disc pl-5 text-lg">
                {badRelations.map(rivalry => (
                <li key={rivalry} className="text-rose-700 font-bold">{rivalry}</li>
                ))}
            </ul>
            </div>
        </div>
      </div>
    </div>
  );
};

export default ClubPage;
