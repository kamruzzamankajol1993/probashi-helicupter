@extends('front.master')

@section('title')
About | {{ $ins_name }}
@endsection


@section('body')
<main>

    <section class="container mx-auto">
        <p class="text-center text-[var(--color-primary)] text-3xl font-bold uppercase  ">About us</p>
        <div class="flex items-center mt-2">
            <hr class="flex-grow  border-gray-300">
            <span class="px-2 text-[var(--color-primary)] text-3xl"><i class="fa-solid fa-helicopter"></i></span>
            <hr class="flex-grow  border-gray-300">
        </div>
        <div class="grid grid-cols-1  lg:grid-cols-2 2xl:grid-cols-3 mt-12 gap-8">
            <div>
                <img class="p-16" src="{{ asset('/') }}public/front/logo/Probashi Helicopter_Logo-02-01.jpg" alt="">
                <p class="text-justify p-4">Probashir Helicopter offers a one-stop Helicopter service in
                    Bangladesh from the airport to your
                    destination. It is an exclusive airport transport solution for a person who is coming to
                    Bangladesh from abroad.</p>

            </div>
            <div>
                <div class=" lg:w-[480px] xl:w-[600px] h-[200px]  lg:h-[400px]">


                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/KYvCTcixWq4?si=f8nt_gyhBgWa4Zai" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>


                </div>
            </div>
            <div>
                <p class="text-center text-[var(--color-primary)] text-xl font-bold uppercase  ">contact us</p>
                <div class="ml-0 md:ml-16 2xl:ml-24 p-4 "   >
                    <span class="flex gap-3 mt-8  sm:text-lg">
                        <ion-icon class="mt-1" name="call-outline"></ion-icon>
                        <a href="tel: {{ $sysInfo->Phone }}"> {{ $sysInfo->Phone }}</a>
                    </span>
                    <span class="flex gap-3 mt-3  sm:text-lg">
                        <ion-icon class="mt-1.5" name="mail-outline"></ion-icon>
                        <p class="text-lg">{{ $sysInfo->Email }}</p>
                    </span>
                    <span class="flex gap-3 mt-2  sm:text-lg">
                        <ion-icon class="mt-1" name="location-outline"></ion-icon>
                        <p>{{ $sysInfo->Address }}</p>
                    </span>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
