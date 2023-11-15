import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import { RouterProvider } from 'react-router-dom'
import router from './router.js'
import { ContextProvider } from './contexts/ContextProvider.js'

import reportWebVitals from './reportWebVitals';


const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
   <ContextProvider>
    <RouterProvider router={router}/>
    </ContextProvider>
  </React.StrictMode>
);

reportWebVitals();