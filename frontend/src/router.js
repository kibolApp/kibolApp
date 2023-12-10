import {Navigate, createBrowserRouter} from 'react-router-dom';
import Home from './Home';
import DefaultLayout from './components/DefaultLayout';
import GuestLayout from './components/GuestLayout';
import AuthForm from './AuthForm';
import App from './App';
import ClubPage from './ClubPage';
import UserPanel from './UserPanel';
import AdminPanel from './AdminPanel';

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
          {
            path: '/clubpage/:clubName',
            element: <ClubPage />,
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