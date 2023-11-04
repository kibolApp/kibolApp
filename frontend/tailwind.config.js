/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        'custom-gray': '#1F1C1A',
        'custom-brown': '#62442D',
        'custom-olive': '#826142',
        'custom-tan': '#A27E57',
        'custom-sand': '#C39B6D',
        'custom-light-tan': '#CDB8A0',
        'custom-backg1': '#00 1F1C1A',
        'custom-backg2': '#D4 1F1C1A',
        'custom-backg3': '#FF 1F1C1A',
      },
    },
  },
  plugins: [],
}
