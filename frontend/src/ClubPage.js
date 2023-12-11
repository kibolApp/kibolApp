import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import UserHeader from './components/UserHeader';
import axiosClient from './axiosClient';

const ClubPage = () => {
    const { clubName } = useParams();
    const [clubData, setClubData] = useState([]);
    useEffect(() => {
        axiosClient.get(`/clubpage/${clubName}`)
   
            .then(({ data }) => {
                console.log(`/clubpage/${clubName}`)
                const transformedData = data.map(club => ({
                    name: club.name,
                    positive: club.positive,
                    negative: club.negative,
                    url_logo: club.url_logo,
                  }));
                  setClubData(transformedData);
            })
            .catch(err => {
                console.log(err);
                console.log(`/clubpage/${clubName}`)
            });
    }, []);
    
   

    const ClubBanner = () => {
      return (
          <div className="relative bg-custom-sand rounded-xl flex items-center justify-center overflow-visible shadow-md pl-16 pr-20 h-20">
              {clubData.length > 0 && (
                  <div className="relative flex items-center">
                      <img
                          src={clubData[0].url_logo}
                          alt={clubData[0].name}
                          className="w-36 h-36"
                      />
                      <span className="text-white font-semibold uppercase text-center text-4xl">
                          {clubData[0].name}
                      </span>
                  </div>
              )}
          </div>
      );
  };
    

  return (
    <div className="min-h-screen font-body bg-custom-gray flex flex-col">
  <UserHeader />
  <div className="container mx-auto p-4">
    <div className="mt-12">
      <ClubBanner />
    </div>
    
    <div className="mt-16 bg-custom-sand p-4 shadow-lg rounded-lg mx-auto">
      <div className="my-6 mx-6"> 
                <h2 className="text-2xl font-bold mb-2 text-white">DOBRE STOSUNKI / ZGODY</h2>
                <ul className="list-disc pl-5 text-lg">
                {clubData.map((club) => (
      <React.Fragment key={club.id}>
        {club.positive && (
          <li className="text-green-700 font-bold">{club.positive}</li>
        )}
      </React.Fragment>
    ))}
                </ul>
            </div>
            <div className="my-6 mx-6"> 
                <h2 className="text-2xl font-bold mb-2 text-white">ZŁE STOSUNKI / KOSY</h2>
                <ul className="list-disc pl-5 text-lg">
                {clubData.map((club) => (
      <React.Fragment key={club.id}>
        
        {club.negative && (
          <li className="text-rose-700 font-bold">{club.negative}</li>
        )}
      </React.Fragment>
    ))}
                </ul>
            </div>
    </div>
  </div>
</div>
  );
};

export default ClubPage;
