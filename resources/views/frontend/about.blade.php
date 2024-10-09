@extends('frontend.layouts.frontend')

@section('meta_title', 'Alia Wisata Travel Umroh Terbaik & Terpercaya')

@section('meta_description', 'Berdiri sejak 2000, sebagai travel umroh haji Alia Wisata terus memberikan pelayanan terbaik kepada Jamaahnya. Alia juga melayani Ticketing, Tours, Hotel dan lain-lain')

@section('cssCustom')

@endsection

@section('content')
<section id="about" class="container relative max-w-screen-xl py-10 bg-primary">
    <div class="flex flex-wrap justify-between items-center w-full gap-8 align-middle">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-8 items-center">
            <div class="lg:col-span-2 w-full relative overflow-hidden">
                <div class="flex flex-col gap-[2px] py-4">
                <!-- <div class="w-full max-w-[400px] flex flex-col gap-[2px]"> -->
                {{-- <h3 class="text-xl md:text-2xl">Selamat datang</h3> --}}
                <h2 class="text-2xl md:text-3xl font-bold py-2">Alia Wisata, Travel Umroh Terbaik dan Terpercaya.</h2>
                <p class="text-sm md:text-base text-justify">Berdiri sejak tahun 2000, Alia Wisata terus berkembang
                    memberikan pelayanan kepada
                    Jamaah Umroh & Haji Khusus. Alia
                    Wisata juga memberikan layanan pariwisata baik Dalam maupun Luar Negeri, baik di bidang Airlines
                    Ticketing,
                    Tours, Hotel
                    Voucher dan MICE (Meeting, Incentive, Conference & Exhibition).<br><br>

                    Alia Wisata memberikan layanan yang profesional dengan infrastruktur yang ada, didukung oleh tenaga ahli
                    yang
                    siap
                    melayani pelanggan dengan didasari kejujuran, dedikasi dan loyalitas tinggi serta profesional dalam
                    memberikan
                    pelayanan.<br><br>

                    Sebagai travel umroh haji terpercaya Alia Wisata terdaftar sebagai penyelenggara perjalanan ibadah umrah
                    (PPIU) dengan
                    SK NOMOR 832 TAHUN 2019 dan dapat di lihat pada web Sisko Patuh Kemenag melalui link berikut ini</p>
                </div>
                <div class="grid grid-cols-6 gap-4">
                <div class="bg-white rounded-md">
                    <img src="{!! asset('/assets/frontend/images/logo_lembaga/amphuri-logo.png') !!}" alt="" srcset="">
                </div>
                <div class="bg-white rounded-md">
                    <img src="{!! asset('/assets/frontend/images/logo_lembaga/bank-bsi-logo.png') !!}" alt="" srcset="">
                </div>
                <div class="bg-white rounded-md">
                    <img src="{!! asset('/assets/frontend/images/logo_lembaga/iata-logo.png') !!}" alt="" srcset="">
                </div>
                <div class="bg-white rounded-md">
                    <img src="{!! asset('/assets/frontend/images/logo_lembaga/iqra-logo.png') !!}" alt="" srcset="">
                </div>
                <div class="bg-white rounded-md">
                    <img src="{!! asset('/assets/frontend/images/logo_lembaga/kan-logo.png') !!}" alt="" srcset="">
                </div>
                <div class="bg-white rounded-md">
                    <img src="{!! asset('/assets/frontend/images/logo_lembaga/logo-bnsp.png') !!}" alt="" srcset="">
                </div>
                <div class="bg-white rounded-md">
                    <img src="{!! asset('/assets/frontend/images/logo_lembaga/logo-kemenag.png') !!}" alt="" srcset="">
                </div>
                <div class="bg-white rounded-md">
                    <img src="{!! asset('/assets/frontend/images/logo_lembaga/siskopatuh-logo.png') !!}" alt="" srcset="">
                </div>
                <div class="bg-white rounded-md">
                    <img src="{!! asset('/assets/frontend/images/logo_lembaga/tims-logo.png') !!}" alt="" srcset="">
                </div>
                </div>
            </div>
            <div class="lg:col-span-2 w-full relative overflow-hidden">
                <iframe class="w-full aspect-video rounded-[20px] bg-[#D9D9D9]"
                src="https://www.youtube.com/embed/glkiTD8Lqpg" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<section class="container relative max-w-screen-xl py-10 bg-white rounded-xl">
    <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 text-primary gap-8">
        <div class="lg:col-span-2">
            <h3 class="text-2xl md:text-3xl">Visi</h3>
            <p class="text-sm md:text-base">Menjadi Biro Umroh yang istiqomah melayani para jamaah yang terbaik dan terbesar di Indonesia. </p>
        </div>
        <div class="lg:col-span-2">
            <h3 class="text-2xl md:text-3xl">Misi</h3>
            <p class="text-sm md:text-base">Meningkatkan kualitas SDM sebagai ujung tombak pelayanan kepada para jamaah
                Melayani jamaah sepenuh hati, tulus dan ikhlas
                Memperbanyak jaringan pelayanan di Seluruh Indonesia
                Peningkatan kualitas , profesionalisme dan akuntabilitas dalam pelayanan
            </p>
        </div>
    </div>
</section>

<section class="container relative max-w-screen-xl py-10 rounded-md mb-10">
    <div class="flex flex-col justify-between w-full gap-1 mb-[50px]">
        <h2 class="text-2xl md:text-3xl font-bold text-white">Partner.</h2>
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
                <p class="text-sm md:text-base text-white text-center"> Data Belum Tersedia </p>
            @endforelse
        </div>
    </div>
</section>
@endsection

@section('jsCustom')

@endsection
