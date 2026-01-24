/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./src/**/*.{scss,js,ts,jsx,tsx,css}', './*.php'],
  theme: {
    extend: {
      screens: {
        sm: '600px', // ← ここを追加（デフォルトの640pxを上書き）
      },
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
