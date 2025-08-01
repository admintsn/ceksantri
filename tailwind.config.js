import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'false',

    theme: {
        extend: {
            colors: {
                // "tsn-header": "#3D74AC",
                "tsn-header": "#274043",
                "tsn-bg" : "#f5f3e3",
                "tsn-accent" : "#d3c281",
                "tsn-alert" : "#308d78",
                "tsn-process" : "#9e5d4b",
                // "tsn-bg" : "#CCE3EB",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                'cormorant' : ['Cormorant-Infant'],
                'raleway' : ['Raleway'],
                'assistant' : ['Assistant'],
            },
        },
    },

    plugins: [forms],
};
