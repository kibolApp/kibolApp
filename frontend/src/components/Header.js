import React from 'react'
import { Link } from 'react-router-dom'; 

export default function Header() {

const data = [
    "https://i.imgur.com/AMBEfm7.png",
    "https://i.imgur.com/IEmbAX2.png",
  ];

  return (
    <header className="flex justify-between items-center p-5 bg-custom-brown">
        <button>
        <Link to="/">
      <img src={data[0]} alt="LeftIcon" className="h-16 rounded-full shadow-lg drop-shadow-lg hover:opacity-80 hover:scale-110 hover:bg-custom-sand transition duration-300 ease-in-out" />
        </Link>
        </button>
      <img src={data[1]} alt="RightIcon" className="h-20 border-2 border-custom-sand" />
    </header>
  )

};