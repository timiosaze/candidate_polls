const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    mode: 'jit',
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
   // These paths are just examples, customize them to match your project structure
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],
    theme: {
        extend: {
            colors: {
                primary: {"50":"#f0fdf4","100":"#dcfce7","200":"#bbf7d0","300":"#86efac","400":"#4ade80","500":"#22c55e","600":"#16a34a","700":"#15803d","800":"#166534","900":"#14532d"}
            },
            fontFamily: {
                sans: ['Proxima Nova', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    safelist: [
        'bg-cyan-100',
    ],   
    plugins: [
        require('@tailwindcss/forms'), 
        require('flowbite/plugin'),
        plugin(function({ addVariant }) {
            addVariant('optional', '&:optional')
            addVariant('hocus', ['&:hover', '&:focus'])
            addVariant('supports-grid', '@supports (display: grid)')
        })
    ],
};
