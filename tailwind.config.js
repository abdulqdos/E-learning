import defaultTheme from 'tailwindcss/defaultTheme';
import colors from "tailwindcss/colors.js";

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
            colors: {
                primary: '#2563EB',
                white: '#FFFFFF',
                salt: '#F9F9F9',
                lightGray: '#BDC3C7',
                darkGray: '#95A5A6',
                gold: '#F97316',
                lightGold: '#C99700',
                ...colors,
            },
            fontSize: {
                '2xs': '8px',
            }

        },
    },
    plugins: [],
};
