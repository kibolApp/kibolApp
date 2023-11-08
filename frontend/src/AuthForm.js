import React, { useState } from 'react';
import './AuthForm.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faFacebook, faGoogle, faInstagram, faTwitter, faLinkedin } from '@fortawesome/free-brands-svg-icons';


const AuthForm = () => {
  const [isLoginVisible, setIsLoginVisible] = useState(true);
  const [inProp, setInProp] = useState(true);

  const SocialMediaIcons = () => (
    <div className="social-media-icons">
      <FontAwesomeIcon icon={faFacebook} size="2x" />
      <FontAwesomeIcon icon={faGoogle} size="2x" />
      <FontAwesomeIcon icon={faInstagram} size="2x" />
      <FontAwesomeIcon icon={faTwitter} size="2x" />
      <FontAwesomeIcon icon={faLinkedin} size="2x" />
    </div>
  );

  const toggleForm = () => {
    setInProp(false);
    setTimeout(() => {
      setIsLoginVisible(!isLoginVisible);
      setInProp(true);
    }, 300);
  };

  const data = [
    "https://i.imgur.com/A7T2R6W.png",
    "https://i.imgur.com/IEmbAX2.png",
  ];

  const loginForm = (
    <div className={`form-container ${inProp ? 'fadeIn' : 'fadeOut'}`}>
      <h1 className="text-custom-brown text-4xl font-bold text-center mb-6">Logowanie</h1>
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="text" placeholder="Username / email" required />
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder="Hasło" required />
      <button type="submit" className="w-full py-3 mb-4 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold">Zaloguj</button>
      <p className="social-text text-white rounded-lg font-semibold">lub zaloguj się poprzez</p>
      <SocialMediaIcons />
    </div>
  );

  const registerForm = (
    <div className={`form-container ${inProp ? 'fadeIn' : 'fadeOut'}`}>
      <h1 className="text-custom-brown text-4xl font-bold text-center mb-6">Rejestracja</h1>
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="text" placeholder="Username" required />
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="email" placeholder="Email" required />
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder="Hasło" required />
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder="Potwierdź hasło" required />
      <button type="submit" className="w-full py-3 mb-4 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold">Zarejestruj się</button>
      <p className="social-text text-white rounded-lg font-semibold">lub zarejestruj się poprzez</p>
      <SocialMediaIcons />
    </div>
  );

  return (
    <div className="min-h-screen bg-custom-gray flex flex-col">

      {/* Header */}
      <header className="flex justify-between items-center p-5 bg-custom-brown">
        <img src={data[0]} alt="LeftIcon" className="h-16 shadow-lg" />
        <img src={data[1]} alt="RightIcon" className="h-20 border-2 border-custom-sand" />
      </header>

      <div className="flex-grow flex items-center justify-center">
        <div className="bg-custom-sand p-16 rounded-2xl shadow-2xl max-w-md w-full m-4">
          {isLoginVisible ? loginForm : registerForm}
          <div className="text-center text-custom-brown font-semibold">
            <p>{isLoginVisible ? 'Nie posiadasz konta?' : 'Posiadasz już konto?'}</p>
            <button onClick={toggleForm} className="text-custom-olive hover:text-custom-brown font-semibold">
              {isLoginVisible ? 'Zarejestruj się tutaj.' : 'Zaloguj się tutaj.'}
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default AuthForm;
