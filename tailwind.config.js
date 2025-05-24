/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        fontFamily: {
          sans: ['Inter', ...defaultTheme.fontFamily.sans], 
          bebas: ['Bebas Neue'],
          alex: ['Alexandria'],
          kanit:['Kanit'],
          anek:['Anek Malayalam'],        
          batam:['Battambang']
        },
      },
    },
    plugins: [],
  }