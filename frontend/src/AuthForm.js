import React from 'react';

const LoginPage = () => {
  const data = [
    "https://i.imgur.com/A7T2R6W.png",
    "https://i.imgur.com/IEmbAX2.png",
  ];

  return (
    <div className="min-h-screen bg-custom-gray flex flex-col">
      {/* Header */}
      <header className="flex justify-between items-center p-5 bg-custom-brown">
        <img src={data[0]} alt="LeftIcon" className="h-16 shadow-lg" />
        <img src={data[1]} alt="RightIcon" className="h-20 border-2 border-custom-sand" />
      </header>
      
      {/* Main */}
      <div className="flex-grow flex items-center justify-center">
        <div className="bg-custom-sand p-16 rounded-2xl shadow-2xl max-w-sm w-full m-4">
          <h1 className="text-custom-brown text-4xl font-semibold text-center mb-6">Logowanie</h1>
          <form>
            <input className="w-full p-4 mb-4 text-gray-700 rounded-lg" type="text" placeholder="Username / email" required/>
            <input className="w-full p-4 mb-4 text-gray-700 rounded-lg" type="password" placeholder="Hasło" required/>
            <button type="submit" className="w-full py-3 mb-4 bg-custom-olive hover:bg text-white rounded-lg font-semibold">Zaloguj</button>
            <div className="text-center">
              <p className="text-custom-brown text-sm">Nie posiadasz konta?{' '}
                <a href="#signup" className="text-custom-olive hover:text-custom-brown font-semibold">Zarejestruj się tutaj.</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};

export default LoginPage;
