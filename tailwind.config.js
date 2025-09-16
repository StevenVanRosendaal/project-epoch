/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/css/**/*.css',
        './app/Http/Controllers/**/*.php',
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('daisyui'),
    ],
};
