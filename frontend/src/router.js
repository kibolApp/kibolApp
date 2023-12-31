import {Navigate, createBrowserRouter} from 'react-router-dom';
import React, { lazy, Suspense, useState, useEffect } from 'react';
import Home from './Home';
import DefaultLayout from './components/DefaultLayout';
import GuestLayout from './components/GuestLayout';
import AuthForm from './AuthForm';
import ClubPage from './ClubPage';
import UserPanel from './UserPanel';
import AdminPanel from './AdminPanel';
import LoadingScreen from './LoadingScreen';
import ClubList from './ClubList';
import HomeGuest from './HomeGuest';
import WaitingPage from './WaitingPage';
const AppLazy = lazy(() => import('./App'));


const AppWithLoadingScreen = () => {
  const [loading, setLoading] = useState(true);
  useEffect(() => {
    const initializeApp = async () => {
      await new Promise(resolve => setTimeout(resolve, 2000));
      setLoading(false); 
    };
    initializeApp();
  }, []);
  return (
    <Suspense fallback={<LoadingScreen duration={2000} />}>
      {loading ? <LoadingScreen duration={2000} /> : <AppLazy />}
    </Suspense>
  );
};

const router =createBrowserRouter([
    {
        path: '/',
        element: <DefaultLayout />,
        children: [
          {
            path: '/',
            element: <Navigate to='/home' />,
          },
          {
            path: '/home',
            element: <Home />,
          },
          {
            path: '/app',
            element: <AppWithLoadingScreen />,
          },
          {
            path: '/clubpage/:clubName',
            element: <ClubPage />,
          },
          {
            path: '/clublist',
            element: <ClubList />
          },
          {
            path: '/Profile',
            element: <UserPanel />,
          },
          {
            path: '/admin',
            element: <AdminPanel/>,
          },
        ],
      },
      {
        path: '/',
        element: <GuestLayout />,
        children: [
          {
            path: '/',
            element: <Navigate to='/homeguest' />,
          },
          {
            path: '/homeguest',
            element: <HomeGuest />,
          },
          {
            path: '/auth',
            element: <AuthForm />,
          },
          {
            path:'/wait',
            element: <WaitingPage/>,
          }
        ],
      }
])
    

export default router;