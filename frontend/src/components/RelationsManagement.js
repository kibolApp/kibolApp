import React, { useState, useEffect } from 'react';
import axiosClient from '../axiosClient';
import { Icon } from 'leaflet';
import Modal from 'react-modal'; 


const RelationsManagement = () => {
  const [clubs, setClubs] = useState([]);
  const [tableAdded, setTableAdded] = useState(false);
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [modalData, setModalData] = useState([]);

  const [selectedClub, setSelectedClub] = useState({
    name: '',
    url: '',
    url_logo: '',
  });


  const [nameClubsWithNoRelationsPositive, setNameClubsWithNoRelationsPostive] = useState([]);
  const [nameClubsWithNoRelationsNegative, setNameClubsWithNoRelationsNegative] = useState([]);
  const [currentPagePoitive, setCurrentPagePostive] = useState(1);
  const [currentPageNegative, setCurrentPageNegative] = useState(1);
  const [positiveRelationOpen, setPositiveRelationOpen] = useState(false);
const [negativeRelationOpen, setNegativeRelationOpen] = useState(false);
const itemsPerPage = 4;


  useEffect(() => {
    const fetchData = async () => {
      try {
        const { data } = await axiosClient.get('/getclubs');
        const allClubs = data.map((clubData) => ({
          name: clubData.team,
          icon: new Icon({ iconUrl: clubData.url_logo, iconSize: [10, 10] }),
          url_logo: clubData.url_logo,
          url: clubData.url,
          exist: clubData.existsTable,
        })).sort((a, b) => a.name.localeCompare(b.name));

        setClubs(allClubs);
      } catch (error) {
        console.log(error);
      }
    };

    fetchData();
  }, [tableAdded]);

  const AddTable = (url, name, logo) => {
    const payload = {
      url: url,
      name: name,
      url_logo: logo,
    };
    axiosClient.post('/creattable', payload)
      .then((response) => {
        setModalData(response.data);
      })
      .catch((error) => {
        console.log(error);
      });
  };

  const openEditModal = (club) => {
    setSelectedClub({
      name: club.name,
      url: club.url,
      url_logo: club.url_logo,
    });
    const payload={
      name: club.name,
      url: club.url,
      url_logo: club.url_logo,
    }
    axiosClient.get('/getrealtiontable',{ params: payload })
    .then((response)=>{
      setModalData(response.data);
    })
    setIsModalOpen(true);
  };

  const removeFromRelation = (item) => {
    const payload={
      url: selectedClub.url,
      name: item.negative ?? item.positive,
    }
    console.log(payload)
    axiosClient.post('/removerelation',payload)
    .then(()=>{
      openEditModal(selectedClub)
    })

  };
  
  const closeEditModal = () => {
    setIsModalOpen(false);
  };

  const EditTable = () => {
    setIsModalOpen(false);
  };

  const pullNameclubwithnoRelationsPostive =()=>{
    const payload={
      url: selectedClub.url
    }
    console.log(payload)
    axiosClient.get('/getnameclubsiwthnorealtions',{ params: payload })
    .then((response)=>{
      setNameClubsWithNoRelationsPostive(response.data.names_without_relations);
    })
  }
  const pullNameclubwithnoRelationsNegative =()=>{
    const payload={
      url: selectedClub.url
    }
    console.log(payload)
    axiosClient.get('/getnameclubsiwthnorealtions',{ params: payload })
    .then((response)=>{
      setNameClubsWithNoRelationsNegative(response.data.names_without_relations);
    })
  }



  const AddPositiveRealtion = (item) => {
    const payload={
      url: selectedClub.url,
      name: item,
    }
    console.log(payload)
    axiosClient.post('/addpositiverelation',payload)
    .then(()=>{
      hidePositiveblock()
      openEditModal(selectedClub)
    })

  };
  const AddNegativeRealtion = (item) => {
    const payload={
      url: selectedClub.url,
      name: item,
    }
    console.log(payload)
    axiosClient.post('/addnegativerelation',payload)
    .then(()=>{
      hideNegativeblock()
      openEditModal(selectedClub)
   })

  };

  const showNegativeblock = () => {
    setNegativeRelationOpen(true);
    pullNameclubwithnoRelationsNegative();
  };
  const hideNegativeblock = () => {
    setNegativeRelationOpen(false);
    
  };
  const showPositiveblock = () => {
    setPositiveRelationOpen(true);
    pullNameclubwithnoRelationsPostive()
  };
  const hidePositiveblock = () => {
    setPositiveRelationOpen(false);
    
  };


        const displayPagePositvie = () => {
          const startIndexPostive = (currentPagePoitive - 1) * itemsPerPage;
          const endIndexPostive = startIndexPostive + itemsPerPage;
          return nameClubsWithNoRelationsPositive.slice(startIndexPostive, endIndexPostive);
        };
        const displayPageNegative = () => {
          const startIndexNegative = (currentPageNegative - 1) * itemsPerPage;
          const endIndexNegative = startIndexNegative + itemsPerPage;
          return nameClubsWithNoRelationsNegative.slice(startIndexNegative, endIndexNegative);
        };

        const totalPagesPostive = Math.ceil(nameClubsWithNoRelationsPositive.length / itemsPerPage);
        const totalPagesNegative = Math.ceil(nameClubsWithNoRelationsNegative.length / itemsPerPage);
      const handlePageChangePostive = (page) => {
        setCurrentPagePostive(page);
      };
      const handlePageChangeNegative = (page) => {
        setCurrentPageNegative(page);
      };


      const [positiveCurrentPage, setPositiveCurrentPage] = useState(1);
      const [negativeCurrentPage, setNegativeCurrentPage] = useState(1);
    
      const filterAndPaginate = (items, currentPage, setPageFunction) => {
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        return items.slice(startIndex, endIndex).map((item) => (
          <div key={item.id} className="flex items-center justify-between">
            <p>{item}</p>
            <button
              onClick={() => removeFromRelation(item)}
              className="bg-red-500 text-white p-2 rounded-md m-2"
            >
              X
            </button>
          </div>
        ));
      };
    
   
      const positiveItems = modalData
        .filter((item) => item.positive)
        .map((item) => item.positive);
    
   
      const negativeItems = modalData
        .filter((item) => item.negative)
        .map((item) => item.negative);
    
     
      const positiveTotalPages = Math.ceil(positiveItems.length / itemsPerPage);
      const negativeTotalPages = Math.ceil(negativeItems.length / itemsPerPage);
    
     
      const positivePaginationControls = (
        <div className="flex justify-center mt-4">
          <button
            onClick={() =>
              setPositiveCurrentPage((prev) => Math.max(prev - 1, 1))
            }
            disabled={positiveCurrentPage === 1}
            className="mr-2 px-4 py-2 bg-gray-300 rounded"
          >
            Previous
          </button>
          <span className="mx-2">
            Page {positiveCurrentPage} of {positiveTotalPages}
          </span>
          <button
            onClick={() =>
              setPositiveCurrentPage((prev) =>
                Math.min(prev + 1, positiveTotalPages)
              )
            }
            disabled={positiveCurrentPage === positiveTotalPages}
            className="ml-2 px-4 py-2 bg-gray-300 rounded"
          >
            Next
          </button>
        </div>
      );
    
    
      const negativePaginationControls = (
        <div className="flex justify-center mt-4">
          <button
            onClick={() =>
              setNegativeCurrentPage((prev) => Math.max(prev - 1, 1))
            }
            disabled={negativeCurrentPage === 1}
            className="mr-2 px-4 py-2 bg-gray-300 rounded"
          >
            Previous
          </button>
          <span className="mx-2">
            Page {negativeCurrentPage} of {negativeTotalPages}
          </span>
          <button
            onClick={() =>
              setNegativeCurrentPage((prev) =>
                Math.min(prev + 1, negativeTotalPages)
              )
            }
            disabled={negativeCurrentPage === negativeTotalPages}
            className="ml-2 px-4 py-2 bg-gray-300 rounded"
          >
            Next
          </button>
        </div>
      );




      return (
        <div className="flex-grow flex items-center justify-center p-4">
          <div className="bg-custom-sand p-20 rounded-2xl shadow-md max-w-3xl w-full text-center">
            <h1 className="text-custom-brown text-4xl font-bold mb-6">Panel zarządzania relacjami</h1>
      
            {clubs.map((club) => (
              <div key={club} className="relative bg-custom-sand rounded-xl flex items-center overflow-visible h-20 my-8 w-full p-6">
                <img
                  src={club.icon.options.iconUrl}
                  alt={club.name}
                  className="w-24 h-24 mr-8"
                />
                <div className="flex-grow flex justify-between items-center">
                  <span className="text-black font-semibold uppercase text-center text-lg">
                    {club.name}
                  </span>
                  <div className="ml-8"> 
                    {club.exist ?   
                      <button onClick={() => openEditModal(club)} className="bg-blue-500 text-white px-4 py-2 rounded-md">Edytuj</button> : 
                      <button onClick={() => AddTable(club.url, club.name, club.url_logo)} className="bg-green-500 text-white px-4 py-2 rounded-md">Dodaj</button>
                    }
                  </div>
                </div>
              </div>
            ))}

      
<Modal
  isOpen={isModalOpen}
  onRequestClose={closeEditModal}
  contentLabel="Example Modal"
  className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-md w-2/6 h-5/6" 
  overlayClassName="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50"
>
  <h2>Relacje Klubu: {selectedClub.name}</h2>
  <div className="flex justify-between mb-4"> 
    <div className="mr-4">
      <p className="font-bold">Pozytywne relacje:</p>
      {filterAndPaginate(
        positiveItems,
        positiveCurrentPage,
        setPositiveCurrentPage
      )}
      {positivePaginationControls}

      <button onClick={showPositiveblock} className="bg-green-500 text-white p-2 m-2">
        + Dodaj
      </button>
      <div>
        {positiveRelationOpen && displayPagePositvie().map((name, index) => (
          <p key={index} className="m-2">
            <button onClick={() => AddPositiveRealtion(name)}>
              {name}
            </button>
          </p>
        ))}
      </div>
      <div>
        {positiveRelationOpen && Array.from({ length: totalPagesPostive }).map((_, index) => (
          <button key={index} onClick={() => handlePageChangePostive(index + 1)} className="m-2">
            {index + 1}
          </button>
        ))}
        {positiveRelationOpen && (
          <button onClick={hidePositiveblock} className="m-2">
            Anuluj
          </button>
        )}
      </div>
    </div>

    <div>
      <p className="font-bold">Negatywne relacje:</p>
      {filterAndPaginate(
        negativeItems,
        negativeCurrentPage,
        setNegativeCurrentPage
      )}
      {negativePaginationControls}

      <button onClick={showNegativeblock} className="bg-green-500 text-white p-2 m-2">
        + Dodaj
      </button>
      <div>
        {negativeRelationOpen && displayPageNegative().map((name, index) => (
          <p key={index} className="m-2">
            <button onClick={() => AddNegativeRealtion(name)}>
              {name}
            </button>
          </p>
        ))}
      </div>
      <div>
        {negativeRelationOpen && Array.from({ length: totalPagesNegative }).map((_, index) => (
          <button key={index} onClick={() => handlePageChangeNegative(index + 1)} className="m-2">
            {index + 1}
          </button>
        ))}
        {negativeRelationOpen && (
          <button onClick={hideNegativeblock} className="m-2">
            Anuluj
          </button>
        )}
      </div>
    </div>
  </div>
  <button onClick={EditTable} className="bg-blue-500 text-white px-4 py-2 rounded-md m-2">
    Zapisz
  </button>
</Modal>


      </div>
    </div>
  );
};

export default RelationsManagement;