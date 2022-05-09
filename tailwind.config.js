const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    orange: '#F3B16A',
                    purple: '#8070E8',
                    aqua: '#C2EFE1',
                    blue: '#29D5D7',
                    'dark-blue': '#4D8CF0',
                    pink: '#CF8FF8',
                    'gray-chat': '#E2E2E2',
                    'gray-input-chat': '#EFEDED'
                }
            },
            screens: {
                'xs': '498px'
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
