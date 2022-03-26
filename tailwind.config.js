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
                sans: ['Font-awesmoe', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                navColor:'#2180f3'
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
