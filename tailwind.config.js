/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        // Warna dasar background dari gambar (putih gading/creamy)
        'custom-bg': '#F4F5F1',
        // Warna utama untuk tombol dan ikon (hijau sage/mint)
        'primary-green': '#0AA085',
        // Warna teks sekunder
        'secondary-text': '#737373',
      },
    },
  },
  plugins: [],
}
