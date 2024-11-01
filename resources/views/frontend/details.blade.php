@extends('frontend.layouts.frontend')

@section('meta_title', $product->name)

@section('meta_description', 'Berdiri sejak 2000, sebagai travel umroh haji Alia Wisata terus memberikan pelayanan terbaik kepada Jamaahnya. Alia juga melayani Ticketing, Tours, Hotel dan lain-lain')

@section('cssCustom')

@endsection

@section('content')

<!-- Section Hero -->
<div>
    <div class="relative h-[450px] w-full overflow-hidden">
        <div class="absolute inset-0">
        <img alt="title" class="h-full w-full object-cover object-right md:object-center"
            src="{!! asset(Storage::url($product->photo)) !!}">
        <div class="absolute inset-0 bg-black opacity-70"></div>
        </div>
        <div class="container max-w-screen-xl relative z-10 flex flex-col justify-center h-full">
        <!-- <h2 class="md:max-w-lg lg:max-w-lg xl:max-w-2xl mx-auto text-xl md:text-2xl md:leading-normal text-white">
            Umroh penuh makna dengan</h2> -->
        <h3
            class="md:max-w-lg lg:max-w-lg xl:max-w-2xl text-lg md:text-xl font-black md:leading-normal text-white">
            Program {!! $product->category->name !!}
        </h3>
        <h2
            class="md:max-w-lg lg:max-w-lg xl:max-w-2xl text-2xl md:text-3xl font-black md:leading-normal text-white pb-2">
            {!! $product->name !!}
        </h2>
        <h3 class="pb-1">
            {!! $product->sub_title !!}
        </h3>
        <p class="md:max-w-lg lg:max-w-lg xl:max-w-4xl">
            {!! $product->sub_description !!}
        </p>
        <!-- <div
            class="max-w-xs md:max-w-md lg:max-w-2xl mx-auto text-white text-base md:text-lg md:leading-normal tracking-wide">
            <p class="text-base md:text-lg">“Ibadah umrah ke ibadah umrah berikutnya adalah penggugur (dosa) di antara
            keduanya, dan haji yang mabrur
            tiada
            balasan (bagi pelakunya) melainkan surga” (HR al-Bukhari dan Muslim)</p>
        </div> -->
        </div>
    </div>
