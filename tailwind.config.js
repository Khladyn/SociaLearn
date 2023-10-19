import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                black: '#000000',
                darkgrey: '#22272A',
                white: '#FFFFFF',
                lightgrey: '#E3E6E8',
                yellow: '#FEC00F',
                lightyellow: '#FFEBB3',
                brown: '#4D38000',
                orange: '#FF8B00',
                lightorange: '#FFAF4D',
                blue: '#00A1E4',
            },
        },
    },

    plugins: [forms],
};
