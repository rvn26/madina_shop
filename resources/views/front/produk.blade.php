@extends('layout.app')

@section('title', 'Madinashop')

@section('content')
    <div class="min-h-screen bg-[#F4F5F1] px-4 pb-24">

        {{-- Pencarian --}}
        <form action="{{route('front.search')}}" class="flex justify-between items-center mx-auto">
            <div class="flex w-full items-center mb-4">
                <div class="flex-grow bg-white rounded-l-full px-4 py-3 shadow-sm flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5a6 6 0 100 12 6 6 0 000-12zM21 21l-4.35-4.35" />
                    </svg>
                    <input type="text" placeholder="Cari produk favoritmu..."
                        class="w-full bg-transparent outline-none text-gray-700">
                </div>

                <button class="ml-0 bg-[#0AA085] text-white px-5 py-3 rounded-r-full font-medium">
                    Cari
                </button>
            </div>
        </form>
        <nav class="flex items-center justify-between pt-3 mb-2 border-b border-gray-700">
            <div class="flex space-x-6">
                <a href="#" class="font-semibold text-text-light border-b-2 border-primary-green pb-1">
                    Terbaru
                </a>
                <a href="#" class="font-medium text-gray-400 hover:text-text-light pb-1">
                    Bestseller
                </a>
            </div>
            <button class="text-gray-400 hover:text-text-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-funnel-icon lucide-funnel">
                    <path
                        d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z" />
                </svg>
            </button>
        </nav>


        <div class="grid grid-cols-2 gap-4">
            {{-- CARD PRODUK --}}
            <div class="bg-white p-4 rounded-xl shadow-sm">
                
                <img src="{{ asset('assets/images/thumbnails/image1.png') }}" class="w-full rounded-lg mb-3" alt="">
                <h3 class="text-sm text-gray-700">Bebelac 3 Susu Pertumbuhan</h3>
                <p class="text-[#0AA085] font-semibold text-sm mt-1">Rp 20.000</p>
                <button class="mt-3 w-full bg-[#0AA085] text-white py-2 rounded-full text-sm font-medium">
                    + Keranjang
                </button>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm">
                <img src="{{ asset('assets/images/thumbnails/image1.png') }}" class="w-full rounded-lg mb-3" alt="">
                <h3 class="text-sm text-gray-700">Bebelac 3 Susu Pertumbuhan</h3>
                <p class="text-[#0AA085] font-semibold text-sm mt-1">Rp 20.000</p>
                <button class="mt-3 w-full bg-[#0AA085] text-white py-2 rounded-full text-sm font-medium">
                    + Keranjang
                </button>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm">
                <img src="{{ asset('assets/images/thumbnails/image1.png') }}" class="w-full rounded-lg mb-3" alt="">
                <h3 class="text-sm text-gray-700">Bebelac 3 Susu Pertumbuhan</h3>
                <p class="text-[#0AA085] font-semibold text-sm mt-1">Rp 20.000</p>
                <button class="mt-3 w-full bg-[#0AA085] text-white py-2 rounded-full text-sm font-medium">
                    + Keranjang
                </button>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm">
                <img src="{{ asset('assets/images/thumbnails/image1.png') }}" class="w-full rounded-lg mb-3" alt="">
                <h3 class="text-sm text-gray-700">Bebelac 3 Susu Pertumbuhan</h3>
                <p class="text-[#0AA085] font-semibold text-sm mt-1">Rp 20.000</p>
                <button class="mt-3 w-full bg-[#0AA085] text-white py-2 rounded-full text-sm font-medium">
                    + Keranjang
                </button>
            </div>
        </div>

    </div>

    {{-- BOTTOM NAV --}}
    @include('navbar.navbar')

@endsection