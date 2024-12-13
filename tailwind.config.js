/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      backgroundImage: {
        'hero-pattern': "url('./src/assets/img/terrain.webp')",
        'footer-texture': "url('/img/footer-texture.png')",
      },
      spacing: {
        'img_width': '100%',
        // 'DF_width': '45rem',
        
      },
      height: {
        h_41_rem: '41rem',
      },
    },

    screens: {
      'telephone': '300px',
      // => @media (min-width: 300px) { ... }

      'tablet': '768px',
      // => @media (min-width: 1024px) { ... }

      'desktop': '1280px',
      // => @media (min-width: 1280px) { ... }
    },

  },
  plugins: [],
}

