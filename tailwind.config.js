/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./src/**/*.{scss,js,ts,jsx,tsx,css}', './*.php'],
  theme: {
    extend: {
      colors: {
        primary: '#0b5fff',
      },
      fontFamily: {
        sans: ['var(--font-sans)'],
        en: ['var(--font-en)'],
        serif: ['var(--font-serif)'],
      },
    },
  },
  plugins: [],
  safelist: [],
};
