@extends('frontend.layouts.frontend')

@section('meta_title', 'Alia Wisata Travel Umroh Terbaik & Terpercaya')

@section('meta_description', 'Berdiri sejak 2000, sebagai travel umroh haji Alia Wisata terus memberikan pelayanan terbaik kepada Jamaahnya. Alia juga melayani Ticketing, Tours, Hotel dan lain-lain')

@section('cssCustom')

@endsection

@section('content')
<!-- Section Hero -->
<div id="swiper_banner" class="swiper w-full">
    <div class="swiper-wrapper">
    @forelse ($sliders as $slider)
        <div class="swiper-slide">
            <div class="h-screen md:h-[750px] w-full overflow-hidden">
                <div class="absolute inset-0">
                <img alt="title" class="h-full w-full object-cover object-right md:object-center"
                    src="{!! Storage::url($slider->photo) !!}">
                <div class="absolute inset-0 bg-black opacity-60"></div>
                </div>
                <div class="relative z-10 flex flex-col justify-center items-center h-full text-center">
                <h1
                    class="md:max-w-lg lg:max-w-lg xl:max-w-2xl mx-auto text-xl md:text-2xl md:leading-normal text-white">
                    {!! $slider->title !!}
                </h1>
                <div
                    class="max-w-md md:max-w-xl lg:max-w-2xl mx-auto text-white md:leading-normal tracking-wide">
                    <p class="text-3xl md:text-4xl font-bold"> {!! $slider->detail !!}</p>
                </div>
                <h2 class="md:max-w-lg lg:max-w-lg xl:max-w-2xl mx-auto text-base md:text-lg  md:leading-normal text-white">
                    {!! $slider->sub_title !!}
                </h2>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        {{-- <div class="swiper-pagination"></div> --}}
    @empty
        <p class="text-sm md:text-base text-primary"> Data Belum Tersedia </p>
    @endforelse
    </div>
</div>

<!-- Section About -->
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
            <div class="mt-auto py-4 w-2/4">
                <a href="{{ route('about') }}" class="block btn-secondary">
                    <div class="flex flex-row gap-2 items-center justify-center align-center wid">
                        Tentang Kami
                    <ion-icon name="chevron-forward-outline" class="text-white"></ion-icon>
                    </div>
                </a>
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

