/** @type {import('tailwindcss').Config} */
module.exports = {
    safelist: [
        'py-1',
        'px-2',
        'text-sm',
        'font-medium',
        'text-green-900',
        'bg-transparent',
        'rounded-l-lg',
        'border',
        'border-green-900',
        'hover:bg-green-900',
        'hover:text-white',
        'focus:z-10',
        'focus:ring-2',
        'focus:ring-green-500',
        'focus:bg-green-900',
        'focus:text-green',
        'bg-green-900',
        'text-white',
        'text-yellow-400',
        'border-t',
        'border-b',
        'border-yellow-900',
        'hover:bg-yellow-400',
        'focus:ring-yellow-500',
        'focus:bg-yellow-400',
        'focus:text-yellow',
        'bg-yellow-400',
        'text-red-800',
        'rounded-r-md',
        'border-red-800',
        'hover:bg-red-800',
        'focus:ring-red-800',
        'focus:bg-red-800',
        'focus:text-red',
        'bg-red-800',
    ],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('flowbite/plugin')
    ],
}
