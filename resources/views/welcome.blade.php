<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concertix – Pemesanan Tiket Konser</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(135deg, #fdfdfd 0%, #f8f9fa 100%);
        }
        .hero-bg {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('https://images.unsplash.com/photo-1470225620780-dba8ba36b745?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="font-sans antialiased">

    <!-- Header -->
    <header class="w-full bg-gradient-to-b from-[#0d0f55] to-[#0a0c38] text-white py-4">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">

        <!-- LEFT: Menu -->
        <nav class="flex items-center space-x-10 text-lg font-medium">
            <a href="#" class="hover:text-indigo-300 transition">Home</a>
            <a href="#" class="hover:text-indigo-300 transition">Concerts</a>
            <a href="#" class="hover:text-indigo-300 transition">Singers</a>
        </nav>

       <!-- CENTER: Logo -->
<div class="absolute left-1/2 transform -translate-x-1/2 flex items-center space-x-2">
    <img src="{{ asset('logo/header.png') }}" alt="logo" class="h-12">
</div>


        <!-- RIGHT: Cart + Login + Register -->
        <div class="flex items-center space-x-4">

            <!-- Cart Icon -->
            <button class="text-white hover:text-indigo-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                     stroke-width="1.7" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437m0 
                          0L6.75 12.75h10.5l2.25-6.75H5.106m0 
                          0l-.383-1.438M6.75 12.75L7.5 15.75h9l.75-3"/>
                </svg>
            </button>

            @guest
                <!-- LOGIN -->
                <a href="{{ route('login') }}"
                    class="flex items-center space-x-2 bg-white text-indigo-700 px-5 py-2 rounded-3xl font-semibold hover:bg-gray-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.7" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 
                              7.5 0 0115 0"/>
                    </svg>
                    <span>Login</span>
                </a>

                <!-- REGISTER -->
                <a href="{{ route('register') }}"
                    class="flex items-center space-x-2 bg-indigo-600 text-white px-5 py-2 rounded-3xl font-semibold hover:bg-indigo-700 transition">
                    <span>Register</span>
                </a>
            @else
                <!-- Jika user login -->
                <a href="{{ route($dashboardRoute) }}"
                    class="bg-white text-indigo-700 px-5 py-2 rounded-full font-semibold hover:bg-gray-100 transition">
                    Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="bg-red-600 text-white px-5 py-2 rounded-full font-semibold hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            @endguest

        </div>
    </div>
</header>


    <!-- Hero Section -->
   <section class="w-full py-10 bg-gradient-to-b from-[#0d0f55] to-[#0a0c38]">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Slider Container -->
        <div class="swiper myHeroSwiper relative">

            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <img src="https://assets.artatix.co.id/event/5733F6KNY0.png"
                         class="w-full h-[430px] object-cover rounded-3xl" />
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <img src="https://staticassets.kiostix.com/banner/1763438823733_1761539197585_sigma.png"
                         class="w-full h-[430px] object-cover rounded-3xl" />
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <img src="	https://assets.artatix.co.id/event/event_6896f7c6e7526.jpg"
                         class="w-full h-[430px] object-cover rounded-3xl" />
                </div>

            </div>

            <!-- LEFT Arrow -->
            <div class="swiper-button-prev !left-4 !bg-white !text-black !rounded-full !w-10 !h-10 shadow-lg"></div>

            <!-- RIGHT Arrow -->
            <div class="swiper-button-next !right-4 !bg-white !text-black !rounded-full !w-10 !h-10 shadow-lg"></div>

            <!-- PAGINATION -->
            <div class="swiper-pagination !bottom-0"></div>

        </div>

    </div>
</section>

<!-- HERO SEARCH SECTION -->
<section class="w-full bg-gradient-to-b py-10">
    <div class="max-w-4xl mx-auto px-6">

        <!-- Search Box -->
        <div class="bg-white rounded-3xl shadow-lg flex items-center px-6 py-4 space-x-4">

            <!-- Search Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-400" fill="none" 
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
            </svg>

            <!-- Input -->
            <input 
                type="" 
                placeholder="Cari concert ..."
                class="w-full bg-transparent focus:outline-none text-lg text-gray-700 placeholder-gray-400"
            >
        </div>

    </div>
</section>

<!-- EVENT TERBARU SECTION -->
<section class="w-full bg-white py-14">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-bold text-gray-900">Event Terbaru</h2>
            <a href="#" class="text-indigo-600 font-semibold hover:underline">Lihat semua</a>
        </div>

        <!-- Event List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

            <!-- CARD 1 -->
            <div class="border rounded-xl shadow hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?auto=format&fit=crop&w=900&q=80"
                     class="w-full h-56 object-cover rounded-t-xl" />

                <div class="p-4">
                    <div class="flex items-center text-gray-600 text-sm space-x-2">
                        <span>📍 Jakarta Timur</span>
                    </div>

                    <div class="flex items-center text-gray-600 text-sm space-x-2">
                        <span>📅 24 Jan 26</span>
                    </div>

                    <h3 class="mt-2 text-lg font-semibold">FREEDOM EXODUS</h3>

                    <p class="text-sm mt-2 text-gray-700">
                        Mulai dari <span class="text-red-600 font-bold">Rp. 58.500</span>
                    </p>

                    <span class="text-green-600 font-medium text-sm">Tiket Tersedia</span>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="border rounded-xl shadow hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1507878866276-a947ef722fee?auto=format&fit=crop&w=900&q=80"
                     class="w-full h-56 object-cover rounded-t-xl" />

                <div class="p-4">
                    <div class="flex items-center text-gray-600 text-sm space-x-2">
                        <span>📍 Jakarta Pusat</span>
                    </div>

                    <div class="flex items-center text-gray-600 text-sm space-x-2">
                        <span>📅 31 Jan 26</span>
                    </div>

                    <h3 class="mt-2 text-lg font-semibold">WOD Jakarta 2026</h3>

                    <p class="text-sm mt-2 text-gray-700">
                        Mulai dari <span class="text-red-600 font-bold">Rp. 200.000</span>
                    </p>

                    <span class="text-green-600 font-medium text-sm">Tiket Tersedia</span>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="border rounded-xl shadow hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1506157786151-b8491531f063?auto=format&fit=crop&w=900&q=80"
                     class="w-full h-56 object-cover rounded-t-xl" />

                <div class="p-4">
                    <div class="flex items-center text-gray-600 text-sm space-x-2">
                        <span>📍 Jakarta Pusat</span>
                    </div>

                    <div class="flex items-center text-gray-600 text-sm space-x-2">
                        <span>📅 22 - 22 Nov 25</span>
                    </div>

                    <h3 class="mt-2 text-lg font-semibold">Byon Combat Showbiz Vol.6</h3>

                    <p class="text-sm mt-2 text-gray-700">
                        Mulai dari <span class="text-red-600 font-bold">Rp. 150.000</span>
                    </p>

                    <span class="text-green-600 font-medium text-sm">Tiket Tersedia</span>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="border rounded-xl shadow hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80"
                     class="w-full h-56 object-cover rounded-t-xl" />

                <div class="p-4">
                    <div class="flex items-center text-gray-600 text-sm space-x-2">
                        <span>📍 Bali</span>
                    </div>

                    <div class="flex items-center text-gray-600 text-sm space-x-2">
                        <span>📅 s31 Des 25</span>
                    </div>

                    <h3 class="mt-2 text-lg font-semibold">GWK Bali Countdown 2026</h3>

                    <p class="text-sm mt-2 text-gray-700">
                        Mulai dari <span class="text-red-600 font-bold">Rp. 175.000</span>
                    </p>

                    <span class="text-green-600 font-medium text-sm">Tiket Tersedia</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 4 EASY STEPS SECTION -->
<section class="w-full py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Left Title -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-16">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-3">
                    4 Easy Steps To Buy a Ticket!
                </h2>
                <p class="text-gray-500">
                    Get familiar with our 4 easy working process
                </p>
            </div>

            <!-- CTA Button -->
            <a href="#" 
               class="mt-6 md:mt-0 inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl transition">
                Buy Ticket
                <span class="ml-2 text-lg">→</span>
            </a>
        </div>

        <!-- Steps Container -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 text-center">

            <!-- Step 1 (Choose A Concert) – kamu ganti gambarnya nanti -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('logo/date.png') }}" alt="concert" class="h-32 mb-6">
                <h3 class="font-semibold text-lg mb-2">Choose A Concert</h3>
                <p class="text-gray-500 text-sm">
                    You can see concert tickets in our website and check which one is good for you.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col items-center">
         <img src="{{ asset('logo/datete.png') }}" alt="concert" class="h-32 mb-6">
                <h3 class="font-semibold text-lg mb-2">Choose Date & Time</h3>
                <p class="text-gray-500 text-sm">
                    You can check date and time of your favorite concert in our website.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('logo/paybil.png') }}" alt="concert" class="h-32 mb-6">
                <h3 class="font-semibold text-lg mb-2">Pay Your Bill</h3>
                <p class="text-gray-500 text-sm">
                    After choosing your date and preferred seat you can pay the ticket online.
                </p>
            </div>

            <!-- Step 4 -->
            <div class="flex flex-col items-center">
               <img src="{{ asset('logo/download.png') }}" alt="concert" class="h-32 mb-6">
                <h3 class="font-semibold text-lg mb-2">Download Your Ticket!</h3>
                <p class="text-gray-500 text-sm">
                    After completing checkout, download your ticket and get ready for the event!
                </p>
            </div>

        </div>

    </div>
</section>


    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; {{ date('Y') }} Concertix. All rights reserved.</p>
        </div>
    </footer>




</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
  new Swiper(".myHeroSwiper", {
    loop: true,
    centeredSlides: true,
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
      delay: 4000, // 5 detik
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>



</html>
