import { Icon } from 'leaflet';

const markers = [   
  {
    team: "Miedz Legnica",
    location: [51.203600, 16.169939],
    address: "Stadion MKS Miedź Legnica im. Orła Białego - Hetmańska 2",
    icon: new Icon({ iconUrl: "https://i.imgur.com/AJ27Q2w.png", iconSize: [32, 32] }),
  },
  {
    team: "Cracovia Kraków",
    location: [50.058006, 19.920449],
    address: "Stadion Cracovii im. Józefa Piłsudskiego - Józefa Kałuży 1",
    icon: new Icon({ iconUrl: "https://i.imgur.com/B82c3Ze.png", iconSize: [32, 32] }),
  },
  {
    team: "Górnik Zabrze",
    location: [50.296299, 18.768331],
    address: "Arena Zabrze - Roosevelta 81",
    icon: new Icon({ iconUrl: "https://i.imgur.com/G01NIvs.png", iconSize: [32, 32] }),
  },
  {
    team: "Jagiellonia Białystok",
    location: [53.106014, 23.149256],
    address: "Stadion Miejski w Białymstoku - Słoneczna 1",
    icon: new Icon({ iconUrl: "https://i.imgur.com/HpUwEAe.png", iconSize: [32, 32] }),
  },
  {
    team: "Korona Kielce",
    location: [50.861489, 20.624842],
    address: "Arena Kielce, Suzuki Arena - Księdza Piotra Ściegiennego 8",
    icon: new Icon({ iconUrl: "https://i.imgur.com/UG6yqUi.png", iconSize: [32, 32] }),
  },
  {
    team: "Lech Poznań",
    location: [52.397536, 16.858129],
    address: "Enea Stadion - Bułgarska 17",
    icon: new Icon({ iconUrl: "https://i.imgur.com/dGaDZz8.png", iconSize: [32, 32] }),
  },
  {
    team: "Legia Warszawa",
    location: [52.220448, 21.040688],
    address: "Stadion Miejski Legii Warszawa - Łazienkowska 3",
    icon: new Icon({ iconUrl: "https://i.imgur.com/484NrE2.png", iconSize: [32, 32] }),
  },
  {
    team: "ŁKS Łódź",
    location: [51.758942, 19.426245],
    address: "Stadion Króla - aleja Unii Lubelskiej 2",
    icon: new Icon({ iconUrl: "https://imgur.com/BJPSl4y.png", iconSize: [32, 32] }),
  },
  {
    team: "Piast Gliwice",
    location: [50.306583, 18.695866],
    address: "Stadion Miejski w Gliwicach - Stefana Okrzei 20",
    icon: new Icon({ iconUrl: "https://i.imgur.com/yZJMMP8.png", iconSize: [32, 32] }),
  },
  {
    team: "Pogoń Szczecin",
    location: [53.436476, 14.518776],
    address: "Stadion Miejski im. Floriana Krygiera - Mieczysława Karłowicza 28",
    icon: new Icon({ iconUrl: "https://i.imgur.com/VWC7J2A.png", iconSize: [32, 32] }),
  },
  {
    team: "Puszcza Niepołomice",
    location: [50.031824, 20.221173],
    address: "Stadion Miejski w Niepołomicach - Janusza Kusocińskiego 2",
    icon: new Icon({ iconUrl: "https://i.imgur.com/ZENnGmA.png", iconSize: [32, 32] }),
  },
  {
    team: "Radomiak Radom",
    location: [51.409795, 21.171910],
    address: "Stadion Miejski im. Braci Czachorów - Andrzeja Struga 63",
    icon: new Icon({ iconUrl: "https://i.imgur.com/2nVnU9F.png", iconSize: [32, 32] }),
},
{
  team: "Raków Częstochowa",
  location: [50.776811, 19.159258],
  address: "Miejski Stadion Piłkarski RKS Raków Częstochowa - Bolesława Limanowskiego 83",
  icon: new Icon({ iconUrl: "https://i.imgur.com/KTybnDT.png", iconSize: [32, 32] }),
},
{
  team: "Ruch Chorzów",
  location: [50.282243, 18.944547],
  address: "Stadion Klubu Sportowego Ruch Chorzów - Cicha 6",
  icon: new Icon({ iconUrl: "https://i.imgur.com/Din3ueS.png", iconSize: [32, 32] }),
},
{
  team: "Stal Mielec",
  location: [50.298660, 21.435882],
  address: "Stadion Miejski w Mielcu - Solskiego 1",
  icon: new Icon({ iconUrl: "https://i.imgur.com/Vhi20Rx.png", iconSize: [32, 32] }),
},
{
  team: "Śląsk Wrocław",
  location: [51.141186, 16.943674],
  address: "Tarczyński Arena Wrocław - al. Śląska 1",
  icon: new Icon({ iconUrl: "https://i.imgur.com/nTw642F.png", iconSize: [32, 32] }),
},
{
  team: "Warta Poznań",
  location: [52.393564, 16.931124],
  address: "Stadion Warty Poznań (Ogródek) - Droga Dębińska 12",
  icon: new Icon({ iconUrl: "https://i.imgur.com/pHbkZBs.png", iconSize: [32, 32] }),
},
{
  team: "Widzew Łódź",
  location: [51.765164, 19.511799],
  address: "Serce Łodzi - al. marsz. Józefa Piłsudskiego 138",
  icon: new Icon({ iconUrl: "https://i.imgur.com/Gy7xBj9.png", iconSize: [32, 32] }),
},
{
  team: "Zagłębie Lubin",
  location: [51.413976, 16.198171],
  address: "Stadion Zagłębia Lubin - Marii Skłodowskiej - Curie 98",
  icon: new Icon({ iconUrl: "https://i.imgur.com/ASAxV9N.png", iconSize: [32, 32] }),
},
/* Pierwsza Liga  */
{
    team: "Arka Gdynia",
    location: [54.493203, 18.531112],
    address: "Stadion Miejski w Gdyni - Olimpijska 5",
    icon: new Icon({ iconUrl: "https://i.imgur.com/DIxQvf1.png", iconSize: [32, 32] }),
  },
  {
    team: "Bruk-Bet Termalica Nieciecza",
    location: [50.158386, 20.849128],
    address: "Stadion Sportowy BRUK-BET Termalica Nieciecza - Nieciecza 199",
    icon: new Icon({ iconUrl: "https://i.imgur.com/bffzfpj.png", iconSize: [32, 32] }),
  },
  {
    team: "Chrobry Głogów",
    location: [51.655913, 16.096825],
    address: "Stadion Miejski w Głogowie - Wita Stwosza 3",
    icon: new Icon({ iconUrl: "https://i.imgur.com/sBRFtDF.png", iconSize: [32, 32] }),
  },
  {
    team: "GKS Katowice",
    location: [50.279721, 19.001200],
    address: "GKS GieKSa Katowice S.A. - Bukowa 1A",
    icon: new Icon({ iconUrl: "https://i.imgur.com/LaB5Fat.png", iconSize: [32, 32] }),
  },
  {
    team: "GKS Tychy",
    location: [50.124054, 18.990624],
    address: "Stadion Miejski W Tychach - Edukacji 7",
    icon: new Icon({ iconUrl: "https://i.imgur.com/oyiIhGG.png", iconSize: [32, 32] }),
  },
  {
    team: "Górnik Łęczna",
    location: [51.301619, 22.875952],
    address: "Stadion Piłkarski GKS Górnik Łęczna - al. Jana Pawła II 13",
    icon: new Icon({ iconUrl: "https://i.imgur.com/ViNJIKR.png", iconSize: [32, 32] }),
  },
  {
    team: "Lechia Gdańsk",
    location: [54.389995, 18.640154],
    address: "Polsat Plus Arena Gdańsk - Pokoleń Lechii Gdańsk 1",
    icon: new Icon({ iconUrl: "https://i.imgur.com/IQnXfez.png", iconSize: [32, 32] }),
  },
  {
    team: "Motor Lublin",
    location: [51.232428, 22.557482],
    address: "Arena Lublin - Stadionowa 1",
    icon: new Icon({ iconUrl: "https://i.imgur.com/wya3bMw.png", iconSize: [32, 32] }),
  },
  {
    team: "Odra Opole",
    location: [50.676340, 17.932094],
    address: "Stadion Miejski OKS Odra Opole - Oleska 51",
    icon: new Icon({ iconUrl: "https://i.imgur.com/8j6dBw6.png", iconSize: [32, 32] }),
  },
  {
    team: "Podbeskidzie Bielsko-Biała",
    location: [49.817422, 19.054301],
    address: "Stadion Miejski w Bielsku-Białej - Tadeusza Rychlińskiego 19",
    icon: new Icon({ iconUrl: "https://i.imgur.com/07rCZxP.png", iconSize: [32, 32] }),
  },
  {
    team: "Polonia Warszawa",
    location: [52.255557, 21.001371],
    address: "Stadion Polonii Warszawa - Konwiktorska 6",
    icon: new Icon({ iconUrl: "https://i.imgur.com/L9znd4v.png", iconSize: [32, 32] }),
  },
  {
    team: "Resovia Rzeszów",
    location: [50.040642, 21.983011],
    address: "Stadion Miejski ROSiR - Stanisława Wyspiańskiego 22",
    icon: new Icon({ iconUrl: "https://i.imgur.com/dfoyZ4A.png", iconSize: [32, 32] }),
  },
  {
    team: "Stal Rzeszów",
    location: [50.021478, 21.996199],
    address: "Stadion Miejski Stal - Hetmańska 69",
    icon: new Icon({ iconUrl: "https://i.imgur.com/Mt0ygDr.png", iconSize: [32, 32] }),
  },
  {
    team: "Wisła Kraków",
    location: [50.063736, 19.911817],
    address: "Stadion Miejski im. Henryka Reymana - Władysława Reymonta 22",
    icon: new Icon({ iconUrl: "https://i.imgur.com/LgnZzdC.png", iconSize: [32, 32] }),
  },
  {
    team: "Wisła Płock",
    location: [52.562007, 19.684123],
    address: "Orlen Stadion - ul. Łukasiewicza 34",
    icon: new Icon({ iconUrl: "https://i.imgur.com/AkAwgeA.png", iconSize: [32, 32] }),
  },
  {
    team: "Zagłębie Sosnowiec",
    location: [50.277328, 19.103581],
    address: "Stadion Ludowy - Kresowa 1",
    icon: new Icon({ iconUrl: "https://i.imgur.com/zAp81Ko.png", iconSize: [32, 32] }),
  },
  {
    team: "Znicz Pruszków",
    location: [52.169157, 20.813007],
    address: "Stadion MZOS Znicz - Bohaterów Warszawy 4",
    icon: new Icon({ iconUrl: "https://i.imgur.com/zxyrE0u.png", iconSize: [32, 32] }),
  },


];

export default markers;
