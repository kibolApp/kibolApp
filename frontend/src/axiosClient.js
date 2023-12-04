import axios from "axios";


const axiosClient=axios.create({
    baseURL: 'http://127.0.0.1:8000/api'
})

axiosClient.interceptors.request.use((config)=>{
const token =localStorage.getItem('ACCESS_TOKEN')
config.headers.Authorization=`Bearer ${token}`
console.log(token);

return config;

})
axiosClient.interceptors.response.use((response)=>{
    return response;
},(error)=>{
   
    const {response}=error;
    if (response && response.status==401){
        localStorage.removeItem('ACCESS_TOKEN')
    }

    throw error;
})

export default axiosClient;