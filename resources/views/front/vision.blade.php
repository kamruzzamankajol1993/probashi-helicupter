@extends('front.master')

@section('title')
Contact | {{ $ins_name }}
@endsection


@section('body')
<main>


    <section class="container mx-auto mt-8 ">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="border-2 lg:w-[500px] 2xl:w-[700px]">
                <p class="text-center font-bold text-xl text-[var(--color-primary)] mt-4">OUR ADDRESS</p>
                <div class=" p-1 md:p-4  2xl:ml-48 " style="width: 80%;"  >
                    <span class="flex gap-2 mt-8  ">
                        <ion-icon class="mt-1" name="call-outline"></ion-icon>
                        <a href="tel: {{ $sysInfo->Phone }}">{{ $sysInfo->Phone }}</a>
                    </span>
                    <span class="flex gap-2 mt-2  ">
                        <ion-icon class="mt-1.5" name="mail-outline"></ion-icon>
                        <p class="">{{ $sysInfo->Email }}</p>
                    </span>
                    <span class="flex gap-2 mt-2  ">
                        <ion-icon class="mt-2" name="location-outline"></ion-icon>
                        <p>{{ $sysInfo->Address }}</p>
                    </span>
                </div>

            </div>
            <div class=" lg:w-[500px] h-[300px]  p-20" >
                <img class="w-full h-full" src="{{ asset('/') }}public/front/logo/Probashi Helicopter_Logo-02-01.jpg"  alt="">
            </div>
        </div>
    </section>
    <!-- <section class="mt-12">
        <div class="flex items-center place-items-center">
            <hr class="flex-grow  border-gray-300">
            <span class="px-2 text-[var(--color-primary)] text-2xl">Sister Concern of <span class="text-red-500">PROBASHI GROUP</span></span>
            <hr class="flex-grow  border-gray-300">
        </div>
    </section> -->
    <!-- <section class="container mx-auto mt-12">
        <div class="grid grid-cols-1  lg:grid-cols-3 xl:grid-cols-5 gap-5 place-items-center">
             <div class="text-3xl text-[var(--color-primary)] mt-12 flex gap-5">
                <a href="https://www.youtube.com/@ProbashiAir"><i class="fa-brands fa-youtube"></i></a>
                <a href="https://www.facebook.com/ProbashiAirService"><i class="fa-brands fa-facebook"></i></a>
                <a href="tel: +8801993319344"><i
                        class="fa-brands fa-whatsapp"></i></a>
             </div>
             <div class=" w-[150px] h-[100px] mt-4">
                <a href="https://probashtime.net/"><img src="./probashi group image/1.png" alt=""></a>
             </div>
             <div class="w-[150px] h-[100px]">
                <img class="w-full h-full" src="./logo/Probashi Helicopter_Logo-02-01.jpg" alt="">
             </div>
             <div class="w-[150px] h-[100px]">
                <a href="https://probashircity.com/"><img class="w-full h-full" src="./probashi group image/2.webp" alt=""></a>
             </div>
             <div class="w-[150px] h-[100px]">
                <a href="https://probashirtaxi.com/web/"><img class="w-full h-full" src="./probashi group image/3.png" alt=""></a>
             </div>
        </div>
    </section> -->
</main>
@endsection
