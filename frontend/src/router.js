import {Navigate, createBrowserRouter} from 'react-router-dom';
import Home from './Home';
import DefaultLayout from './components/DefaultLayout';
import GuestLayout from './components/GuestLayout';
import AuthForm from './AuthForm';
import App from './App';

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
            element: <App />,
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
            element: <Home />,
          },
          {
            path: '/auth',
            element: <AuthForm />,
          },
        ],
      }
])
    

export default router;