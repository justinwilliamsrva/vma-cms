import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                raleway: ['Raleway', 'sans-serif'],
            },
            colors: {
                'background': {
                    primary: '#E1DFD9',
                    secondary: '#FFFFFF',
                    special: '#4F7D61',
                },
                'village': {
                    green: '#4F7D61',
                }
            },
            width : {
                42: '10.5rem',
            }
        },
    },

    plugins: [forms],
};
