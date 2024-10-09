@extends('frontend.layouts.frontend')

@section('meta_title', $category->name)

@section('meta_description', 'Berdiri sejak 2000, sebagai travel umroh haji Alia Wisata terus memberikan pelayanan terbaik kepada Jamaahnya. Alia juga melayani Ticketing, Tours, Hotel dan lain-lain')

@section('cssCustom')

@endsection

@section('content')
<section class="container relative max-w-screen-xl pt-5">
     <a href="{!! route('home') !!}" class="font-bold">Beranda</a> / {!! $category->name !!}
</section>
<section id="packet" class="container relative max-w-screen-xl py-10 bg-white rounded-md mb-10">
    <div class="flex flex-col justify-between w-full gap-0 mb-[50px]">
        <h2 class="text-2xl md:text-3xl font-bold text-primary">Kategori Program {!! $category->name !!} Best Seller.</h2>
        <p class="text-base md:text-lg text-secondary">Kami memiliki paket-paket umroh yang dapat anda
            Tangal keberangkatan terdekat program umroh Alia Wisata.</p>
    </div>

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
            <div class="swiper-slide w-[300px] h-[250px] rounded-2xl overflow-hidden relative min-h-[760px] bg-primary">
                        {{-- <a data-src="{!! Storage::url( $product->photo ) !!}"> --}}
                            <img src="{!! Storage::url( $product->photo ) !!}" class="w-full h-full max-h-[180px]" alt="{!! $product->name!!}">
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
                                            <ion-icon name="alert-circle-outline" class="text-white">></ion-icon>
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

</section>

@endsection

@section('jsCustom')

@endsection
