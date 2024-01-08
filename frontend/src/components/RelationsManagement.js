import React, { useState, useEffect } from 'react';
import axiosClient from '../axiosClient';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEdit, faTrashAlt, faPlus } from '@fortawesome/free-solid-svg-icons';
import ReactPaginate from 'react-paginate';

const RelationsManagement = () => {
  
  return (
    <div className="flex-grow flex items-center justify-center p-4">
      <div className="bg-custom-sand p-8 rounded-2xl shadow-md max-w-3xl w-full text-center">
        <h1 className="text-custom-brown text-4xl font-bold mb-6">Panel zarządzania relacjami</h1>

      </div>
    </div>
  );
};

export default RelationsManagement;
