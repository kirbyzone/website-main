// This file controls how Tailwind processes your CSS. For details, see
// https://tailwindcss.com/docs/configuration
const defaultTheme = require("tailwindcss/defaultTheme");
module.exports =
{
  // Turning on the just-in-time compiler:
  mode: 'jit',

  // WARNING: CodeKit overwrites all properties of the "purge" object (except those below) with values from the UI.
  // Visit [Project Settings > Tools > PurgeCSS] to specify content and options. The values below can be
  // uncommented and edited if needed; all others are controlled by CodeKit.
  //
  // purge: {
  //   preserveHtmlElements: true,
  //   layers: ['base', 'components', 'utilities']
  // },


  //
  // All other TailwindCSS options are 100% under your control. Edit this config file as shown in the Tailwind Docs
  // to enable the settings or customizations you need.
  //
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
    }
  },

  variants: {},

  //
  // If you want to run any Tailwind plugins (such as 'tailwindcss-typography'), simply install those into the Project via the
  // Packages area in CodeKit, then pass their names (and, optionally, any configuration values) here.
  // Full file paths are not necessary; CodeKit will find them.
  //
  plugins: [
    require('@tailwindcss/forms')
  ]
}
