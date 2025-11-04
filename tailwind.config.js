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
                'custom-accent': '#1a237e',
                'custom-text': '#1a1a1a',
                'custom-muted': '#666',
                'custom-line': '#e6e6ee',
                'custom-bg': '#f7f7fb',
                'custom-chip-bg': '#eef2ff',
                'custom-chip-border': '#dfe6ff',
                'custom-chip-text': '#233b85',
            }   
        },
    },

    plugins: [forms],
};
