import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import UserHeader from './components/UserHeader';
import axiosClient from './axiosClient';
import { useTranslation } from 'react-i18next';

const ClubPage = () => {
    const { t } = useTranslation();

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
        <div className="relative bg-custom-sand rounded-xl flex items-center overflow-visible shadow-md
                        sm-mobile:h-16 
                        md-mobile:h-18 
                        lg-mobile:h-18 
                        tablet:h-18
                        laptop:h-18
                        large-laptop:h-20
                        4k:h-36">
        {clubData.length > 0 && (
          <>
            <img
                src={clubData[0].url_logo}
                alt={clubData[0].name}
                className="absolute left-24 w-36 h-36 -ml-8 top-1/2 transform -translate-y-1/2
                            sm-mobile:left-8 sm-mobile:w-14 sm-mobile:h-14
                            md-mobile:left-8 md-mobile:w-20 md-mobile:h-20 
                            lg-mobile:left-12 lg-mobile:w-22 lg-mobile:h-22
                            tablet:left-20 tablet:w-28 tablet:h-28 
                            laptop:left-24 laptop:w-32 laptop:h-32 
                            large-laptop:left-24 large-laptop:w-36 large-laptop:h-36 
                            4k:left-32 4k:w-40 4k:h-40"
            />
            <div className="flex justify-center items-center w-full h-full">
              <span className="text-white font-semibold uppercase text-center text-4xl
                              sm-mobile:text-lg 
                              md-mobile:text-lg 
                              lg-mobile:text-xl 
                              tablet:text-3xl 
                              laptop:text-4xl 
                              large-laptop:text-4xl 
                              4k:text-6xl">
                  {clubData[0].name}
              </span>
            </div>
          </>
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
    
    <div className="mt-16 bg-custom-sand p-4 shadow-lg rounded-lg mx-auto
                    sm-mobile:p-3 
                    md-mobile:p-4 
                    lg-mobile:p-5 
                    tablet:p-6 
                    laptop:p-8 
                    large-laptop:p-10 
                    4k:p-12">
      <div className="my-6 mx-6"> 
                <h2 className="text-2xl font-bold mb-2 text-white 
                              sm-mobile:text-sm
                              md-mobile:text-lg
                              lg-mobile:text-xl 
                              tablet:text-xl 
                              laptop:text-2xl 
                              large-laptop:text-3xl 
                              4k:text-7xl">{t('goodRelation')}</h2>
                <ul className="list-disc pl-5
                              sm-mobile:pl-4 sm-mobile:text-sm
                              md-mobile:pl-5 md-mobile:text-lg
                              lg-mobile:pl-6 lg-mobile:text-lg 
                              tablet:pl-8 tablet:text-lg
                              laptop:pl-10 laptop:text-xl
                              large-laptop:pl-12 large-laptop:text-xl
                              4k:pl-12 4k:text-4xl">
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
                <h2 className="text-2xl font-bold mb-2 text-white
                              sm-mobile:text-sm
                              md-mobile:text-lg
                              lg-mobile:text-xl 
                              tablet:text-xl 
                              laptop:text-2xl 
                              large-laptop:text-3xl 
                              4k:text-7xl">{t('badRelation')}</h2>
                <ul className="list-disc pl-5 
                              sm-mobile:pl-4 sm-mobile:text-sm
                              md-mobile:pl-5 md-mobile:text-lg
                              lg-mobile:pl-6 lg-mobile:text-lg 
                              tablet:pl-8 tablet:text-lg
                              laptop:pl-10 laptop:text-xl
                              large-laptop:pl-12 large-laptop:text-xl
                              4k:pl-12 4k:text-4xl">
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
