import React from 'react';

const LoginPage = () => {
  const data = [
    "https://i.imgur.com/A7T2R6W.png",
    "https://i.imgur.com/IEmbAX2.png",
  ];

  return (
    <div className="min-h-screen bg-[#3B2716] flex flex-col">
      {/* Header */}
      <header className="flex justify-between items-center p-5 bg-custom-brown">
        <img src={data[0]} alt="LeftIcon" className="h-16 shadow-lg" />
        <img src={data[1]} alt="RightIcon" className="h-16 border-2 border-white" />
      </header>
      
      {/* Main */}
      <div className="flex-grow flex items-center justify-center">
        <div className="bg-[#A68A64] p-10 rounded-lg shadow-xl max-w-sm w-full m-4">
          <h1 className="text-white text-3xl text-center mb-6">Logowanie</h1>
          <form>
            <input
              className="w-full p-3 mb-4 text-gray-700 rounded-md"
              type="text"
              placeholder="Username / email"
              required
            />
            <input
              className="w-full p-3 mb-4 text-gray-700 rounded-md"
              type="password"
              placeholder="Hasło"
              required
            />
            <button
              type="submit"
              className="w-full p-3 mb-4 bg-[#755F48] text-white rounded-md"
            >
              Zaloguj
            </button>
            <div className="text-center">
              <p className="text-white">
                Nie posiadasz konta?{' '}
                <a href="#signup" className="text-[#D9C8B4] hover:text-[#BAA897]">
                  Zarejestruj się tutaj.
                </a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};

export default LoginPage;
