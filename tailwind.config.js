/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/**/*.blade.php"],
  theme: {
    extend: {
      colors : {
        'primary_color' : '#FFF8F0'
      }
    },
    fontFamily:{
      sans: ['Poppins', 'sans-serif'],
    }
  },
  plugins: [],
}

