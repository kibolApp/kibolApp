import { useStateContext } from "../contexts/ContextProvider";
import { Navigate, Outlet, UNSAFE_DataRouterStateContext } from "react-router-dom";

export default function DefaultLayout() {
    const {token}= useStateContext()
    
    if(!token){
        return <Navigate to='/homeguest'/>
    }


    return (
      <>
        
              
         <Outlet />
        
      </>
    )
  }
