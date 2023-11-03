import React from 'react';

function Login() {
  return (
    <div className="border flex flex-col border-solid bg-custom-gray border-black">
      <div className="bg-custom-brown self-stretch flex w-full items-start justify-between gap-5 pl-9 pr-1.5 py-2 max-md:max-w-full max-md:flex-wrap max-md:pl-5">
        <img
          loading="lazy"
          srcSet="..."
          className="aspect-[1.49] object-contain object-center w-[131px] shadow-sm overflow-hidden self-center max-w-full my-auto rounded-3xl border-[3px] border-solid border-stone-500 border-opacity-90"
        />
        <img
          loading="lazy"
          srcSet="/img/Logo1.png"
          className="aspect-[1.33] object-contain object-center w-[194px] shadow-sm overflow-hidden self-stretch max-w-full"
        />
      </div>
      <div className="self-center w-[860px] max-w-full mt-28 mb-28 px-5 max-md:my-10">
        <div className="gap-5 flex max-md:flex-col max-md:items-stretch max-md:gap-0">
          <div className="flex flex-col items-stretch w-6/12 max-md:w-full max-md:ml-0">
            <div className="bg-stone-500 flex grow flex-col w-full mx-auto p-5 rounded-[30px_0px_0px_30px] max-md:max-w-full">
              <div className="text-black text-5xl bg-zinc-300 self-stretch w-full pt-56 pb-48 px-20 rounded-[64px_0px_0px_64px] max-md:text-4xl max-md:pt-24 max-md:pb-28 max-md:px-5">
                Jakieś zdjęcie
              </div>
            </div>
          </div>
          <div className="flex flex-col items-stretch w-6/12 ml-5 max-md:w-full max-md:ml-0">
            <div className="bg-stone-400 flex grow flex-col w-full mx-auto pl-14 pr-20 pt-32 pb-16 rounded-none max-md:max-w-full max-md:pt-24 max-md:px-5">
              <div className="text-stone-400 text-2xl self-center whitespace-nowrap shadow-sm bg-stone-500 w-[236px] max-w-full pl-12 pr-12 py-9 rounded-3xl border-[3px] border-solid border-stone-500 border-opacity-90 max-md:px-5">
                Logowanie
              </div>
              <div className="text-black text-xs whitespace-nowrap bg-stone-400 w-[290px] max-w-full ml-3 mt-6 py-3.5 rounded self-start max-md:ml-2.5">
                Username / email
              </div>
              <div className="text-black text-xs bg-stone-400 w-[290px] max-w-full ml-3 mt-4 py-3.5 rounded self-start max-md:ml-2.5">
                Hasło
              </div>
              <div className="text-stone-400 text-xs whitespace-nowrap rounded bg-stone-500 w-[75px] max-w-full mt-9 pl-3.5 pr-4 py-2.5 self-start">
                Zaloguj
                <br />
              </div>
              <div className="text-stone-500 text-2xl self-stretch mt-16 max-md:mt-10">
                <span className="text-yellow-900">
                  Nie posiadasz konta? <br />
                </span>
                <span className="text-stone-500">
                  <br />
                  Zarejestruj się tutaj.
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Login;
