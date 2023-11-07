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
      },
    },
  },
  plugins: [],
}
