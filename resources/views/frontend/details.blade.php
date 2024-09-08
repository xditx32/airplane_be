@extends('frontend.layouts.frontend')

@section('cssCustom')

@endsection

@section('content')

  <!-- Section Hero -->
  <div>
    <div class="relative h-[450px] w-full overflow-hidden">
      <div class="absolute inset-0">
        <img alt="title" class="h-full w-full object-cover object-right md:object-center"
          src="{!! asset(Storage::url($product->thumbnail)) !!}">
        <div class="absolute inset-0 bg-black opacity-60"></div>
      </div>
      <div class="relative z-10 flex flex-col justify-center items-center h-full text-center">
        <!-- <h2 class="md:max-w-lg lg:max-w-lg xl:max-w-2xl mx-auto text-xl md:text-2xl md:leading-normal text-white">
          Umroh penuh makna dengan</h2> -->
        <h1
          class="md:max-w-lg lg:max-w-lg xl:max-w-2xl mx-auto text-4xl md:text-5xl font-black md:leading-normal text-white">
          {!! $product->name !!}
        </h1>
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
      <div class="grid lg:grid-cols-6 md:grid-cols-2 grid-cols-1 gap-7">
          <!-- Sider-Left -->
          <div class="lg:col-span-4 bg-secondary gap-4 p-7 rounded-lg">
            <div class="inline-flex gap-[6px] items-center bg-secondary rounded-full px-4 py-[6px] w-max">
                <img src="./assets/images/ic-champion-cup.svg" alt="tickety-assets">
                <p class="text-sm font-semibold text-white">
                    Popular
                </p>
            </div>
            <div>
            <h5 class="text-[24px] md:text-[38px] font-bold text-primary">
                What <span class="text-butter-yellow">This</span> <br>
                <span class="text-butter-yellow">Event</span> About?
            </h5>
            <p class="text-primary text-lg leading-8 max-w-[640px] mt-4 mb-[30px]">
                {!! $product->about !!}
            </p>
            </div>
            <div id="slider-banner-product">
                @forelse ($product->ProductPhotos as $ProductPhoto)
                <a href="http://">
                    <img class="w-[500px] h-[400px] rounded-lg mr-[30px]" src="{!! Storage::url($ProductPhoto->photo) !!}"
                    alt="">
                @empty
                    <p>sas</p>
                @endforelse
            </a>
            </div>
          </div>
          <!-- Sider-Right -->
          <div class="lg:col-span-2 bg-white gap-4 p-7 rounded-lg">
            <div class="flex flex-row gap-x-1 text-secondary items-center justify-center text-xl">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-center text-white p-4 border bg-secondary rounded-full">
                    @money($product->price )

                </h1>
                <div class="flex flex-col gap-y-4 pt-2">
                <!-- priode -->
                <div class="flex flex-col gap-y-4">
                    <div class="flex items-center gap-4">
                    <ion-icon name="calendar-outline" class="text-2xl bg-secondary block rounded-2xl p-1"></ion-icon>
                    <h3 class="text-base md:text-lg font-bold text-primary">Priode</h3>
                    </div>
                    <div>
                        <div class="flex flex-row items-center gap-1">
                        <ion-icon name="checkmark-circle" class="text-secondary"></ion-icon>
                        <p class="text-sm md:text-base text-primary">{!! $product->priode->date !!}</p>
                        </div>
                    </div>
                </div>
                <!-- hotel -->
                <div class="flex flex-col gap-y-4">
                    <div class="flex items-center gap-4">
                    <ion-icon name="bed-outline" class="text-2xl bg-secondary block rounded-2xl p-1"></ion-icon>
                    <h3 class="text-base md:text-lg font-bold text-primary">Hotel</h3>
                    </div>
                    <div>
                        @forelse ($product->ProductHotels as $ProductHotel)
                        <div class="flex flex-row items-center gap-2">
                        <ion-icon name="checkmark-circle" class="text-secondary"></ion-icon>
                        <p class="text-sm md:text-base text-primary">{!! $ProductHotel->name !!}</p>
                        </div>
                        @empty

                        @endforelse
                    </div>
                </div>
                <!-- maskapai -->
                <div class="flex flex-col gap-y-6">
                    <div class="flex items-center gap-4">
                    <ion-icon name="airplane-outline" class="text-2xl bg-secondary block rounded-2xl p-1"></ion-icon>
                    <h3 class="text-base md:text-lg font-bold text-primary">Maskapai</h3>
                    </div>
                    <div class="flex flex-row gap-2">
                    @forelse ($product->ProductAirlines as $ProductAirline)
                        <img class="w-2/4" src="{!! Storage::url($ProductAirline->airline->icon) !!}" alt="">
                    @empty

                    @endforelse
                    </div>
                </div>
                </div>
                <div class="text-primary">
                <h4 class="text-base md:text-lg font-bold pt-4">Benefit</h4>
                @forelse ($product->ProductBenefits as $ProductBenefit)
                <div class="flex items-center gap-4">
                    <ion-icon name="checkmark-circle" class="text-secondary"></ion-icon>
                    <h4 class="text-base md:text-lg">{!! $ProductBenefit->name !!}</h4>
                </div>
                @empty

                @endforelse
                <div class="mt-auto pt-14">
                    <a href="/public/pages/details.html" class="block btn-secondary">
                    Contact Whastapp
                    </a>
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
      prevNextButtons: true,
      autoPlay: true,
      wrapAround: true,
      draggable: true,
      adaptiveHeight: true,
      pageDots: false,
      groupCells: false,
    });

  </script>

@endsection
