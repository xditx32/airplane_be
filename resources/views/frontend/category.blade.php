@extends('frontend.layouts.frontend')

@section('meta_title', $category->name)

@section('meta_description', 'Berdiri sejak 2000, sebagai travel umroh haji Alia Wisata terus memberikan pelayanan terbaik kepada Jamaahnya. Alia juga melayani Ticketing, Tours, Hotel dan lain-lain')

@section('cssCustom')

@endsection

@section('content')
{{-- <section class="container relative max-w-screen-xl pt-5">
     <a href="{!! route('home') !!}" class="font-bold">Beranda</a> / {!! $category->name !!}
</section> --}}
<section id="packet" class="container relative max-w-screen-xl py-10 bg-white rounded-md my-10">
    <div class="flex flex-col justify-between w-full gap-0 mb-[50px]">
        <h2 class="text-2xl md:text-3xl font-bold text-primary">Kategori Program {!! $category->name !!} Best Seller.</h2>
    </div>

    <div id="swiper_product" class="swiper w-full pb-10">
        <div class="swiper-wrapper">


            @foreach (@$category->products as $product)

                <div class="swiper-slide w-[300px] rounded-2xl overflow-hidden relative bg-primary">
                        <div class="group w-full overflow-hidden relative min-h-[350px] bg-primary">
                            <img src="{!! Storage::url( $product->photo ) !!}" class="w-full h-full max-h-[250px]" alt="{!! $product->name!!}">
                            <div class="p-5 w-full flex flex-col absolute h-full group-hover:-translate-y-[70%] transition ease-in-out duration-300 bg-primary">
                                <div class="flex flex-wrap items-center justify-between gap-y-4">
                                    {{-- <div class="flex flex-col gap-y-2">
                                        <div class="flex flex-wrap gap-2">
                                            @forelse ($product->ProductTags as $ProductTag)
                                            <div class="bg-secondary px-2 py-1 rounded-md block">
                                                <p class="text-[10px]">#{!! $ProductTag->name !!}</p>
                                            </div>
                                            @empty

                                            @endforelse
                                        </div>
                                    </div> --}}
                                    <div class="max-w-[150px]">
                                        <div class="text-xl font-semibold truncate">
                                            @forelse ($product->ProductAirlines as $ProductAirline)
                                                <img class="w-full h-full max-w-[55%] bg-white rounded-xl" src="{!! Storage::url( $ProductAirline->airline->icon ) !!}" alt="">
                                                @empty
                                                <p class="text-sm md:text-base text-primary">
                                                    Data Belum Tersedia
                                                </p>
                                            @endforelse
                                        </div>
                                        <p class="text-white text-sm mt-[6px]">
                                            Priode •  {!! $product->start_priode->format('d-m-Y') !!}
                                        </p>
                                    </div>
                                    <div class="max-w-[105px]">
                                        <p class="text-[10px] text-white pb-1">Harga Mulai</p>
                                        <p class="text-xl font-semibold text-secondary bg-white rounded-md py-2 px-1">
                                            {!! $product->price_start_from !!} Juta
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="flex flex-col gap-y-2">
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
                                </div>
                                @if ($product->seat_available == 1)
                                    <div class="mt-auto px-4 py-1 transition duration-300 ease-in-out opacity-0 group-hover:opacity-100">
                                        <a href="{{ route('product.details', [$category->slug, $product->slug]) }}" class="block btn-orange">
                                            <div class="flex flex-row gap-2 items-center justify-center align-center">
                                                <ion-icon name="alert-circle-outline" class="text-white"></ion-icon>
                                            Terbatas
                                            </div>
                                        </a>
                                    </div>
                                    @elseif($product->seat_available >= 1)
                                    <div class="mt-auto px-4 py-1 transition duration-300 ease-in-out opacity-0 group-hover:opacity-100">
                                        <a href="{{ route('product.details', [$category->slug, $product->slug]) }}" class="block btn-secondary">
                                            <div class="flex flex-row gap-2 items-center justify-center align-center">
                                                <ion-icon name="checkmark-circle" class="text-white"></ion-icon>
                                                {!! $product->seat_available !!}
                                                Tersisa
                                            </div>
                                        </a>
                                    </div>
                                    @else
                                    <div class="mt-auto px-4 py-1 transition duration-300 ease-in-out opacity-0 group-hover:opacity-100">
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

            @endforeach

        </div>
    </div>

</section>

<section class="container relative max-w-screen-xl py-10 my-10">
    <div class="grid lg:grid-cols-6 md:grid-cols-2 grid-cols-1 gap-5">
        <div class="lg:col-span-3">
            <div class="max-h-* md:sticky top-0">
                <img class="w-full h-full rounded-xl bg-secondary shadow-lg shadow-[#50d71e]" src="{!! Storage::url($category->photo) !!}" alt="" srcset="">
            </div>
        </div>
        <div class="lg:col-span-3">
            <article id="Content-wrapper" class="pb-10">
                {!! $category->description !!}
            </article>
        </div>
    </div>

</section>

{{-- <section class="container relative max-w-screen-xl py-10 my-10">
    <article id="Content-wrapper" class="pb-10">
        {!! $category->description !!}
    </article>
</section> --}}

@endsection

@section('jsCustom')

@endsection
