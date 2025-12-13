<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Vite CSS & JS -->
{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<!-- Title -->
<title>@yield('title', 'My Laravel App')</title>
<script>  // Konfigurasi warna kustom (opsional, untuk mendekati warna background)
    tailwind.config = {
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
    }
</script>
<!-- Placeholder untuk meta tambahan atau CSS/JS khusus halaman -->
@stack('head')