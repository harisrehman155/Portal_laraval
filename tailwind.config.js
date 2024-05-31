module.exports = {
  theme: {
    extend: {
      height: {
        '49': '12.45rem',
        '102': '21.75rem',
        '108': '26.2rem'
      },
      padding:{
        'x5' : '5px'
      },
      container: {
        center: true,
      },
      colors: {
        white:{
          '900' : 'rgba(255,255,255,0.9)'
        },
        gray: {
          '100': '#f5f5f5',
          '200': '#eeeeee',
          '300': '#e6e9eb',
          '400': '#bdbdbd',
          '500': '#585858',
          '600': '#757575',
          '700': '#616161',
          '800': '#424242',
          '900': '#212121',
        }
      }
    },
  },
  variants: {},
  plugins: [
    require('./public/plugins/object-fit')(['responsive']),
  ],
}