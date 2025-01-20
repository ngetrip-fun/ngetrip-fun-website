@extends('layout.master')
@section('content')
    <x-navbar/>
    <header class="flex flex-col items-center py-[100px] w-full max-w-[1280px] mx-auto px-16">
        <div id="Badge" class="flex items-center w-fit rounded-full p-2 pr-6 gap-3 bg-patungan-black">
            <img src="{{ asset('assets/images/photos/Profiles.png') }}" class="h-9 flex shrink-0" alt="icon">
            <p class="font-semibold leading-5 text-white"><span class="font-extrabold">16.500+</span> Travelers Have
                Joined
                🔥 </p>
        </div>
        <h1 class="font-Grifter text-[62px] text-center mt-[42px] flex justify-center flex-wrap">
            <span class="!block">Patungan ke</span>
            <!-- animation from javascript -->
            <span id="slider-container" class="text-nowrap !block overflow-hidden ml-6 relative z-10">
            <span id="slider" class="absolute flex transition-all duration-500 z-10">
                <span
                    class="bg-clip-text text-transparent bg-[linear-gradient(90deg,#E25520_0%,#E45687_100%)] whitespace-nowrap">Bromo,</span>
                <span
                    class="bg-clip-text text-transparent bg-[linear-gradient(90deg,#E25520_0%,#E45687_100%)] whitespace-nowrap">Labuan Bajo,</span>
                <span
                    class="bg-clip-text text-transparent bg-[linear-gradient(90deg,#E25520_0%,#E45687_100%)] whitespace-nowrap">Raja Ampat,</span>
            </span>
        </span>
            <span class="!block w-full">Jadi Lebih Terjangkau</span>
        </h1>
        <p class="font-medium text-lg text-center text-patungan-grey">
            Patungan tiket wisata untuk perjalanan bersama yang lebih murah dan mudah. <br>
            Nikmati pengalaman seru ke destinasi impian Anda tanpa membebani kantong!
        </p>
        <div class="flex items-center justify-center gap-6 mt-16">
            <a href="#" class="flex items-center rounded-full h-[60px] w-fit px-9 gap-[6px] bg-patungan-orange">
                <span class="font-bold text-lg leading-5 text-white">Mulai Patungan</span>
                <img src="{{ asset('assets/images/icons/arrow-right-white.svg') }}" class="w-6 flex shrink-0"
                     alt="icon">
            </a>
            <a href="#"
               class="flex items-center rounded-full h-[60px] w-fit px-9 gap-[6px] bg-white border border-patungan-border">
                <span class="font-bold text-lg leading-5">Lihat Cara Kerja</span>
            </a>
        </div>
    </header>
    <section id="Stats" class="w-full flex justify-center bg-patungan-black">
        <div class="flex items-center gap-8 w-full max-w-[1280px] px-16 py-[42px]">
            <div class="flex flex-col w-[222px] gap-[6px] text-center">
                <p class="font-Grifter font-bold text-[42px] leading-[44px] text-white">2.209+</p>
                <p class="font-medium text-xl leading-[25px] text-patungan-violet">Wisatawan Bergabung</p>
            </div>
            <img src="{{ asset('assets/images/icons/star-divider-white.svg') }}" class="w-6 flex shrink-0" alt="icon">
            <div class="flex flex-col w-[222px] gap-[6px] text-center">
                <p class="font-Grifter font-bold text-[42px] leading-[44px] text-white">9/10</p>
                <p class="font-medium text-xl leading-[25px] text-patungan-violet">Wisatawan Puas</p>
            </div>
            <img src="{{ asset('assets/images/icons/star-divider-white.svg') }}" class="w-6 flex shrink-0" alt="icon">
            <div class="flex flex-col w-[222px] gap-[6px] text-center">
                <p class="font-Grifter font-bold text-[42px] leading-[44px] text-white">12</p>
                <p class="font-medium text-xl leading-[25px] text-patungan-violet">Destinasi Wisata</p>
            </div>
            <img src="{{ asset('assets/images/icons/star-divider-white.svg') }}" class="w-6 flex shrink-0" alt="icon">
            <div class="flex flex-col w-[222px] gap-[6px] text-center">
                <p class="font-Grifter font-bold text-[42px] leading-[44px] text-white">4.920+</p>
                <p class="font-medium text-xl leading-[25px] text-patungan-violet">Patungan Terlaksana</p>
            </div>
        </div>
    </section>

    <section id="Products" class="relative w-full overflow-hidden">
        <div class="Background-Effect absolute w-full h-full overflow-hidden">
            <img src="{{ asset('assets/images/backgrounds/Ellipse-top.svg') }}"
                 class="absolute top-0 -right-[337px] z-0" alt="eclipse bg">
            <img src="{{ asset('assets/images/backgrounds/Ellipse-bottom.svg') }}"
                 class="absolute bottom-0 -left-[283px] z-0" alt="eclipse bg">
        </div>
        <section class="Content relative flex flex-col w-full max-w-[1280px] px-16 mx-auto gap-8 py-[100px]">
            <div class="flex items-center justify-between">
                <div class="flex flex-col gap-5">
                    <h2 class="font-bold text-xl leading-[25px] text-patungan-red">Pilihan Wisata</h2>
                    <p class="font-Grifter font-bold text-4xl leading-[37px]">Destinasi Seru dengan Harga Hemat 🚀</p>
                </div>
                <a href="#"
                   class="flex items-center rounded-full h-[60px] w-fit py-3 px-9 gap-[6px] bg-white border border-patungan-border">
                    <span class="font-bold text-lg leading-5">Lihat Semua Produk</span>
                    <img src="{{ asset('assets/images/icons/arrow-circle-down-black.svg') }}" class="w-6 flex shrink-0"
                         alt="icon">
                </a>
            </div>
            <div class="grid grid-cols-3 gap-6">
                @forelse($newProducts as $itemNewProduct)
                    <div class="product-card flex flex-col rounded-[32px] overflow-hidden bg-white">
                        <div class="w-full h-[180px] flex shrink-0 bg-[#D9D9D9]">
                            <img src="{{ Storage::url($itemNewProduct->thumbnail) }}" class="w-full h-full object-cover"
                                 alt="thumbnails">
                        </div>
                        <div class="flex flex-col p-6 gap-6">
                            <div class="flex items-center gap-3">
                                <div class="w-[62px] h-[62px] flex shrink-0 rounded-xl overflow-hidden">
                                    <img src="{{ Storage::url($itemNewProduct->photo) }}"
                                         class="w-full h-full object-contain object-center" alt="icon">
                                </div>
                                <div>
                                    <p class="font-bold text-xl leading-[25px]">
                                        {{ $itemNewProduct->name }}
                                    </p>
                                    <div class="flex items-center gap-[2px] mt-[2px]">
                                        <img src="{{ asset('assets/images/icons/Star.svg') }}" class="w-6 flex shrink-0"
                                             alt="icon">
                                        <p class="font-bold text-lg leading-[22px]">4.9</p>
                                        <p class="font-semibold leading-[20px] text-patungan-grey">(2120 Ulasan)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col rounded-3xl border border-patungan-border p-4 gap-4">
                                <div class="flex items-center justify-between">
                                    <p class="font-extrabold text-2xl leading-[30px]">
                                        Rp {{ number_format($itemNewProduct->price_per_person, 0, '.', ',') }}
                                    </p>
                                    <div class="flex items-center rounded-lg p-2 gap-1 bg-patungan-red/10">
                                        <img src="{{ asset('assets/images/icons/clock-red.svg') }}"
                                             class="w-6 flex shrink-0" alt="icon">
                                        <p class="font-bold leading-5 text-patungan-red">
                                            {{ $itemNewProduct->duration }} Hari
                                        </p>
                                    </div>
                                </div>
                                <hr class="border-patungan-border">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('assets/images/icons/verify-green.svg') }}"
                                         class="w-[18px] flex shrink-0" alt="icon">
                                    <p class="font-medium text-lg leading-[22px] text-patungan-grey">Patungan lebih
                                        hemat hingga 50%</p>
                                </div>
                            </div>
                            <a href="{{ route('front.details', $itemNewProduct->slug) }}"
                               class="flex items-center rounded-full h-[60px] px-9 w-full gap-[6px] bg-patungan-orange justify-center">
                                <span class="font-bold text-lg leading-5 text-white">Pesan Sekarang</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-lg text-patungan-grey text-start">Belum ada produk wisata
                        terbaru, cek kembali
                        nanti!</p>
                @endforelse
            </div>
            <button
                class="flex items-center rounded-full border border-patungan-orange/10 bg-patungan-orange/10 h-[60px] px-9 gap-2 justify-center">
                <span class="font-bold leading-5 text-patungan-orange">Lihat Semua Destinasi</span>
                <img src="{{ asset('assets/images/icons/arrow-right-orange.svg') }}" class="w-6 flex shrink-0"
                     alt="icon">
            </button>
        </section>
    </section>

    <section id="How-It-Works" class="flex py-[100px] w-full max-w-[1280px] mx-auto px-16 gap-6 justify-between">
        <div class="relative flex w-full h-[inherit]">
            <div class="sticky top-0 flex flex-col w-full max-w-[510px] gap-[54px] h-fit">
                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-5">
                        <h2 class="font-bold text-xl leading-[25px] text-patungan-red">How it Works</h2>
                        <p class="font-Grifter font-bold text-4xl leading-[37px]">Proses Mudah, Hasil Maksimal</p>
                    </div>
                    <p class="font-medium text-lg text-patungan-grey">
                        Kami hadir untuk memberikan kemudahan bagi Anda dalam berbagi langganan dengan cara yang cepat,
                        aman, dan hemat.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/verify-green.svg') }}"
                                 class="w-[18px] flex shrink-0" alt="icon">
                            <p class="font-medium text-lg leading-[22px] text-patungan-grey">Privasi terjamin</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/verify-green.svg') }}"
                                 class="w-[18px] flex shrink-0" alt="icon">
                            <p class="font-medium text-lg leading-[22px] text-patungan-grey">Metode pembayaran
                                fleksibel</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/verify-green.svg') }}"
                                 class="w-[18px] flex shrink-0" alt="icon">
                            <p class="font-medium text-lg leading-[22px] text-patungan-grey">Akun resmi & legal</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/verify-green.svg') }}"
                                 class="w-[18px] flex shrink-0" alt="icon">
                            <p class="font-medium text-lg leading-[22px] text-patungan-grey">Layanan 24/7</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/verify-green.svg') }}"
                                 class="w-[18px] flex shrink-0" alt="icon">
                            <p class="font-medium text-lg leading-[22px] text-patungan-grey">Hemat hingga 50%</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/verify-green.svg') }}"
                                 class="w-[18px] flex shrink-0" alt="icon">
                            <p class="font-medium text-lg leading-[22px] text-patungan-grey">Dan masih banyak lagi</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="flex items-center rounded-full h-[60px] w-fit px-9 gap-[6px] bg-patungan-orange">
                    <span class="font-bold text-lg leading-5 text-white">Pesan Sekarang</span>
                    <img src="{{ asset('assets/images/icons/arrow-right-white.svg') }}" class="w-6 flex shrink-0"
                         alt="icon">
                </a>
            </div>
        </div>
        <div class="flex flex-col w-full h-fit max-w-[560px] gap-8">
            <div class="card flex flex-col w-full rounded-[32px] bg-white overflow-hidden">
                <div class="flex flex-col gap-6 p-6">
                    <div class="flex items-center gap-4">
                    <span
                        class="flex w-11 shrink-0 rounded-[100px] h-[56px] bg-patungan-orange/10 justify-center items-center font-bold text-[32px] leading-[40px] text-patungan-orange">
                        1
                    </span>
                        <p class="font-Grifter font-bold text-2xl leading-[25px]">Pilih Trip Anda</p>
                    </div>
                    <p class="font-medium text-lg leading-8 text-patungan-grey">
                        Temukan Trip yang Anda butuhkan. Nikmati beragam pilihan
                        wisata dengan biaya lebih hemat.
                    </p>
                </div>
                {{--                <div class="flex w-full h-[232px] overflow-hidden">--}}
                {{--                    <img src="{{ asset('assets/images/thumbnails/select-product.png') }}"--}}
                {{--                         class="w-full h-full object-cover object-top" alt="icon">--}}
                {{--                </div>--}}
            </div>
            <div class="card flex flex-col w-full rounded-[32px] bg-white overflow-hidden">
                <div class="flex flex-col gap-6 p-6">
                    <div class="flex items-center gap-4">
                    <span
                        class="flex w-11 shrink-0 rounded-[100px] h-[56px] bg-patungan-orange/10 justify-center items-center font-bold text-[32px] leading-[40px] text-patungan-orange">
                        2
                    </span>
                        <p class="font-Grifter font-bold text-2xl leading-[25px]">Proses Pembayaran</p>
                    </div>
                    <p class="font-medium text-lg leading-8 text-patungan-grey">
                        Lakukan pembayaran dengan mudah sesuai nominal yang ditentukan. Anda bisa bergabung dengan grup
                        patungan untuk membagi biaya.
                    </p>
                </div>
                {{--                <div class="flex w-full h-[232px] overflow-hidden">--}}
                {{--                    <img src="{{ asset('assets/images/thumbnails/payment-process.png') }}"--}}
                {{--                         class="w-full h-full object-cover object-top" alt="icon">--}}
                {{--                </div>--}}
            </div>
            <div class="card flex flex-col w-full rounded-[32px] bg-white overflow-hidden">
                <div class="flex flex-col gap-6 p-6">
                    <div class="flex items-center gap-4">
                    <span
                        class="flex w-11 shrink-0 rounded-[100px] h-[56px] bg-patungan-orange/10 justify-center items-center font-bold text-[32px] leading-[40px] text-patungan-orange">
                        3
                    </span>
                        <p class="font-Grifter font-bold text-2xl leading-[25px]">Gabung Grup</p>
                    </div>
                    <p class="font-medium text-lg leading-8 text-patungan-grey">
                        Setelah pembayaran selesai, Anda akan dimasukkan ke grup patungan
                    </p>
                </div>
                {{--                <div class="flex w-full h-[232px] overflow-hidden">--}}
                {{--                    <img src="{{ asset('assets/images/thumbnails/join-group.png') }}"--}}
                {{--                         class="w-full h-full object-cover object-top" alt="icon">--}}
                {{--                </div>--}}
            </div>
        </div>
    </section>

    <section id="Payment-Method" class="bg-[linear-gradient(69.16deg,#FFFFFF_0.82%,rgba(255,255,255,0)_52.97%)]">
        <div class="Content flex flex-col py-[100px] w-full max-w-[1280px] mx-auto px-16 gap-9">
            <div class="flex flex-col items-center text-center">
                <div class="flex flex-col gap-5">
                    <h2 class="font-bold text-xl leading-[25px] text-patungan-red">Payment Methods</h2>
                    <p class="font-Grifter font-bold text-4xl leading-[37px]">Beragam Metode pembayaran</p>
                    <div class="flex items-center justify-center gap-6">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/verify-green.svg') }}"
                                 class="w-[18px] flex shrink-0" alt="icon">
                            <p class="font-medium text-lg leading-[22px] text-patungan-grey">Bank Transfer</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/verify-green.svg') }}"
                                 class="w-[18px] flex shrink-0" alt="icon">
                            <p class="font-medium text-lg leading-[22px] text-patungan-grey">Virtual Account</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/verify-green.svg') }}"
                                 class="w-[18px] flex shrink-0" alt="icon">
                            <p class="font-medium text-lg leading-[22px] text-patungan-grey">Digital Wallet</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex w-full max-w-[1000px] mx-auto overflow-hidden">
                <img src="{{ asset('assets/images/thumbnails/supported-payments.png') }}"
                     class="w-full h-full object-contain object-center" alt="payments">
            </div>
        </div>
    </section>
    <section id="Happy-Customer"
             class="py-[100px] bg-[linear-gradient(180deg,rgba(255,255,255,0.5)_50%,rgba(243,239,245,0)_100%)]">
        <div class="flex flex-col gap-5 text-center px-16">
            <h2 class="font-bold text-xl leading-[25px] text-patungan-red">Happy Customers</h2>
            <p class="font-Grifter font-bold text-4xl leading-[37px]">Happy Customer Feedback on Our Services</p>
        </div>
        <div id="Card-Slider" class="relative flex flex-col gap-6 mt-[30px] overflow-hidden">
            <!-- Top Slider -->
            <div id="Top-Slider" class="group flex flex-nowrap flex-row">
                <div class="flex flex-row w-max gap-6 flex-nowrap animate-[slide_50s_linear_infinite] pl-6">
                    @foreach ($testimonials as $testimonial)
                        <div class="card flex flex-col w-[322px] h-full shrink-0 rounded-3xl p-6 gap-6 bg-white">
                            <div class="flex items-center gap-3">
                                <div class="flex w-16 h-16 rounded-full overflow-hidden shrink-0">
                                    <img src="{{ asset('assets/images/photos/' . $testimonial['image']) }}"
                                         class="w-full h-full object-cover" alt="photos">
                                </div>
                                <div>
                                    <p class="font-semibold text-lg leading-[22px]">{{ $testimonial['name'] }}</p>
                                    <p class="font-semibold leading-5 text-patungan-grey">{{ $testimonial['trip'] }}</p>
                                </div>
                            </div>
                            <hr class="border-patungan-border">
                            <div class="flex flex-col gap-6 justify-between h-full">
                                <p class="font-semibold leading-[28px]">"{{ $testimonial['review'] }}"</p>
                                <div class="flex items-center gap-[2px]">
                                    @for ($i = 0; $i < $testimonial['stars']; $i++)
                                        <img src="{{ asset('assets/images/icons/Star.svg') }}" class="w-6 flex shrink-0"
                                             alt="star">
                                    @endfor
                                    @for ($i = $testimonial['stars']; $i < 5; $i++)
                                        <img src="{{ asset('assets/images/icons/Star-outline.svg') }}"
                                             class="w-6 flex shrink-0" alt="star">
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Bottom Slider -->
            <div id="Bottom-Slider" class="group flex flex-nowrap flex-row">
                <div class="flex flex-row w-max gap-6 flex-nowrap animate-[slideToR_50s_linear_infinite] pr-6">
                    @foreach ($testimonials as $testimonial)
                        <div class="card flex flex-col w-[322px] h-full shrink-0 rounded-3xl p-6 gap-6 bg-white">
                            <div class="flex items-center gap-3">
                                <div class="flex w-16 h-16 rounded-full overflow-hidden shrink-0">
                                    <img src="{{ asset('assets/images/photos/' . $testimonial['image']) }}"
                                         class="w-full h-full object-cover" alt="photos">
                                </div>
                                <div>
                                    <p class="font-semibold text-lg leading-[22px]">{{ $testimonial['name'] }}</p>
                                    <p class="font-semibold leading-5 text-patungan-grey">{{ $testimonial['trip'] }}</p>
                                </div>
                            </div>
                            <hr class="border-patungan-border">
                            <div class="flex flex-col gap-6 justify-between h-full">
                                <p class="font-semibold leading-[28px]">"{{ $testimonial['review'] }}"</p>
                                <div class="flex items-center gap-[2px]">
                                    @for ($i = 0; $i < $testimonial['stars']; $i++)
                                        <img src="{{ asset('assets/images/icons/Star.svg') }}"
                                             class="w-6 flex shrink-0">
                                    @endfor
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <div id="Foreground"
                 class="absolute bottom-0 w-full h-[457px] flex items-end justify-center bg-[linear-gradient(180deg,rgba(245,243,246,0)_0%,#F5F3F6_100%)]">
                <a href="#" class="flex items-center rounded-full h-[60px] w-fit px-9 gap-[6px] bg-patungan-orange">
                    <span class="font-bold text-lg leading-5 text-white">Pesan Sekarang</span>
                    <img src="{{ asset('assets/images/icons/arrow-right-white.svg') }}" class="w-6 flex shrink-0"
                         alt="icon">
                </a>
            </div>
        </div>
    </section>

    <section id="FAQ"
             class="py-[100px] bg-[linear-gradient(270deg,rgba(255,255,255,0.5)_50%,rgba(243,239,245,0)_100%)]">
        <div class="content flex flex-col w-full max-w-[1280px] mx-auto px-16 gap-8">
            <div class="flex flex-col gap-5 text-center px-16">
                <h2 class="font-bold text-xl leading-[25px] text-patungan-red">Pertanyaan yang Sering Ditanyakan</h2>
                <p class="font-Grifter font-bold text-4xl leading-[37px]">Pertanyaan Umum Tentang Layanan Patungan
                    Trip</p>
            </div>
            <div class="flex gap-6">
                <div id="Left-Cards" class="flex flex-col gap-6">
                    <div class="faq-card flex flex-col rounded-3xl p-8 gap-4 bg-white">
                        <p class="font-Grifter font-bold text-2xl leading-[25px]">1</p>
                        <div
                            class="accordion group flex flex-col has-[:checked]:!h-11 overflow-hidden transition-all duration-300">
                            <label class="flex items-center gap-4 justify-between min-h-[38px]">
                                <input type="checkbox" class="hidden" checked>
                                <h3 class="font-Grifter text-lg leading-[25px]">Kapan rencana patungan trip saya
                                    aktif?</h3>
                                <img src="{{ asset('assets/images/icons/arrow-head-down-black.svg') }}"
                                     class="w-6 flex shrink-0 group-has-[:checked]:-rotate-180 transition-all duration-300">
                            </label>
                            <div class="accordion-content mt-4">
                                <p class="font-semibold leading-[25px]">Rencana patungan trip Anda akan aktif segera
                                    setelah pembayaran berhasil diproses. Anda akan menerima email konfirmasi dengan
                                    detail trip Anda.</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-card flex flex-col rounded-3xl p-8 gap-4 bg-white">
                        <p class="font-Grifter font-bold text-2xl leading-[25px]">3</p>
                        <div
                            class="accordion group flex flex-col has-[:checked]:!h-11 overflow-hidden transition-all duration-300">
                            <label class="flex items-center gap-4 justify-between min-h-[38px]">
                                <input type="checkbox" class="hidden" checked>
                                <h3 class="font-Grifter text-lg leading-[25px]">Metode pembayaran apa saja yang tersedia
                                    untuk patungan trip?</h3>
                                <img src="{{ asset('assets/images/icons/arrow-head-down-black.svg') }}"
                                     class="w-6 flex shrink-0 group-has-[:checked]:-rotate-180 transition-all duration-300">
                            </label>
                            <div class="accordion-content mt-4">
                                <p class="font-semibold leading-[25px]">Kami menyediakan berbagai metode pembayaran
                                    seperti kartu kredit/debit, e-wallet, dan transfer bank untuk memudahkan pengalaman
                                    patungan trip Anda.</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-card flex flex-col rounded-3xl p-8 gap-4 bg-white">
                        <p class="font-Grifter font-bold text-2xl leading-[25px]">5</p>
                        <div
                            class="accordion group flex flex-col has-[:checked]:!h-11 overflow-hidden transition-all duration-300">
                            <label class="flex items-center gap-4 justify-between min-h-[38px]">
                                <input type="checkbox" class="hidden" checked>
                                <h3 class="font-Grifter text-lg leading-[25px]">Apa yang harus dilakukan jika terjadi
                                    masalah saat proses pembayaran?</h3>
                                <img src="{{ asset('assets/images/icons/arrow-head-down-black.svg') }}"
                                     class="w-6 flex shrink-0 group-has-[:checked]:-rotate-180 transition-all duration-300">
                            </label>
                            <div class="accordion-content mt-4">
                                <p class="font-semibold leading-[25px]">Jika terjadi masalah, Anda dapat menghubungi
                                    layanan pelanggan kami untuk mendapatkan bantuan. Kami akan membantu memastikan
                                    pembayaran Anda berhasil dan trip Anda tetap berjalan sesuai rencana.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Right-Cards" class="flex flex-col gap-6">
                    <div class="faq-card flex flex-col rounded-3xl p-8 gap-4 bg-white">
                        <p class="font-Grifter font-bold text-2xl leading-[25px]">2</p>
                        <div
                            class="accordion group flex flex-col has-[:checked]:!h-11 overflow-hidden transition-all duration-300">
                            <label class="flex items-center gap-4 justify-between min-h-[38px]">
                                <input type="checkbox" class="hidden" checked>
                                <h3 class="font-Grifter text-lg leading-[25px]">Bagaimana cara memperbarui rencana
                                    patungan trip saya?</h3>
                                <img src="{{ asset('assets/images/icons/arrow-head-down-black.svg') }}"
                                     class="w-6 flex shrink-0 group-has-[:checked]:-rotate-180 transition-all duration-300">
                            </label>
                            <div class="accordion-content mt-4">
                                <p class="font-semibold leading-[25px]">Anda dapat memperbarui rencana trip Anda melalui
                                    halaman akun di website kami. Pastikan Anda masuk ke akun Anda dan pilih trip yang
                                    ingin diperbarui.</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-card flex flex-col rounded-3xl p-8 gap-4 bg-white">
                        <p class="font-Grifter font-bold text-2xl leading-[25px]">4</p>
                        <div
                            class="accordion group flex flex-col has-[:checked]:!h-11 overflow-hidden transition-all duration-300">
                            <label class="flex items-center gap-4 justify-between min-h-[38px]">
                                <input type="checkbox" class="hidden" checked>
                                <h3 class="font-Grifter text-lg leading-[25px]">Apa yang harus dilakukan jika ada
                                    masalah dengan akun patungan trip saya?</h3>
                                <img src="{{ asset('assets/images/icons/arrow-head-down-black.svg') }}"
                                     class="w-6 flex shrink-0 group-has-[:checked]:-rotate-180 transition-all duration-300">
                            </label>
                            <div class="accordion-content mt-4">
                                <p class="font-semibold leading-[25px]">Jika Anda mengalami masalah dengan akun Anda,
                                    segera hubungi tim dukungan pelanggan kami untuk mendapatkan solusi cepat dan
                                    mudah.</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-card flex flex-col rounded-3xl p-8 gap-4 bg-white">
                        <p class="font-Grifter font-bold text-2xl leading-[25px]">6</p>
                        <div
                            class="accordion group flex flex-col has-[:checked]:!h-11 overflow-hidden transition-all duration-300">
                            <label class="flex items-center gap-4 justify-between min-h-[38px]">
                                <input type="checkbox" class="hidden" checked>
                                <h3 class="font-Grifter text-lg leading-[25px]">Bagaimana cara memastikan perjalanan
                                    saya bersama berhasil?</h3>
                                <img src="{{ asset('assets/images/icons/arrow-head-down-black.svg') }}"
                                     class="w-6 flex shrink-0 group-has-[:checked]:-rotate-180 transition-all duration-300">
                            </label>
                            <div class="accordion-content mt-4">
                                <p class="font-semibold leading-[25px]">Pastikan Anda dan peserta lain sudah
                                    menyelesaikan pembayaran tepat waktu dan mematuhi jadwal yang telah disepakati.
                                    Komunikasi dengan tim kami juga sangat membantu untuk memastikan perjalanan
                                    lancar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-[52px] bg-[linear-gradient(277.6deg,#FFFFFF_0.22%,#F5F3F6_21.18%)]">
        <div class="flex flex-col w-full max-w-[1280px] px-[52px] mx-auto gap-[52px]">
            <div class="flex gap-[72px]">
                <div class="flex flex-col gap-6 w-full max-w-[349px] items-start">
                    <img src="{{ asset('assets/images/logos/logos.svg') }}" class="h-16 flex shrink-0" alt="logo">
                    <p class="font-medium leading-[25px] text-patungan-grey">Patungan Trip adalah platform inovatif yang
                        memungkinkan Anda untuk berbagi biaya perjalanan wisata dengan mudah. Mulai dari wisata alam,
                        city tour, hingga destinasi impian, kami membantu Anda menjelajah dengan biaya lebih terjangkau
                        bersama komunitas traveler lainnya. Nikmati pengalaman seru, hemat, dan aman dengan Patungan
                        Trip!</p>
                </div>

                <div class="flex gap-[52px]">
                    <ul class="flex flex-col gap-4 min-w-[165px]">
                        <p class="font-semibold leading-5">Popular Services</p>
                        <li class="font-medium leading-5 text-patungan-grey">
                            <a href="#" class="hover:text-patungan-black transition-all duration-300">Home</a>
                        </li>
                        <li class="font-medium leading-5 text-patungan-grey">
                            <a href="#" class="hover:text-patungan-black transition-all duration-300">Layanan</a>
                        </li>
                        <li class="font-medium leading-5 text-patungan-grey">
                            <a href="#" class="hover:text-patungan-black transition-all duration-300">Cara Pesan</a>
                        </li>
                        <li class="font-medium leading-5 text-patungan-grey">
                            <a href="#" class="hover:text-patungan-black transition-all duration-300">Testimoni</a>
                        </li>
                        <li class="font-medium leading-5 text-patungan-grey">
                            <a href="#" class="hover:text-patungan-black transition-all duration-300">FAQ</a>
                        </li>
                    </ul>
                    <ul class="flex flex-col gap-4 min-w-[165px]">
                        <p class="font-semibold leading-5">Company</p>
                        <li class="font-medium leading-5 text-patungan-grey">
                            <a href="#" class="hover:text-patungan-black transition-all duration-300">About Us</a>
                        </li>
                        <li class="font-medium leading-5 text-patungan-grey">
                            <a href="#" class="hover:text-patungan-black transition-all duration-300">Our Contact</a>
                        </li>
                        <li class="font-medium leading-5 text-patungan-grey">
                            <a href="#" class="hover:text-patungan-black transition-all duration-300">Term Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex items-center">
                <p class="w-full font-medium leading-5 text-patungan-grey">©2024 Ngetrip. All Rights Reserved</p>
                <div class="flex items-center gap-4 mx-auto shrink-0">
                    <a href="#">
                        <img src="{{ asset('assets/images/icons/instagram.svg') }}" class="w-6 flex shrink-0"
                             alt="icon">
                    </a>
                    <a href="#">
                        <img src="{{ asset('assets/images/icons/whatsapp.svg') }}" class="w-6 flex shrink-0" alt="icon">
                    </a>
                    <a href="#">
                        <img src="{{ asset('assets/images/icons/facebook.svg') }}" class="w-6 flex shrink-0" alt="icon">
                    </a>
                </div>
                <div class="w-full flex justify-end">
                    <a href="" class="font-medium leading-5 text-patungan-grey text-nowrap">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </footer>
@endsection
@push('after-scripts')
    <script src=" {{ asset('js/accordion.js') }}"></script>
    <script>
        const texts = document.querySelectorAll('#slider span');
        const sliderContainer = document.getElementById('slider-container');
        const slider = document.getElementById('slider');
        let currentIndex = 0;

        function updateSlider() {
            const currentText = texts[currentIndex];
            const containerWidth = currentText.offsetWidth;

            // Smoothly update the container's width
            sliderContainer.style.transition = 'width 300ms';
            sliderContainer.style.width = containerWidth + 'px';

            // Calculate the correct offset based on each text width
            let offset = 0;
            for (let i = 0; i < currentIndex; i++) {
                offset += texts[i].offsetWidth;
            }

            // Slide the text horizontally to the correct position
            slider.style.transform = `translateX(-${offset}px)`;

            // Move to the next text after 1s
            currentIndex = (currentIndex + 1) % texts.length;
        }

        // Set initial width and position on page load
        function setInitialWidth() {
            const firstText = texts[0];
            sliderContainer.style.width = firstText.offsetWidth + 'px';
        }

        // Ensure the width is correct when the page loads
        window.addEventListener('load', () => {
            setInitialWidth();
            // Start the slider interval after setting initial width
            setInterval(updateSlider, 2000);
        });
    </script>
@endpush

