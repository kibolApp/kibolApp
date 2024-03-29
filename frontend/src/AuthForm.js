import React, { useState } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faGoogle, faGithub } from '@fortawesome/free-brands-svg-icons';
import Header from './components/Header';
import { useTranslation } from 'react-i18next';
import { useRef } from "react";
import { useStateContext } from "./contexts/ContextProvider";
import axiosClient from "./axiosClient";
import axiosClientWeb from "./axiosClientWeb";
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

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
  const handleGithubClick = () => {
    console.log('GitHub clicked');
    const nameG="github"
    axiosClientWeb.get(`/auth/${nameG}/redirect`)
    .then(({data})=>{
      window.location.href = data.authUrl;
    })
    .catch(err=>{
      console.log(err);
      notify('Login failed', 'error');
    })
  };

  const handleGoogleClick = () => {
    console.log('Google clicked');
    const nameG="google"
    axiosClientWeb.get(`/auth/${nameG}/redirect`)
    .then(({data})=>{
      window.location.href = data.authUrl;
    })
    .catch(err=>{
      console.log(err);
      notify('Login failed', 'error');
    })
  };

  const SocialMediaIcons = () => (
    
    <div className="flex justify-center gap-5 mb-5 text-white">
       <FontAwesomeIcon
        icon={faGithub}
        className="cursor-pointer hover:text-facebook text-3xl 
                  sm-mobile:text-3xl 
                  md-mobile:text-3xl 
                  lg-mobile:text-4xl 
                  tablet:text-4xl 
                  laptop:text-5xl 
                  large-laptop:text-5xl 
                  4k:text-6xl"
        onClick={handleGithubClick}
      />
      <FontAwesomeIcon
        icon={faGoogle}
        className="cursor-pointer hover:text-google text-3xl
                  sm-mobile:text-3xl 
                  md-mobile:text-3xl 
                  lg-mobile:text-4xl 
                  tablet:text-4xl 
                  laptop:text-5xl 
                  large-laptop:text-5xl 
                  4k:text-6xl"
        onClick={handleGoogleClick}
      />
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
      <h1 className="text-custom-brown text-4xl font-bold text-center mb-6 
                      sm-mobile:text-3xl 
                      md-mobile:text-3xl 
                      lg-mobile:text-3xl
                      tablet:text-4xl 
                      laptop:text-4xl 
                      large-laptop:text-4xl 
                      4k:text-5xl">
                    {t('loginTitle')}</h1>
       <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black
                        sm-mobile:text-sm 
                        md-mobile:text-base 
                        lg-mobile:text-lg 
                        tablet:text-lg 
                        laptop:text-lg 
                        large-laptop:text-xl 
                        4k:text-2xl" 
                      type="text" placeholder={t('email')} ref={emailloginRef} required />
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black
                        sm-mobile:text-sm 
                        md-mobile:text-base 
                        lg-mobile:text-lg 
                        tablet:text-lg 
                        laptop:text-lg 
                        large-laptop:text-xl 
                        4k:text-2xl" 
                      type="password" placeholder={t('password')} ref={passwordloginRef} required />
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
      <h1 className="text-custom-brown text-4xl font-bold text-center mb-6 
                      sm-mobile:text-3xl 
                      md-mobile:text-3xl 
                      lg-mobile:text-3xl
                      tablet:text-4xl 
                      laptop:text-4xl 
                      large-laptop:text-4xl 
                      4k:text-5xl">
                    {t('registrationTitle')}</h1>
      <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black
                        sm-mobile:text-sm 
                        md-mobile:text-base 
                        lg-mobile:text-lg 
                        tablet:text-lg 
                        laptop:text-lg 
                        large-laptop:text-xl 
                        4k:text-2xl" 
                      type="text" placeholder={t('name')} ref={nameRef} required />
        <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black
                        sm-mobile:text-sm 
                        md-mobile:text-base 
                        lg-mobile:text-lg 
                        tablet:text-lg 
                        laptop:text-lg 
                        large-laptop:text-xl 
                        4k:text-2xl" 
                      type="email" placeholder={t('email')} ref={emailRef} required />
        <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black
                        sm-mobile:text-sm 
                        md-mobile:text-base 
                        lg-mobile:text-lg 
                        tablet:text-lg 
                        laptop:text-lg 
                        large-laptop:text-xl 
                        4k:text-2xl" 
                      type="password" placeholder={t('password')} ref={passwordRef} required />
        <input className="w-full p-4 mb-4 text-gray-700 bg-custom-light-tan rounded-md text-black placeholder-black
                        sm-mobile:text-sm 
                        md-mobile:text-base 
                        lg-mobile:text-lg 
                        tablet:text-lg 
                        laptop:text-lg 
                        large-laptop:text-xl 
                        4k:text-2xl" 
                      type="password" placeholder={t('confirmPassword') } ref={passwordConfirmationRef} required />
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
      <Header />
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
