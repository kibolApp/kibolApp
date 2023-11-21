import React from 'react'
import { Link } from 'react-router-dom'; 

export default function Header() {

const data = [
    "https://i.imgur.com/AMBEfm7.png", //arrow
    "https://i.imgur.com/IEmbAX2.png", //logo
    "https://i.imgur.com/m5aXfio.png", //Polska
    "https://i.imgur.com/rQiArPt.png" //GB
  ];

  return (
    <header className="flex justify-between items-center p-5 bg-custom-brown">
      <button>
        <Link to="/">
          <img src={data[0]} alt="LeftIcon" className="h-16 rounded-full shadow-lg drop-shadow-lg hover:opacity-80 hover:scale-110 hover:bg-custom-sand transition duration-300 ease-in-out" />
        </Link>
      </button>
      
      <div className="flex items-center space-x-4">
        <div className="flex flex-col justify-center">
          <img src={data[2]} alt="Poland Flag" className="h-8 w-12 object-cover mb-2 rounded-md border-solid"/>
          <img src={data[3]} alt="GB Flag" className="h-8 w-12 object-cover rounded-md border-solid"/>
        </div>
        <img src={data[1]} alt="RightIcon" className="h-20 border-2 border-custom-sand" />
      </div>
    </header>
  )

};