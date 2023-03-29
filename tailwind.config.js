/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "*.php",
    './inc/*.php'
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography')
  ],
}
