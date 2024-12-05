import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};

// tailwind.config.js
module.exports = {
    content: [
      "./src/**/*.{html,js,vue}",  // Todos los archivos HTML, JS, y Vue dentro de la carpeta src
      "./public/index.html"         // Archivo HTML principal en la carpeta public
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  }
  
