import React, { useState } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faFacebook, faGoogle, faInstagram, faTwitter, faLinkedin } from '@fortawesome/free-brands-svg-icons';
import Header from './components/Header';


const AuthForm = () => {
  const [isLoginVisible, setIsLoginVisible] = useState(true);
  const [inProp, setInProp] = useState(true);

  const SocialMediaIcons = () => (
    <div className="flex justify-center gap-5 mb-5 text-white">
      <FontAwesomeIcon icon={faFacebook} size="2x" className="cursor-pointer hover:text-facebook" />
      <FontAwesomeIcon icon={faGoogle} size="2x" className="cursor-pointer hover:text-google" />
      <FontAwesomeIcon icon={faInstagram} size="2x" className="cursor-pointer hover:text-instagram" />
      <FontAwesomeIcon icon={faTwitter} size="2x" className="cursor-pointer hover:text-twitter" />
      <FontAwesomeIcon icon={faLinkedin} size="2x" className="cursor-pointer hover:text-linkedin" />
    </div>
  );
  
  const SocialText = ({ children }) => (
    <p className="mt-5 text-center mb-5">
      {children}
    </p>
  );

  const toggleForm = () => {
    setInProp(false);
    setTimeout(() => {
      setIsLoginVisible(!isLoginVisible);
      setInProp(true);
    }, 300);
  };

  const loginForm = (
    <div className={`form-container transition-opacity duration-300 ${inProp ? 'opacity-100' : 'opacity-0'}`}>
      <h1 className="text-custom-brown text-4xl font-bold text-center mb-6">Logowanie</h1>
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="text" placeholder="Username / email" required />
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder="Hasło" required />
      <button type="submit" className="w-full py-3 mb-4 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold">Zaloguj</button>
      <div className="social-section">
        <SocialText>lub zaloguj się poprzez</SocialText>
        <SocialMediaIcons />
      </div>
    </div>
  );

  const registerForm = (
    <div className={`form-container transition-opacity duration-300 ${inProp ? 'opacity-100' : 'opacity-0'}`}>
      <h1 className="text-custom-brown text-4xl font-bold text-center mb-6">Rejestracja</h1>
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="text" placeholder="Username" required />
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="email" placeholder="Email" required />
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder="Hasło" required />
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder="Potwierdź hasło" required />
      <button type="submit" className="w-full py-3 mb-4 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold">Zarejestruj się</button>
      <div className="social-section">
        <SocialText>lub zarejestruj się poprzez</SocialText>
        <SocialMediaIcons />
      </div>
    </div>
  );

  return (
    <div className="min-h-screen bg-custom-gray flex flex-col">
      <Header />
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