<!-- Section Select Best Package Umrah -->
<section id="packet" class="container relative max-w-screen-xl py-10 bg-white rounded-md">
    <div class="flex flex-col justify-between w-full gap-0 mb-[50px]">
        <h2 class="text-2xl md:text-3xl font-bold text-primary">Program Best Seller.</h2>
        <p class="text-base md:text-lg text-secondary">Kami memiliki paket-paket umroh yang dapat anda
            Tangal keberangkatan terdekat program umroh Alia Wisata.</p>
    </div>

    @forelse ($categories as $category)

    @if ($category->id == 1)
        <div id="swiper_product" class="swiper w-full pb-10">
            <div class="swiper-wrapper">

            @foreach (@$category->products as $product)

                    @if ($product->display === 'IMAGE')
                    <div class="swiper-slide w-[300px] rounded-2xl overflow-hidden relative bg-primary">
                        <a href="{{ route('product.details', [$category->slug, $product->slug]) }}">
                            <img src="{!! Storage::url( $product->photo ) !!}" class="w-full h-full" alt="{!! $product->name!!}">
                        <div class="flex flex-row justify-between items-center align-center px-4 py-2">
                            <div class="flex flex-row w-full max-w-24 order-1">
                                    @forelse ($product->ProductAirlines as $ProductAirline)
                                    <img class="w-full bg-white rounded-xl" src="{!! Storage::url( $ProductAirline->airline->icon ) !!}" alt="">
                                    @empty
                                    <p class="text-sm md:text-base text-primary">
                                        Data Belum Tersedia
                                    </p>
                                    @endforelse
                            </div>
                            <div class="flex flex-col gap-2 order-2">
                                <p class="text-sm md:text-xs">Harga Mulai</p>
                                    <h3 class="text-3xl md:text-2xl font-bold text-secondary">
                                        {!! $product->price_start_from !!} Juta
                                    </h3>
                            </div>
                        </div>
                        </a>
                    </div>

                    @elseif($product->display === 'IMAGE_TEXT')
                    <div class="swiper-slide w-[300px] rounded-2xl overflow-hidden relative bg-primary">
                    {{-- <div class="swiper-slide w-[300px] h-[250px] rounded-2xl overflow-hidden relative min-h-[760px] bg-primary"> --}}
                                {{-- <a data-src="{!! Storage::url( $product->photo ) !!}"> --}}
                                    <img src="{!! Storage::url( $product->photo ) !!}" class="w-full h-full" alt="{!! $product->name!!}">
                                {{-- </a> --}}
                                <p class="px-[14px] py-2 rounded-xl bg-primary text-white font-semibold text-sm absolute top-5 right-5">
                                    Promo
                                </p>
                                {{-- <div class="px-[14px] py-2 absolute top-[140px] right-5">
                                    <a id="category" href="" title="Brosur">
                                        <ion-icon name="help-circle-outline" class="text-3xl animate-bounce" src="{!!  Storage::url($product->brochure) !!}">
                                        </ion-icon>
                                    </a>
                                </div> --}}
                                <div class="w-full bg-primary flex flex-col h-full">
                                <div class="max-w-full pb-4">
                                    <div class="flex flex-col gap-y-2 text-white">
                                    <div class="text-lg md:text-2xl font-bold text-center uppercase pt-2">
                                        {!! $product->title !!}
                                    </div>
                                    {{-- <div class="text-base md:text-sm font-bold text-center uppercase">
                                        {!! $product->name!!}
                                    </div> --}}
                                    <div class="text-base md:text-sm font-bold text-center bg-white rounded-xl text-primary mx-4 py-2">
                                        ({!! $product->start_priode->format('d-m-Y')!!} s.d. {!! $product->end_priode->format('d-m-Y')!!})
                                    </div>
                                    <!-- priode -->
                                    <div class="flex flex-col px-4 py-1">
                                        {{-- <div>
                                            <div class="flex flex-row items-center gap-1">
                                                <ion-icon name="checkmark-circle" class="text-secondary"></ion-icon>
                                                <p class="text-sm md:text-base">{{ $product->start_priode->format('d-M-Y') }}</p>
                                            </div>
                                        </div> --}}
                                        <div class="flex flex-row align-center items-center justify-between">
                                            <div class="flex flex-col gap-y-2">
                                                <div class="flex flex-wrap gap-2">
                                                    @forelse ($product->ProductTags as $ProductTag)
                                                    <div class="bg-secondary px-2 py-1 rounded-md block">
                                                        <p class="text-sm md:text-xs">#{!! $ProductTag->name !!}</p>
                                                    </div>
                                                    @empty

                                                    @endforelse
                                                </div>
                                            </div>
                                            {{-- <div class="flex items-end justify-end">
                                                <img class="w-[50%]" src="{!! Storage::url( $product->category->icon) !!}" alt="" srcset="">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- hotel -->
                                    <div class="flex flex-col gap-y-4 px-4 py-2 border">
                                        {{-- <div class="flex items-center gap-4">
                                            <p class="text-sm md:text-xs px-[14px] py-1 rounded-lg bg-primary border">Hotel</p>
                                        </div> --}}
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-base md:text-lg font-bold text-secondary">Hotel</h3>
                                            <ion-icon name="bed-outline" class="text-2xl bg-secondary block rounded-2xl p-1"></ion-icon>
                                        </div>
                                        @forelse ($product->ProductHoteles as $ProductHotel)
                                            <div class="flex flex-row gap-2 items-center align-center justify-between">
                                                {{-- <ion-icon name="checkmark-circle" class="text-secondary"></ion-icon> --}}
                                                <p class="text-sm md:text-sm"> {!! $ProductHotel->hotel->name !!} </p>
                                                <div class="flex flex-row">
                                                    @if ($ProductHotel->hotel->rating == 1)
                                                        <ion-icon name="star"></ion-icon>
                                                    @elseif($ProductHotel->hotel->rating == 2)
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                    @elseif($ProductHotel->hotel->rating == 3)
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                    @elseif($ProductHotel->hotel->rating == 4)
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                    @elseif($ProductHotel->hotel->rating == 5)
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                    @endif
                                                </div>
                                            </div>
                                            @empty
                                                <p class="text-sm md:text-base text-primary"> Data Belum Tersedia </p>
                                            @endforelse
                                    </div>
                                    <!-- maskapai -->
                                    <div class="flex flex-row justify-between items-center align-center px-4 py-2">
                                        <div class="flex flex-row w-full max-w-24 order-1">
                                                @forelse ($product->ProductAirlines as $ProductAirline)
                                                <img class="w-full bg-white rounded-xl" src="{!! Storage::url( $ProductAirline->airline->icon ) !!}" alt="">
                                                @empty
                                                <p class="text-sm md:text-base text-primary">
                                                    Data Belum Tersedia
                                                </p>
                                                @endforelse
                                        </div>
                                        <div class="flex flex-col gap-2 order-2">
                                            <p class="text-sm md:text-xs">Harga Mulai</p>
                                                <h3 class="text-3xl md:text-2xl font-bold text-secondary">
                                                    {!! $product->price_start_from !!} Juta
                                                </h3>
                                        </div>

                                    </div>
                                    {{-- <div class="grid grid-cols-2 p-4 items-center">
                                        <div class="flex items-center gap-4">
                                            <ion-icon name="airplane-outline" class="text-2xl bg-secondary block rounded-2xl p-1"></ion-icon>
                                            <h3 class="text-sm md:text-base font-bold">Maskapai</h3>
                                        </div>
                                        <div class="">
                                            <div class="flex flex-col gap-2">
                                                @forelse ($product->ProductAirlines as $ProductAirline)
                                                <img class="w-[80%] bg-white rounded-xl" src="{!! Storage::url( $ProductAirline->airline->icon ) !!}" alt="">
                                                @empty
                                                <p class="text-sm md:text-base text-primary">
                                                    Data Belum Tersedia
                                                </p>
                                                @endforelse
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="flex flex-col gap-2 items-end">
                                                <p class="text-sm md:text-xs">Harga Mulai</p>
                                                    <h3 class="text-3xl md:text-2xl font-bold text-secondary">
                                                        {!! $product->price_start_from !!} Juta
                                                    </h3>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div>
                                        @if ($product->seat_available == 1)
                                        <div class="mt-auto px-4 py-1">
                                            <a href="{{ route('product.details', [$category->slug, $product->slug]) }}" class="block btn-orange">
                                                <div class="flex flex-row gap-2 items-center justify-center align-center">
                                                    <ion-icon name="alert-circle-outline" class="text-white"></ion-icon>
                                                Terbatas
                                                </div>
                                            </a>
                                        </div>
                                        @elseif($product->seat_available >= 1)
                                        <div class="mt-auto px-4 py-1">
                                            <a href="{{ route('product.details', [$category->slug, $product->slug]) }}" class="block btn-secondary">
                                                <div class="flex flex-row gap-2 items-center justify-center align-center">
                                                    <ion-icon name="checkmark-circle" class="text-white"></ion-icon>
                                                    {!! $product->seat_available !!}
                                                    Tersisa
                                                </div>
                                            </a>
                                        </div>
                                        @else
                                        <div class="mt-auto px-4 py-1">
                                            <a href="#" class="block btn-red">
                                                <div class="flex flex-row gap-2 items-center justify-center align-center">
                                                    <ion-icon name="close-circle-outline" class="text-white"></ion-icon>
                                                Full Booked
                                                    </div>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @else

                    @endif

            @endforeach

            </div>
        </div>
        <div class="flex flex-col justify-between items-center">
            <a class="block btn-primary" href="{!! route('category', $category->slug) !!}">Paket Umroh Unggulan Lainnya</a>
        </div>
    @endif

    @empty
        <p class="text-sm md:text-base text-primary text-center"> Data Belum Tersedia </p>
    @endforelse

</section>

{{-- <img src="{!! asset('/assets/frontend/images/wavy-line-1.svg') !!}" class="absolute -z-10 md:top-[120rem] w-full" alt="tickety-assets"> --}}

<!-- Section Package Umrah -->
<section class="container relative max-w-screen-xl py-10">
    <div class="flex flex-col justify-between items-center w-full gap-1 mb-[50px]">
        <h2 class="text-2xl md:text-3xl font-bold text-white">Paket Categori</h2>
        <p class="text-base md:text-lg text-white text-center">Kami memiliki paket-paket umroh yang dapat anda
        pilih dari paket
        reguler dengan biaya yang lebih hemat hingga paket VIP
        untuk mendapatkan pelayanan terbaik. Semoga kita dimudahkan untuk beribadah umroh di Tanah Suci.</p>
    </div>

    <div class="flex flex-nowrap gap-4 items-center align-center justify-start md:justify-center overflow-x-auto">
        @forelse ($categories as $category)
        {{-- <a href="{!! route('category', $category->slug) !!}">
            <div class="overflow-hidden relative rounded-full w-40 h-40 border-4">
                <div class="absolute inset-0">
                    <div class="flex align-center items-center">
                        <img class="w-full h-full object-cover object-right md:object-center"
                        src="{!! Storage::url( $category->icon) !!}">
                        <div class="absolute inset-0 bg-black opacity-60"></div>
                    </div>
                </div>
                <div class="relative z-10 flex flex-col gap-y-2 justify-center items-center h-full">
                <h3 class="text-xl md:text-2xl font-bold">{!!  $category->name !!}</h3>
                </div>
            </div>
        </a> --}}
        <a href="{!! route('category', $category->slug) !!}">
            {{-- <div>
                <div class="w-[140px] rounded-full border-4">
                    <img class="w-full h-full " src="{!! Storage::url( $category->icon) !!}">
                </div>
                <div>
                    <h3 class="text-xl font-bold text-center">{!!  $category->name !!}</h3>
                </div>
            </div> --}}
            <div class="overflow-hidden relative rounded-full w-40 h-40 border-4">
                <div class="absolute inset-0 flex items-center align-center justify-center">
                    <img class="w-[80%]" src="{!! Storage::url( $category->icon) !!}">
                    <div class="absolute inset-0 bg-black opacity-30"></div>
                </div>
                <div class="relative z-10 flex flex-col gap-y-2 justify-center items-center h-full">
                    {{-- <h3 class="text-xl md:text-2xl font-bold">{!!  $category->name !!}</h3> --}}
                </div>
            </div>
            <div>
                <h3 class="text-xl font-bold text-center">{!!  $category->name !!}</h3>
            </div>
        </a>
        @empty
        <p class="text-sm md:text-base text-white text-center"> Data Belum Tersedia </p>
        @endforelse

    </div>
</section>

<!-- Section Select New Package Umrah -->
<section class="container relative max-w-screen-xl py-10 bg-white rounded-md">
    <div class="flex flex-col justify-between items-center w-full gap-0 mb-[50px]">
        <!-- <h3 class="text-xl md:text-2xl text-primary">Umroh Musim 1445 H</h3> -->
        <h2 class="text-2xl md:text-3xl font-bold text-secondary">Paket Umroh Terbaru</h2>
    </div>

    @forelse ($categories as $category)

    @if ($category->id == 1)
        <div id="swiper_product" class="swiper w-full pb-10">
            <div class="swiper-wrapper">


            @foreach (@$category->products as $product)

                    @if ($product->display === 'IMAGE')
                    <div class="swiper-slide w-[300px] rounded-2xl overflow-hidden relative bg-primary">
                        <a href="{{ route('product.details', [$category->slug, $product->slug]) }}">
                            <img src="{!! Storage::url( $product->photo ) !!}" class="w-full h-full" alt="{!! $product->name!!}">
                        <div class="flex flex-row justify-between items-center align-center px-4 py-2">
                            <div class="flex flex-row w-full max-w-24 order-1">
                                    @forelse ($product->ProductAirlines as $ProductAirline)
                                    <img class="w-full bg-white rounded-xl" src="{!! Storage::url( $ProductAirline->airline->icon ) !!}" alt="">
                                    @empty
                                    <p class="text-sm md:text-base text-primary">
                                        Data Belum Tersedia
                                    </p>
                                    @endforelse
                            </div>
                            <div class="flex flex-col gap-2 order-2">
                                <p class="text-sm md:text-xs">Harga Mulai</p>
                                    <h3 class="text-3xl md:text-2xl font-bold text-secondary">
                                        {!! $product->price_start_from !!} Juta
                                    </h3>
                            </div>
                        </div>
                        </a>
                    </div>

                    @elseif($product->display === 'IMAGE_TEXT')
                    <div class="swiper-slide w-[300px] rounded-2xl overflow-hidden relative bg-primary">
                    {{-- <div class="swiper-slide w-[300px] h-[250px] rounded-2xl overflow-hidden relative min-h-[760px] bg-primary"> --}}
                                {{-- <a data-src="{!! Storage::url( $product->photo ) !!}"> --}}
                                    <img src="{!! Storage::url( $product->photo ) !!}" class="w-full h-full" alt="{!! $product->name!!}">
                                {{-- </a> --}}
                                <p class="px-[14px] py-2 rounded-xl bg-primary text-white font-semibold text-sm absolute top-5 right-5">
                                    Promo
                                </p>
                                {{-- <div class="px-[14px] py-2 absolute top-[140px] right-5">
                                    <a id="category" href="" title="Brosur">
                                        <ion-icon name="help-circle-outline" class="text-3xl animate-bounce" src="{!!  Storage::url($product->brochure) !!}">
                                        </ion-icon>
                                    </a>
                                </div> --}}
                                <div class="w-full bg-primary flex flex-col h-full">
                                <div class="max-w-full pb-4">
                                    <div class="flex flex-col gap-y-2 text-white">
                                    <div class="text-lg md:text-2xl font-bold text-center uppercase pt-2">
                                        {!! $product->title !!}
                                    </div>
                                    {{-- <div class="text-base md:text-sm font-bold text-center uppercase">
                                        {!! $product->name!!}
                                    </div> --}}
                                    <div class="text-base md:text-sm font-bold text-center bg-white rounded-xl text-primary mx-4 py-2">
                                        ({!! $product->start_priode->format('d-m-Y')!!} s.d. {!! $product->end_priode->format('d-m-Y')!!})
                                    </div>
                                    <!-- priode -->
                                    <div class="flex flex-col px-4 py-1">
                                        {{-- <div>
                                            <div class="flex flex-row items-center gap-1">
                                                <ion-icon name="checkmark-circle" class="text-secondary"></ion-icon>
                                                <p class="text-sm md:text-base">{{ $product->start_priode->format('d-M-Y') }}</p>
                                            </div>
                                        </div> --}}
                                        <div class="flex flex-row align-center items-center justify-between">
                                            <div class="flex flex-col gap-y-2">
                                                <div class="flex flex-wrap gap-2">
                                                    @forelse ($product->ProductTags as $ProductTag)
                                                    <div class="bg-secondary px-2 py-1 rounded-md block">
                                                        <p class="text-sm md:text-xs">#{!! $ProductTag->name !!}</p>
                                                    </div>
                                                    @empty

                                                    @endforelse
                                                </div>
                                            </div>
                                            {{-- <div class="flex items-end justify-end">
                                                <img class="w-[50%]" src="{!! Storage::url( $product->category->icon) !!}" alt="" srcset="">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- hotel -->
                                    <div class="flex flex-col gap-y-4 px-4 py-2 border">
                                        {{-- <div class="flex items-center gap-4">
                                            <p class="text-sm md:text-xs px-[14px] py-1 rounded-lg bg-primary border">Hotel</p>
                                        </div> --}}
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-base md:text-lg font-bold text-secondary">Hotel</h3>
                                            <ion-icon name="bed-outline" class="text-2xl bg-secondary block rounded-2xl p-1"></ion-icon>
                                        </div>
                                        @forelse ($product->ProductHoteles as $ProductHotel)
                                            <div class="flex flex-row gap-2 items-center align-center justify-between">
                                                {{-- <ion-icon name="checkmark-circle" class="text-secondary"></ion-icon> --}}
                                                <p class="text-sm md:text-sm"> {!! $ProductHotel->hotel->name !!} </p>
                                                <div class="flex flex-row">
                                                    @if ($ProductHotel->hotel->rating == 1)
                                                        <ion-icon name="star"></ion-icon>
                                                    @elseif($ProductHotel->hotel->rating == 2)
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                    @elseif($ProductHotel->hotel->rating == 3)
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                    @elseif($ProductHotel->hotel->rating == 4)
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                    @elseif($ProductHotel->hotel->rating == 5)
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                    @endif
                                                </div>
                                            </div>
                                            @empty
                                                <p class="text-sm md:text-base text-primary"> Data Belum Tersedia </p>
                                            @endforelse
                                    </div>
                                    <!-- maskapai -->
                                    <div class="flex flex-row justify-between items-center align-center px-4 py-2">
                                        <div class="flex flex-row w-full max-w-24 order-1">
                                                @forelse ($product->ProductAirlines as $ProductAirline)
                                                <img class="w-full bg-white rounded-xl" src="{!! Storage::url( $ProductAirline->airline->icon ) !!}" alt="">
                                                @empty
                                                <p class="text-sm md:text-base text-primary">
                                                    Data Belum Tersedia
                                                </p>
                                                @endforelse
                                        </div>
                                        <div class="flex flex-col gap-2 order-2">
                                            <p class="text-sm md:text-xs">Harga Mulai</p>
                                                <h3 class="text-3xl md:text-2xl font-bold text-secondary">
                                                    {!! $product->price_start_from !!} Juta
                                                </h3>
                                        </div>

                                    </div>
                                    {{-- <div class="grid grid-cols-2 p-4 items-center">
                                        <div class="flex items-center gap-4">
                                            <ion-icon name="airplane-outline" class="text-2xl bg-secondary block rounded-2xl p-1"></ion-icon>
                                            <h3 class="text-sm md:text-base font-bold">Maskapai</h3>
                                        </div>
                                        <div class="">
                                            <div class="flex flex-col gap-2">
                                                @forelse ($product->ProductAirlines as $ProductAirline)
                                                <img class="w-[80%] bg-white rounded-xl" src="{!! Storage::url( $ProductAirline->airline->icon ) !!}" alt="">
                                                @empty
                                                <p class="text-sm md:text-base text-primary">
                                                    Data Belum Tersedia
                                                </p>
                                                @endforelse
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="flex flex-col gap-2 items-end">
                                                <p class="text-sm md:text-xs">Harga Mulai</p>
                                                    <h3 class="text-3xl md:text-2xl font-bold text-secondary">
                                                        {!! $product->price_start_from !!} Juta
                                                    </h3>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div>
                                        @if ($product->seat_available == 1)
                                        <div class="mt-auto px-4 py-1">
                                            <a href="{{ route('product.details', [$category->slug, $product->slug]) }}" class="block btn-orange">
                                                <div class="flex flex-row gap-2 items-center justify-center align-center">
                                                    <ion-icon name="alert-circle-outline" class="text-white"></ion-icon>
                                                Terbatas
                                                </div>
                                            </a>
                                        </div>
                                        @elseif($product->seat_available >= 1)
                                        <div class="mt-auto px-4 py-1">
                                            <a href="{{ route('product.details', [$category->slug, $product->slug]) }}" class="block btn-secondary">
                                                <div class="flex flex-row gap-2 items-center justify-center align-center">
                                                    <ion-icon name="checkmark-circle" class="text-white"></ion-icon>
                                                    {!! $product->seat_available !!}
                                                    Tersisa
                                                </div>
                                            </a>
                                        </div>
                                        @else
                                        <div class="mt-auto px-4 py-1">
                                            <a href="#" class="block btn-red">
                                                <div class="flex flex-row gap-2 items-center justify-center align-center">
                                                    <ion-icon name="close-circle-outline" class="text-white"></ion-icon>
                                                Full Booked
                                                    </div>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @else

                    @endif

            @endforeach

            </div>
        </div>
        <div class="flex flex-col justify-between items-center">
            <a class="block btn-primary" href="{!! route('category', $category->slug) !!}">Paket Umroh Terbaru Lainnya</a>
        </div>
    @endif

    @empty
        <p class="text-sm md:text-base text-primary text-center"> Data Belum Tersedia </p>
    @endforelse

</section>

<!-- Section Brosur -->
<section class="container relative max-w-screen-xl py-10">
    <div class="flex flex-col justify-between items-center w-full gap-1 mb-[50px]">
        <!-- <h3 class="text-xl md:text-2xl font-semibold text-white">Brosur Terbaru Update</h3> -->
        <h2 class="text-2xl md:text-3xl font-bold text-secondary">Brosur Terbaru Update</h2>
    </div>
    <div id="swiper_brochure" class="swiper w-full">
    <div class="swiper-wrapper" id="swiper_brochure_lg-swipper">
        @forelse ($brochures as $brochure)
        {{-- <div class="swiper-slide"> --}}
            <a data-src="{!! Storage::url($brochure->photo) !!}" class="swiper-slide">
                <img class="w-full rounded-lg" src="{!! Storage::url($brochure->photo) !!}" alt="{!! $brochure->name !!}">
            </a>
        {{-- </div> --}}
        @empty
        <p class="text-sm md:text-base text-white text-center"> Data Belum Tersedia </p>
        @endforelse
    </div>
    </div>
</section>

<!-- Section Services -->
<section class="container relative max-w-screen-xl py-10 bg-white rounded-md">
    <div class="flex flex-col justify-between items-center w-full gap-1 mb-[50px]">
        <h3 class="text-xl md:text-2xl font-semibold text-white">Layanan Kami</h3>
        <h2 class="text-2xl md:text-3xl font-bold text-primary">Kenapa Harus Kami</h2>
    </div>
    <div class="flex flex-col md:flex-row flex-wrap justify-center gap-8 lg:gap-[120px] items-center">
        <img class="w-full md:max-w-[536px]"
        src="{!!  asset('/assets/frontend/images/cropped-1200px-Garuda_Indonesia_Boeing_737-800_PK-GMM_HKG_2012-7-18-780x405.png') !!}"
        alt="">
        <div class="max-w-[420px] w-full">
        <header>
            <h3 class="text-xl md:text-2xl font-bold text-primary mb-1">Poin Plus.</h3>
            <p class="text-sm md:text-base text-primary mb-1">Rasakan pengalaman ibadah umroh yang aman dan nyaman bersama Alia Wisata.</p>
        </header>
        <!-- Service Item -->
        <div class="flex items-center gap-6 py-3 bg-gradient-to-tr from-emerald-500 rounded-lg p-2 mb-2">
            <img class="w-[60px]" src="{!! asset('/assets/frontend/images/man.png') !!}" alt="">
            <div>
            <h3 class="text-xl md:text-2xl font-bold text-primary mb-1">Support</h3>
            <p class="text-sm md:text-base text-primary mb-1">Guna memberikan pelayanan terbaik, Alia Wisata bekerja
                sama
                dengan mitra usaha
                terpercaya melalui
                jaringan luas kami,
                baik maskapai penerbangan, hotel, maupun pemerintah</p>
            </div>
        </div>
        <div class="flex items-center gap-6 py-3 bg-gradient-to-tr from-emerald-500 rounded-lg p-2 mb-2">
            <img class="w-[60px]" src="{!! asset('/assets/frontend/images/tawaf.png') !!}" alt="">
            <div>
            <h3 class="text-xl md:text-2xl font-bold text-primary mb-1">Quality</h3>
            <p class="text-sm md:text-base text-primary mb-1">Produk jasa Alia Wisata dirancang dan dikemas oleh
                tenaga
                kerja
                yang profesional dan
                berpengalaman,
                sehingga terjaga
                kualitas dan layanannya</p>
            </div>
        </div>
        <div class="flex items-center gap-6 py-3 bg-gradient-to-tr from-emerald-500 rounded-lg p-2 mb-2">
            <img class="w-[60px]" src="{!! asset('/assets/frontend/images/umrah.png') !!}" alt="">
            <div>
            <h3 class="text-xl md:text-2xl font-bold text-primary mb-1">Responsive</h3>
            <p class="text-sm md:text-base text-primary mb-1">Alia Wisata sebagai travel umrah haji berkomitmen pada
                standar
                kerja tinggi, untuk
                memberikan pelayanan
                terbaik dan
                amanah kepada setiap pelanggan maupun mitra usahanya</p>
            </div>
        </div>

        </div>
    </div>


</section>

<!-- Section Testimonial -->
<section class="container relative max-w-screen-xl py-10">
    <div class="flex flex-col justify-between w-full gap-1 mb-[50px]">
        <h2 class="text-2xl md:text-3xl font-bold text-white">Testimoni Jamaah.</h2>
        <p class="text-base md:text-lg text-white">Dapatkan promo potongan harga menarik untuk perjalanan ibadh umroh sahabat semua.</p>
    </div>

    <div id="swiper_testimonial" class="swiper w-full">
        <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="lg:col-span-4 col-span-12">
                        <div class="flex flex-col gap-4 bg-white p-5 rounded-lg">
                        <div class="flex flex-row gap-4 items-center text-primary">
                            <img class="h-12" src="./assets/images/testimonial/tria_member.png" alt="">
                            <div class="flex flex-col">
                            <h4 class="text-base md:text-lg font-bold">Tri Prastia</h4>
                            <p>Jamaah</p>
                            </div>
                        </div>
                        <p class="text-sm md:text-base text-primary">alhamdilullah perjalan umroh berjalan lancar dan dipandung
                            dengan baik oleh Alia
                            Wisata, semoga bisa kembali lagi
                            umroh bersama Alia Wisata
                        </p>
                        <div class="flex flex-row gap-x-1 text-secondary items-center justify-center text-xl">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="lg:col-span-4 col-span-12">
                        <div class="flex flex-col gap-4 bg-white p-5 rounded-lg">
                        <div class="flex flex-row gap-4 items-center text-primary">
                            <img class="h-12" src="./assets/images/testimonial/tria_member.png" alt="">
                            <div class="flex flex-col">
                            <h4 class="text-base md:text-lg font-bold">Yuni Asri</h4>
                            <p>Jamaah</p>
                            </div>
                        </div>
                        <p class="text-sm md:text-base text-primary">Puji Syukur kepada Allah akhirnya saya bisa melaksanakan ibadah
                            umroh, dan
                            terimakasih buat Alia Wisata yang telah
                            memberikan pelayanan terbaik hingga pulang ke tanah air
                        </p>
                        <div class="flex flex-row gap-x-1 text-secondary items-center justify-center text-xl">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="lg:col-span-4 col-span-12">
                        <div class="flex flex-col gap-4 bg-white p-5 rounded-lg">
                        <div class="flex flex-row gap-4 items-center text-primary">
                            <img class="h-12" src="./assets/images/testimonial/tria_member.png" alt="">
                            <div class="flex flex-col">
                            <h4 class="text-base md:text-lg font-bold">Yuni Asri</h4>
                            <p>Jamaah</p>
                            </div>
                        </div>
                        <p class="text-sm md:text-base text-primary">Puji Syukur kepada Allah akhirnya saya bisa melaksanakan ibadah
                            umroh, dan
                            terimakasih buat Alia Wisata yang telah
                            memberikan pelayanan terbaik hingga pulang ke tanah air
                        </p>
                        <div class="flex flex-row gap-x-1 text-secondary items-center justify-center text-xl">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="lg:col-span-4 col-span-12">
                        <div class="flex flex-col gap-4 bg-white p-5 rounded-lg">
                        <div class="flex flex-row gap-4 items-center text-primary">
                            <img class="h-12" src="./assets/images/testimonial/tria_member.png" alt="">
                            <div class="flex flex-col">
                            <h4 class="text-base md:text-lg font-bold">Yuni Asri</h4>
                            <p>Jamaah</p>
                            </div>
                        </div>
                        <p class="text-sm md:text-base text-primary">Puji Syukur kepada Allah akhirnya saya bisa melaksanakan ibadah
                            umroh, dan
                            terimakasih buat Alia Wisata yang telah
                            memberikan pelayanan terbaik hingga pulang ke tanah air
                        </p>
                        <div class="flex flex-row gap-x-1 text-secondary items-center justify-center text-xl">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</section>

{{-- <!-- Section Promo -->
<section class="container relative max-w-screen-xl py-10 bg-white rounded-md">
    <div class="flex flex-col justify-between w-full gap-0 mb-[50px]">
        <h2 class="text-2xl md:text-3xl font-bold text-secondary">Klaim Voucher</h2>
        <p class="text-base md:text-lg text-primary">Dapatkan promo potongan harga menarik untuk perjalanan ibadah umroh sahabat semua.</p>
    </div>
    <div id="swiper_promo" class="swiper w-full">
        <div class="swiper-wrapper">
        @forelse ($promos as $promo)
            <div class="swiper-slide">
                <img class="w-[550px] h-[200px] rounded-2xl" src="{!! Storage::url($promo->photo) !!}" alt="">
            </div>
        @empty
            <p class="text-sm md:text-base text-white text-center"> Data Belum Tersedia </p>
        @endforelse
        </div>
    </div>
</section> --}}

<!-- Section News -->
<section class="container relative max-w-screen-xl py-10 bg-white rounded-md">
    <div class="flex flex-col justify-between w-full gap-0 mb-[50px]">
        <h2 class="text-2xl md:text-3xl font-bold text-secondary">News.</h2>
        <p class="text-base md:text-lg text-primary">Dapatkan berita menarik untuk perjalanan ibadah umroh sahabat semua.</p>
    </div>

    <div id="swiper_testimonial" class="swiper w-full">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="https://amphuri.org/kementerian-haji-dan-umrah-dibutuhkan-umat/" target="_blank">
                    <div class="lg:col-span-4 col-span-12">
                        <div class="flex flex-col gap-4 bg-primary p-5 rounded-lg">
                            <div class="flex flex-row gap-4 items-center text-white">
                                <img class="h-20" src="https://amphuri.org/wp-content/uploads/2024/10/Dr-ulul-albab-1024x573.jpg" alt="">
                                <div class="flex flex-col">
                                <h4 class="text-base font-bold">AMPHURI Usul Prabowo Bentuk Kementerian Haji dan Umrah</h4>
                                {{-- <p>Jamaah</p> --}}
                                </div>
                            </div>
                            <p class="text-sm md:text-base text-white">
                                {!! substr('AMPHURI.ORG, JAKARTA–Dewan Pengurus Pusat Asosiasi Muslim Penyelenggara Haji dan Umrah Republik Indonesia (DPP AMPHURI) menilai penyelenggaraan haji dan umrah sangatlah kompleks, diperlukan koordinasi dan pengelolaan yang lebih fokus. Karena itu, AMPHURI mendesak Pemerintahan baru di bawah kepemimpinan Prabowo Subianto agar membentuk Kementerian Haji dan Umrah.', 0, 200) !!} {!! strlen('AMPHURI.ORG, JAKARTA–Dewan Pengurus Pusat Asosiasi Muslim Penyelenggara Haji dan Umrah Republik Indonesia (DPP AMPHURI) menilai penyelenggaraan haji dan umrah sangatlah kompleks, diperlukan koordinasi dan pengelolaan yang lebih fokus. Karena itu, AMPHURI mendesak Pemerintahan baru di bawah kepemimpinan Prabowo Subianto agar membentuk Kementerian Haji dan Umrah.') > 50 ? '...' : '' !!}

                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="https://amphuri.org/amphuri-usul-prabowo-bentuk-kementerian-haji-dan-umrah/" target="_blank">
                    <div class="lg:col-span-4 col-span-12">
                        <div class="flex flex-col gap-4 bg-primary p-5 rounded-lg">
                            <div class="flex flex-row gap-4 items-center text-white">
                                <img class="h-20" src="https://amphuri.org/wp-content/uploads/2024/10/Sekjen-Zaky-a.jpg" alt="">
                                <div class="flex flex-col">
                                <h4 class="text-base font-bold">Kementerian Haji dan Umrah Dibutuhkan Umat</h4>
                                {{-- <p>Jamaah</p> --}}
                                </div>
                            </div>
                            <p class="text-sm md:text-base text-white">
                                {!! substr('Kementerian Haji dan Umrah di Indonesia harus direalisasikan. Alasan yang paling mendesak adalah tentang “konteks”, yaitu berkaitan dengan kompleksitas pengelolaan serta jumlah jamaah yang terus bertambah dan tidak mungkin dihentikan. Pengelolaan haji dan umrah sangat kompleks, melibatkan pihak pemerintah, swasta, dan lainnya. Di pihak pemerintah, ada Kementerian Agama yang bertanggung jawab menyusun kebijakan, pelaksanaan teknis, pelayanan, bimbingan, serta pengelolaan sistem informasi terkait haji dan umrah.', 0, 200) !!} {!! strlen('Kementerian Haji dan Umrah di Indonesia harus direalisasikan. Alasan yang paling mendesak adalah tentang “konteks”, yaitu berkaitan dengan kompleksitas pengelolaan serta jumlah jamaah yang terus bertambah dan tidak mungkin dihentikan. Pengelolaan haji dan umrah sangat kompleks, melibatkan pihak pemerintah, swasta, dan lainnya. Di pihak pemerintah, ada Kementerian Agama yang bertanggung jawab menyusun kebijakan, pelaksanaan teknis, pelayanan, bimbingan, serta pengelolaan sistem informasi terkait haji dan umrah.') > 50 ? '...' : '' !!}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="https://amphuri.org/menag-yaqut-temui-menhaj-tawfiq-bahas-persiapan-haji-2025/" target="_blank">
                    <div class="lg:col-span-4 col-span-12">
                        <div class="flex flex-col gap-4 bg-primary p-5 rounded-lg">
                            <div class="flex flex-row gap-4 items-center text-white">
                                <img class="h-20" src="https://amphuri.org/wp-content/uploads/2024/09/Menag-Menhaj-2024-1024x550.jpg" alt="">
                                <div class="flex flex-col">
                                <h4 class="text-base font-bold">Menag Yaqut Temui Menhaj Tawfiq, Bahas Persiapan Haji 2025</h4>
                                {{-- <p>Jamaah</p> --}}
                                </div>
                            </div>
                            <p class="text-sm md:text-base text-white">
                                {!! substr('AMPHURI.ORG, JEDDAH–Menteri Agama Yaqut Cholil Qoumas bertemu dengan Menteri Haji dan Umrah Arab Saudi Tawfiq F Al Rabiah di kantor Kementerian Haji dan Umrah, Jeddah. Dalam pertemuan tersebut, Menag yang didampingi Dirjen Penyelenggaraan Haji dan Umrah Hilman Latief dan Konsul Haji KJRI Jeddah Nasrullah Jasam, sengaja menemui Menhaj Tawfiq untuk membahas persiapan penyelenggaraan ibadah haji 1446 H/2025 M.', 0, 200) !!} {!! strlen('AMPHURI.ORG, JEDDAH–Menteri Agama Yaqut Cholil Qoumas bertemu dengan Menteri Haji dan Umrah Arab Saudi Tawfiq F Al Rabiah di kantor Kementerian Haji dan Umrah, Jeddah. Dalam pertemuan tersebut, Menag yang didampingi Dirjen Penyelenggaraan Haji dan Umrah Hilman Latief dan Konsul Haji KJRI Jeddah Nasrullah Jasam, sengaja menemui Menhaj Tawfiq untuk membahas persiapan penyelenggaraan ibadah haji 1446 H/2025 M.') > 50 ? '...' : '' !!}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    {{-- <div id="swiper_promo" class="swiper w-full">
        <div class="swiper-wrapper">
        @forelse ($promos as $promo)
            <div class="swiper-slide">
                <img class="w-[550px] h-[200px] rounded-2xl" src="{!! Storage::url($promo->photo) !!}" alt="">
            </div>
        @empty
            <p class="text-sm md:text-base text-white text-center"> Data Belum Tersedia </p>
        @endforelse
        </div>
    </div> --}}
</section>

<!-- Section Maskapai -->
<section class="container relative max-w-screen-xl py-10">
    <div class="flex flex-col justify-between w-full gap-1 mb-[50px]">
        <h2 class="text-2xl md:text-3xl font-bold text-white">Partner Maskapai.</h2>
        <p class="text-base md:text-lg text-white">Dapatkan promo potongan harga menarik untuk perjalanan ibadah umroh sahabat semua.</p>
    </div>
    <div id="swiper_maskapai" class="swiper w-full">
    <div class="swiper-wrapper">
    {{-- <div id="mitraCarousel"> --}}
        @forelse ($airlines as $airline)
        <div class="swiper-slide">
            <img class="rounded-2xl bg-white" src="{!! Storage::url($airline->photo) !!}"
                alt="{!! $airline->title !!}">
            {{-- <img class="w-[150px] h-[120px] rounded-2xl mr-[30px]" src="{!! Storage::url($airline->icon) !!}"
                alt="{!! $airline->title !!}"> --}}
        </div>
        @empty
        <p class="text-sm md:text-base text-white text-center"> Data Belum Tersedia </p>
        @endforelse
    {{-- </div> --}}
    </div>
    </div>
</section>

<!-- Section Map -->
<section class="relative w-full h-96 pt-10">
<iframe class="absolute top-0 left-0 w-full h-full"
    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1983.0592767550183!2d106.910004!3d-6.248105!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f32ce6fef20f%3A0x89dca65a133bb62!2sAlia%20Wisata!5e0!3m2!1sid!2sid!4v1725100268556!5m2!1sid!2sid"
    style="border:0;" allowfullscreen="" frameborder="0" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

@endsection

@section('jsCustom')

@endsection
