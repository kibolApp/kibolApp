import React, { useState } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faFacebook, faGoogle, faInstagram, faTwitter, faLinkedin } from '@fortawesome/free-brands-svg-icons';
import { useTranslation } from 'react-i18next';
import { Link } from 'react-router-dom';
import { useRef } from "react";
import { useStateContext } from "./contexts/ContextProvider";
import axiosClient from "./axiosClient";
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import  UserHeader from './components/Headers/UserHeader';
import  GuestHeader from './components/Headers/GuestHeader';

const AuthForm = () => {
  const [isLoginVisible, setIsLoginVisible] = useState(true);
  const [inProp, setInProp] = useState(true);
  const { t } = useTranslation();
  const nameRef = useRef();
  const emailRef = useRef();
  const passwordRef = useRef();
  const passwordConfirmationRef = useRef();
  const {setUser,setToken}=useStateContext();
  const emailloginRef = useRef();
  const passwordloginRef = useRef();

  const submitRegister = async (e) => {
    e.preventDefault();
    const payload = {
      name: nameRef.current.value,
      email: emailRef.current.value,
      password: passwordRef.current.value,
      password_confirmation: passwordConfirmationRef.current.value,
    };
  
    axiosClient.post('/register', payload)
      .then(({ data }) => {
        setUser(data.user);
        setToken(data.token);
      })
      .catch((err) => {
        console.error(err);
        notify('Register failed', 'error');
      });
  };

  const submitLogin = async (ev) => {
    ev.preventDefault()
    const payload={
      email:emailloginRef.current.value,
      password: passwordloginRef.current.value,
    };
    console.log(payload);
    axiosClient.post('/login',payload)
    .then(({data})=>{
      setUser(data.user)
      setToken(data.token)
    })
    .catch(err=>{
      console.log(err);
      notify('Login failed', 'error');
    })
  
  }

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
      {t('socialLoginPrompt')}
    </p>
  );

  const toggleForm = () => {
    setInProp(false);
    setTimeout(() => {
      setIsLoginVisible(!isLoginVisible);
      setInProp(true);
    }, 300);
  };

  const notify = (message, type = 'info') => {
    toast[type](message, {
      position: "top-right",
      autoClose: 2000,
      hideProgressBar: false,
      closeOnClick: true,
      pauseOnHover: true,
      draggable: true,
      theme: "dark",
    });
  };
 
  const loginForm = (
    <form onSubmit={submitLogin}>
    <div className={`form-container transition-opacity duration-300 ${inProp ? 'opacity-100' : 'opacity-0'}`}>
      <h1 className="text-custom-brown text-4xl font-bold text-center mb-6">{t('loginTitle')}</h1>
       <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="text" placeholder={t('userEmail')} ref={emailloginRef} required />
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder={t('password')} ref={passwordloginRef} required />
      <button type="submit" onClick={notify}  className="w-full py-3 mb-4 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold">{t('loginButton')}</button>
      <ToastContainer/>
      <div className="social-section">
        <SocialText />
        <SocialMediaIcons />
      </div>
    </div>
    </form>
  );

  const registerForm = (
    <form onSubmit={submitRegister}>
    <div className={`form-container transition-opacity duration-300 ${inProp ? 'opacity-100' : 'opacity-0'}`}>
      <h1 className="text-custom-brown text-4xl font-bold text-center mb-6">{t('registrationTitle')}</h1>
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="text" placeholder={t('name')} ref={nameRef} required />
        <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="email" placeholder={t('email')} ref={emailRef} required />
        <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder={t('password')} ref={passwordRef} required />
        <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black" type="password" placeholder={t('confirmPassword') }ref={passwordConfirmationRef} required />
      <button type="submit" onClick={notify}  className="w-full py-3 mb-4 bg-custom-olive hover:bg-custom-brown text-white rounded-lg font-semibold">{t('registerButton')}</button>
      <ToastContainer/>
      <div className="social-section">
        <SocialText />
        <SocialMediaIcons />
      </div>
    </div>
    </form>
  );

  return (
    <div className="min-h-screen font-body bg-custom-gray flex flex-col">
      <UserHeader />
      <div className="flex-grow flex items-center justify-center">
        <div className="bg-custom-sand p-16 rounded-2xl shadow-2xl max-w-md w-full m-4">
          {isLoginVisible ? loginForm : registerForm}
          <div className="text-center text-custom-brown font-semibold">
            <p>{isLoginVisible ? t('noAccountPrompt') : t('haveAccountPrompt')}</p>
            <button onClick={toggleForm} className="text-custom-olive hover:text-custom-brown font-semibold">
              {isLoginVisible ? t('registerHere') : t('loginHere')}
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default AuthForm;
