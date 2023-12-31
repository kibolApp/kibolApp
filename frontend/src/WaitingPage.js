import React, { useEffect, useState } from 'react';
import 'react-toastify/dist/ReactToastify.css';
import { useStateContext } from "./contexts/ContextProvider";

const WaitingPage = () => {
  const { setUser, setToken } = useStateContext();

  useEffect(() => {
    const urlSearchParams = new URLSearchParams(window.location.search);
    const params = Object.fromEntries(urlSearchParams.entries());
    console.log(params.user);
    setUser(params.user || null);
    setToken(params.token || null);
  }, [setUser, setToken]);

  return (
    <div data-testid="screen" className="min-h-screen font-body bg-custom-gray flex flex-col">
      <div data-testid="center" className="flex-grow flex items-center justify-center">
        <div className="bg-custom-sand p-16 rounded-2xl shadow-2xl max-w-md w-full m-4">
          Pleas Wait
        </div>
      </div>
    </div>
  );
};

export default WaitingPage;