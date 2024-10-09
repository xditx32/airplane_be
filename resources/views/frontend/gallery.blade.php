@extends('frontend.layouts.frontend')

@section('meta_title', 'Alia Wisata Travel Umroh Terbaik & Terpercaya')

@section('meta_description', 'Berdiri sejak 2000, sebagai travel umroh haji Alia Wisata terus memberikan pelayanan terbaik kepada Jamaahnya. Alia juga melayani Ticketing, Tours, Hotel dan lain-lain')

@section('cssCustom')

@endsection

@section('content')

<!-- Section Galery -->
<section id="gallery" class="container relative max-w-screen-xl py-10">
    <div class="flex flex-col justify-between w-full gap-1 mb-[50px]">
        <h2 class="text-2xl md:text-3xl font-bold text-white">Galeri Foto.</h2>
        <p class="text-base md:text-lg text-white">Kami memiliki paket-paket umroh yang dapat anda
        Dibawah ini adalah dokumentasi foto-foto keberangkantan umroh Alia Wisata bersama dengan para jamaah.
        </p>
    </div>

    <div id="swiper_gallery" class="swiper w-full">
        <div class="swiper-wrapper" id="swiper_gallery_lg-swipper">
        @forelse ($galleries as $galleri)
                <a data-src="{!! Storage::url($galleri->photo) !!}" class="swiper-slide">
                    <img class="w-full rounded-lg" alt="{!! $galleri->name !!}" src="{!! Storage::url($galleri->photo) !!}" />
                </a>
            @empty
                <p class="text-sm md:text-base text-white text-center"> Data Belum Tersedia </p>
            @endforelse
        </div>
    </div>
</section>

<!-- Section Partner -->
<section class="container relative max-w-screen-xl py-10 rounded-md mb-10">
    <div class="flex flex-col justify-between w-full gap-1 mb-[50px]">
        <h2 class="text-2xl md:text-3xl font-bold text-primary">Partner.</h2>
        {{-- <p class="text-base md:text-lg text-white">Dapatkan promo potongan harga menarik untuk perjalanan ibadah umroh sahabat semua.</p> --}}
    </div>
    <div id="swiper_partner" class="swiper w-full">
        <div class="swiper-wrapper">
            @forelse ($partners as $partner)
            <div class="swiper-slide">
                <img class="rounded-2xl bg-white" src="{!! Storage::url($partner->icon) !!}"
                    alt="{!! $partner->name !!}">
                {{-- <img class="w-[150px] h-[120px] rounded-2xl mr-[30px]" src="{!! Storage::url($partner->icon) !!}"
                    alt="{!! $partner->title !!}"> --}}
            </div>
            @empty
            <p class="text-sm md:text-base text-primary text-center"> Data Belum Tersedia </p>
            @endforelse
        </div>
    </div>
</section>


@endsection

@section('jsCustom')

@endsection
