/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./view/**/*.php"],
  theme: {
    extend: {
      width: {
        70: "272px",
      },
    },
    fontFamily: {
      body: ["Poppins"],
    },
  },
  plugins: [],
};