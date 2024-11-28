/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors : {
        primaryColor :'#8D7B68',
        secondaryColor : '#FFF8F0',
        mediumGray : '#888888',
        shadeGray : '#8C8F93',
        slateGray : '#61676D',
        shadeCream: '#F1DEC9',
        shadeBrown : '#A4907C',
      }
    },
    fontFamily:{
      poppins: ['Poppins'],
    }
  },
  plugins: [
    require("daisyui"),
    require('flowbite/plugin')
  ],
  daisyui:{
    base: false,
    darkTheme: "light"
  },
}

