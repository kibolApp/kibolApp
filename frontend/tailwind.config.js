/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        'custom-gray': '#1f1c1a',
        'custom-brown': '#62442d',
        'custom-olive': '#826142',
        'custom-tan': '#a27E57',
        'custom-sand': '#c39b6d',
        'custom-light-tan': '#cdb8a0',
        'facebook': '#3b5999',
        'google': '#dd4b39',
        'instagram': '#c13584',
        'twitter': '#1DA1F2',
        'linkedin': '#0077b5',
      },
      fontFamily: {
        head: 'Impact', 
        body: 'Bahnschrift',
      },
    },
  },
  plugins: [],
}
