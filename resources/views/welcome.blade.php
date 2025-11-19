<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concertix – Pemesanan Tiket Konser</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
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
            <img src="/logo/ticket-icon.svg" alt="logo" class="w-8 h-8">
            <span class="text-3xl font-bold tracking-widest">TICKETER</span>
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
                    class="flex items-center space-x-2 bg-white text-indigo-700 px-5 py-2 rounded-full font-semibold hover:bg-gray-100 transition">
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
                    class="flex items-center space-x-2 bg-indigo-600 text-white px-5 py-2 rounded-full font-semibold hover:bg-indigo-700 transition">
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
                    <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?auto=format&fit=crop&w=2000&q=80"
                         class="w-full h-[430px] object-cover rounded-3xl" />
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1507878866276-a947ef722fee?auto=format&fit=crop&w=2000&q=80"
                         class="w-full h-[430px] object-cover rounded-3xl" />
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1506157786151-b8491531f063?auto=format&fit=crop&w=2000&q=80"
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
<section class="w-full bg-gradient-to-b from-[#0a0c38] to-[#080a2c] py-10">
    <div class="max-w-4xl mx-auto px-6">

        <!-- Search Box -->
        <div class="bg-white rounded-full shadow-lg flex items-center px-6 py-4 space-x-4">

            <!-- Search Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-400" fill="none" 
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
            </svg>

            <!-- Input -->
            <input 
                type="text" 
                placeholder="Cari event dan atraksi di sini ..."
                class="w-full bg-transparent focus:outline-none text-lg text-gray-700 placeholder-gray-400"
            >
        </div>

    </div>
</section>






<section class="concert-slider">
  <!-- Cards with singer images, name, date, and button -->
</section>

<section class="our-benefits">
  <!-- Icon + description items -->
</section>

<section class="time-running-out">
  <!-- Another slider with concerts -->
</section>

<section class="steps">
  <!-- 4 steps/icons -->
</section>

<section class="upcoming-concerts">
  <!-- Grid of upcoming concert cards -->
</section>



<section class="testimonials">
  <!-- Carousel of reviews -->
</section>

<section class="faq">
  <!-- Accordion FAQ -->
</section>

<footer>
  <!-- Footer content -->
</footer>


    <!-- Info Cards -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Mengapa Memilih Concertix?</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-semibold text-indigo-700 mb-2">Mudah & Cepat</h3>
                    <p class="text-gray-600">Proses pemesanan hanya dalam 3 langkah. Tiket langsung dikirim ke emailmu.</p>
                </div>
                <div class="p-6 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-semibold text-indigo-700 mb-2">Event Terlengkap</h3>
                    <p class="text-gray-600">Ratusan event konser dari berbagai genre, selalu update setiap minggu.</p>
                </div>
                <div class="p-6 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-semibold text-indigo-700 mb-2">Aman & Terpercaya</h3>
                    <p class="text-gray-600">Pembayaran aman, tiket 100% garansi asli, dan layanan pelanggan 24/7.</p>
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

    <script>
    new Swiper(".myHeroSwiper", {
        loop: true,
        centeredSlides: true,
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 3000,
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


</body>
</html>
