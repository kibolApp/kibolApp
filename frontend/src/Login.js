import React, { useState } from 'react';

const data = [
  "https://i.imgur.com/IEmbAX2.png",
  "https://i.imgur.com/A7T2R6W.png",
];

function Login() {
  return (
    <div className="border flex flex-col border-solid bg-custom-gray border-black">
      <div className="bg-custom-brown self-stretch flex w-full items-start justify-between gap-5 pl-9 pr-1.5 py-2 max-md:max-w-full max-md:flex-wrap max-md:pl-5">
        <button>
        <img
          loading="lazy"
          srcSet={data[1]}
          className="aspect-[1.0] object-contain object-center w-[145px] shadow-sm overflow-hidden self-center max-w-full my-auto rounded-3xl border-opacity-90"
        />
        </button>
        <img
        loading="lazy"
        src={data[0]}
        className="aspect-[1.33] object-contain object-center w-[194px] shadow-sm overflow-hidden self-stretch max-w-full mr-4"
        />

      </div>
      <div className="self-center w-fit max-w-full mt-28 mb-28 px-0 max-md:my-10">
        <div className="flex max-md:flex-col max-md:items-stretch max-md:">
        <div className="flex flex-col items-stretch w-12/12 max-md:w-full max-md:ml-0">
      <div className="flex">
      <div className="bg-custom-tan flex-grow w-full mx-auto p-8 rounded-[64px_0px_0px_64px] max-md:max-w-full">
      <div className="text-black text-4xl bg-zinc-300 w-max px-36 pr-32 p-8 rounded-[64px_0px_0px_64px] max-md:text-4xl max-md:px-5">
      <div className="pt-96 pb-96 pr-0">
      Jakieś zdjęcie
      </div>
      </div>

      </div>
              <div className="bg-custom-sand flex-grow w-full  mx-0 p-28 pt-32 rounded-[0px_64px_64px_0px] max-md:max-w-full max-md:pt-24 max-md:px-5">
              <div class="flex items-center justify-center">
              <div class="text-custom-sand text-2xl self-center whitespace-nowrap shadow-sm bg-custom-olive w-[236px] mt-0 max-w-full pl-12 pr-12 py-9 rounded-3xl border-[3px] border-solid border-stone-500 border-opacity-90 max-md:px-5">
              Logowanie
              </div>
              </div>
                <div className="text-black text-xl whitespace-nowrap pl-[20px] bg-zinc-300 w-[310px] max-w-full ml-3 mt-12 py-3.5 rounded self-start max-md:ml-2.5">
                  Username / email
                </div>
                <div className="text-black text-xl bg-zinc-300 pl-[20px] w-[310px] max-w-full ml-3 mt-6 py-3.5 rounded self-start max-md:ml-2.5">
                  Hasło
                </div>
                
                <div className="text-custom-sand text-2xl whitespace-nowrap rounded bg-custom-olive w-[110px] max-w-full mt-12 pl-4 pr-5 py-4 self-start ml-2.5">
                Zaloguj
                <br />
                </div>
                <div className="text-stone-500 text-3xl self-stretch mt-48 max-md:mt-12 ml-2.5">
                  <span className="text-custom-brown">
                    Nie posiadasz konta? <br />
                  </span>
                  <span className="text-custom-olive">
                    <br />
                    Zarejestruj się tutaj.
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Login;