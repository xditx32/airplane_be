<nav class="relative w-full bg-white left-0 right-0 mx-auto rounded-md">
    {{-- <nav class="fixed top-0 z-20 w-full bg-white left-0 right-0 mx-auto rounded-md"> --}}
    <div class="container relative max-w-screen-xl">
        <div class="flex flex-col justify-between w-full lg:flex-row lg:items-center">
        <!-- Logo & Toggler Button here -->
        <div class="flex items-center justify-between">
            <!-- LOGO -->
            <a href="{!! route('home') !!}">
            <img class="w-1/2" src="{!! asset('./assets/frontend/images/logo-alia-wisata.png') !!}" alt="tickety-assets" />
            </a>
            <!-- RESPONSIVE NAVBAR BUTTON TOGGLER -->
            <div class="block lg:hidden">
            <button class="p-1 outline-none text-primary" id="navbarToggler" data-target="#navigation">
                <svg class="text-dark w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                </svg>
            </button>
            </div>
        </div>

        <!-- Nav Menu -->
        <div class="hidden w-full lg:block" id="navigation">
            <div class="flex flex-col items-baseline gap-4 lg:py-2 py-6 lg:justify-between lg:flex-row lg:items-center">
            <div
                class="flex flex-col w-full ml-auto lg:w-auto gap-4 lg:gap-[50px] lg:items-center lg:flex-row text-primary">
                <a class="nav-link-item text-sm md:text-base font-bold"
                href="{!! route('home') !!}">Beranda</a>
                <a class="nav-link-item text-sm md:text-base font-bold" href="{!! route('about') !!}">Tentang Kami</a>
                <a class="nav-link-item text-sm md:text-base font-bold" href="{!! route('home') !!}/#packet">Jadwal Paket</a>
                <a class="nav-link-item text-sm md:text-base font-bold" href="{!! route('gallery') !!}">Galeri</a>
                <a class="nav-link-item text-sm md:text-base font-bold" href="{!! route('home') !!}/#contact">Kontak Kami</a>
            </div>
            <div class="flex flex-col w-full ml-auto lg:w-auto lg:gap-12 lg:items-center lg:flex-row">
                <a href="#!" class="btn-primary uppercase">
                Whatsapp
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>
</nav>
