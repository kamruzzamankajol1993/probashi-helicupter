@extends('front.master')

@section('title')
{{ $missionLists->title }} | {{ $ins_name }}
@endsection


@section('body')
<main>
    <section class="container mx-auto ">
        <div class="relative">
             <div class="w-full object-cover md:h-[550px]">
                <img class="w-full h-full" src="{{ asset('/') }}{{ $missionLists->image }}" alt="">
             </div>
             <!-- <div class="absolute inset-0 bg-black opacity-40"></div> -->
        </div>
        <h6 class=" font-bold text-2xl  p-4 uppercase">{!! $missionLists->title !!}</h6>
        <p class="p-4">{!! $missionLists->des !!}

    </p>
    <button class="flex border-2 p-4 gap-4 rounded-full bg-[var(--color-primary)] text-white font-bold"><a href="">Rent:{{ $missionLists->price }} BDT</a><i class="text-xl fa-solid fa-helicopter"></i><a href="{{ route('confirm_service_order',$missionLists->slug) }}">BOOK NOW</a></button>
        <!-- <h6 class="text-center font-bold text-3xl mt-4 p-4 uppercase">Helicopter Chartered Flight</h6>
        <div class="p-4  md:h-[650px]  mt-8">
            <img class="w-full h-full place-items-center " src="./our service/service1.jpg" alt="">
        </div>
        <p class="p-4 mt-12"><span class="font-bold text-2xl">For Chartered Passenger flight costing depend on the following
                factors:</span> <br>

            a. Distance between the landing point and airport <br>
            b. The travel date (For national holiday and Friday have extra Overtime charge) <br>
            c. Waiting Time <br>
            d. The model of the Helicopter <br>
            But minimum charge for a helicopter is 75,000BDT<br>
            To know your correct costing please share your landing location from google map to our WhatsApp number
            +8801993319344

        </p> -->
    </section>
    {{-- <div class="flex justify-between container mx-auto mt-4 p-2">
        <a class="font-bold " href="service1.html"> <-Previous</a>
        <a class="font-bold " href="service3.html">Next-></a>
    </div> --}}

@if(empty($previous) && empty($next))

@else
    @if($latestId == $missionLists->id)


    <div class="flex justify-between container mx-auto mt-4 p-2">
        <a class="font-bold " href="{{route('service_detail',['slug'=>$pnews->slug])}}"> <-Previous</a>
        {{-- <a class="font-bold " href="service3.html">Next-></a> --}}
    </div>

    @elseif($latestId != $missionLists->id && $firstId == $missionLists->id)

    <div class="flex justify-between container mx-auto mt-4 p-2">

        <a class="font-bold " href="{{route('service_detail',['slug'=>$nnews->slug])}}">Next-></a>
    </div>

    @else
    <div class="flex justify-between container mx-auto mt-4 p-2">
        <a class="font-bold " href="{{route('service_detail',['slug'=>$pnews->slug])}}"> <-Previous</a>
        <a class="font-bold " href="{{route('service_detail',['slug'=>$nnews->slug])}}">Next-></a>
    </div>
     @endif
@endif

</main>
@endsection
