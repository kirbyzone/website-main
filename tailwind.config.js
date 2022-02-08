const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    "./site/templates/**/*.{html,php}",
    "./site/snippets/**/*.{html,php}"
  ],
  theme: {
    extend: {
      colors: {
        metal: "#282A36",
        snow: "#EEEEF0",
        cream: "#F9E79F",
        wine: "#792D2F",
        ocean: "#2E4A7D"
      },
      fontFamily: {
        cursive: ["Damion", "cursive"],
        sans: ["Fira Sans", ...defaultTheme.fontFamily.sans]
      },
      animation: {
        'spin-slow': 'spin 8s linear infinite',
        'spin-xslow': 'spin 16s linear infinite',
        'spin-2xslow': 'spin 30s linear infinite',
        'spin-3xslow': 'spin 60s linear infinite'
      },
      listStyleType: {
        square: 'square',
        roman: 'lower-roman',
        alpha: 'lower-alpha'
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
