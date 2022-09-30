const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'dark-red': '#b62d35',
                'light-red': '#dc4244',
                'ripe-yellow': '#ccc250',
                'mellon-green': '#465325',
                'pinterest-gray': '#292929',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