</div>


  <!-- Section detail produt -->
  <section class="container relative max-w-screen-xl py-10 bg-primary">
    <div class="grid lg:grid-cols-6 md:grid-cols-2 grid-cols-1 gap-7 mt-0 md:-mt-28">
            <!-- Sider-Left -->
            <div class="order-2 md:order-1 lg:col-span-4 bg-secondary gap-4 p-7 rounded-lg">
                <div class="pb-4">
                    <p>{!! $product->description !!}</p>
                </div>
                <div id="slider-banner-product" class="pb-4">
                        @forelse ($product->ProductPhotos as $ProductPhoto)
                            <a href="http://">
                                <img class="w-full rounded-lg" src="{!! Storage::url($ProductPhoto->photo) !!}"
                                alt="">
                            @empty
                                <p>sas</p>
                        @endforelse
                    </a>
                </div>
                <article id="Content-wrapper" class="pb-10">
                    {!! $product->detail !!}
                </article>
            </div>

            <!-- Sider-Right -->
            <div class="order-1 md:order-2 lg:col-span-2 gap-4 relative">
                <div class="bg-white min-h-[450px] p-5 rounded-lg md:sticky top-0">
                    <img class="w-full rounded-lg pb-2" src="{!! Storage::url($product->photo) !!}" alt="" srcset="">
                    <h3 class="text-base md:text-lg font-bold text-secondary text-right pb-2">
                    Harga Mulai!
                    </h3>
                    <div class="border border-primary rounded-lg">
                        @forelse ($product->ProductPrices as $ProductPrice)
                        <div class="border-b rounded-lg">
                            <div class="flex flex-col">
                                <div class="flex flex-row justify-between p-2">
                                    <div class="text-primary">
                                        <div class="flex flex-row items-center gap-2">
                                            <ion-icon name="people-outline" class="text-xl bg-secondary block rounded-2xl p-1 text-white"></ion-icon>
                                                <h3 class="text-base md:text-lg font-base">
                                                {!! $ProductPrice->price_type !!}
                                                </h3>
                                        </div>
                                    </div>
                                    <h3 class="text-base md:text-lg font-bold text-secondary">
                                        {!! $ProductPrice->price_tier !!} Juta
                                    </h3>
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse
                    </div>

                    <div class="flex flex-col gap-y-4 pt-4">
                        <!-- hotel -->
                        <div class="flex flex-col gap-y-2 border border-primary rounded-lg p-2">
                            <div class="flex items-center justify-between">
                                <h3 class="text-base md:text-lg font-bold text-primary">Hotel</h3>
                                <ion-icon name="bed-outline" class="text-2xl bg-secondary block rounded-2xl p-1"></ion-icon>
                            </div>
                            <div>
                                @forelse ($product->ProductHoteles as $ProductHotel)
                                <div class="flex flex-row justify-between items-center">
                                    <div class="flex flex-row items-center gap-2">
                                        <ion-icon name="checkmark-circle" class="text-secondary"></ion-icon>
                                        <p class="text-base md:text-base text-primary">{!! $ProductHotel->hotel->name !!}</p>
                                    </div>
                                    <div class="flex flex-row text-primary">
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

                                @endforelse
                            </div>
                        </div>
                        <!-- maskapai -->
                        <div class="flex flex-col gap-y-4 border border-primary rounded-lg p-2">
                            <div class="flex items-center justify-between">
                                <h3 class="text-base md:text-lg font-bold text-primary">Maskapai</h3>
                                <ion-icon name="airplane-outline" class="text-2xl bg-secondary block rounded-2xl p-1"></ion-icon>
                            </div>
                            <div>
                                @forelse ($product->ProductAirlines as $ProductAirline)
                                <div class="flex flex-row justify-between items-center">
                                    <div class="flex flex-row items-center gap-2">
                                        <ion-icon name="checkmark-circle" class="text-secondary"></ion-icon>
                                        <p class="text-base md:text-base text-primary">{!! $ProductAirline->airline->name !!}</p>
                                    </div>
                                    <div class="max-w-24">
                                        <img class="w-full border border-primary rounded-lg" src="{!! Storage::url($ProductAirline->airline->icon) !!}" alt="">
                                    </div>
                                </div>
                                @empty

                                @endforelse
                            </div>
                        </div>
                        <!-- benefit -->
                        <div class="flex flex-col gap-y-2 border border-primary rounded-lg p-2">
                            <div class="flex items-center justify-between">
                                <h3 class="text-base md:text-lg font-bold text-primary">Benefit</h3>
                                <ion-icon name="trophy-outline" class="text-2xl bg-secondary block rounded-2xl p-1"></ion-icon>
                            </div>
                            <div>
                                @forelse ($product->ProductBenefits as $ProductBenefit)
                                <div class="flex flex-row items-center gap-4">
                                    <ion-icon name="checkmark-circle" class="text-secondary"></ion-icon>
                                    <h4 class="text-base md:text-lg text-primary">{!! $ProductBenefit->name !!}</h4>
                                </div>
                                @empty

                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="pt-10">
                            <a href="//wa.me/628161458888?text=Assalammualaikum+Alia Wisata,%0ASaya+berminat+Paket+{!! $product->category->name !!}+{!! $product->name !!}%3F" class="block btn-secondary flex flex-row items-center align-center justify-center">
                            <ion-icon name="logo-whatsapp" class="text-2xl"></ion-icon>
                                Contact Whastapp
                            </a>
                    </div>
                </div>
            </div>
           </div>
        </div>
    </div>

</section>

@endsection

@section('jsCustom')
 <script>
    var flkty = new Flickity('#slider-banner-product', {
      cellAlign: 'left',
      imagesLoaded: true,
      contain: true,
      prevNextButtons: false,
      autoPlay: true,
      wrapAround: true,
      draggable: true,
      adaptiveHeight: true,
      pageDots: false,
      groupCells: false,
    });

  </script>

@endsection
