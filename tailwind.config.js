/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/**/*.blade.php"],
  theme: {
    extend: {
      colors : {
        primaryColor :'#8D7B68',
        secondaryColor : '#FFF8F0',
      }
    },
    fontFamily:{
      poppins: ['Poppins'],
    }
  },
  plugins: [require("daisyui")],
  daisyui:{
    base: false,
    darkTheme: "light"
  },
}

