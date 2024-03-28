@extends('front.master')

@section('title')
Home | {{ $ins_name }}
@endsection


@section('body')

@include('front.include.banner')

<section class="mt-8">
    <div class="text-center text-2xl font-bold text-[var(--color-primary)]">
        <p>OUR RUNNING OFFERS</p>
    </div>
</section>
<!-- cart start-->
<section class=" container mx-auto mt-8">
    <div class="grid grid-cols-1 md:grid-cols-2  xl:grid-cols-3 2xl:grid-cols-4 gap-8 p-8 place-items-center">

        @foreach($allOffers as $allOffersView)
        <div class=" card md:w-[350px]  bg-base-100 shadow-md hover:shadow-xl xl:transition xl:duration-300 xl:transform xl:hover:scale-110">
            <figure><img src="{{ asset('/') }}{{ $allOffersView->image }}" /></figure>
            <div class="card-body">

                <p class="mt-2"><span class="text-md font-bold text-[var(--color-primary)]">DEPARTURE </span>:
                    {{ $allOffersView->departure }}</p>
                <p class=""><span class="text-md font-bold text-[var(--color-primary)]">LANDING </span>: {{ $allOffersView->landing }}
                </p>
                <p class=""><span class="text-md font-bold text-[var(--color-primary)]">FLY DATE </span>: {{ date('d F, Y', strtotime($allOffersView->fly_date)) }}</p>

                <p class=""><span class="text-md font-bold text-[var(--color-primary)]">OFFER END </span>: {{ date('d F, Y', strtotime($allOffersView->end_date)) }}
                </p>
                <p class="text-xl font-bold "><span class="text-md font-bold text-[var(--color-primary)]">OFFER
                        RATE </span>:
                        {{ $allOffersView->price }}</p>
                <button
                    class="uppercase text-center p-2 border-2  rounded-lg  text-white bg-[var(--color-primary)] uppercase hover:text-[var(--color-primary)] hover:bg-white font-bold text-lg border-[var(--color-primary)]"><a
                        href="{{ route('confirm_offer_order',$allOffersView->slug) }}">Buy now</a> </button>
            </div>
        </div>
        @endforeach



    </div>



</section>
<!-- cart end-->
<!-- note start-->
<section class="container mx-auto mt-12 p-1 bg-[var(--color-primary)]">
    <div class="flex items-center">
        <hr class="flex-grow  border-gray-300">
        <span class="px-2 text-white ml-12text-xl">নোট</span>
        <hr class="flex-grow  border-gray-300">
    </div>
    <div class="flex text-center justify-center gap-3  mt-4 cursor-pointer">
        <ion-icon class="mt-1 text-white" name="arrow-forward-outline"></ion-icon>
        <p class="text-white">অফারের ভাড়া নির্ধারিত রুটের নির্ধারিত তারিখের জন্য প্রযোজ্য।</p>
    </div>
    <div class="flex text-center justify-center gap-3  mt-2 cursor-pointer">
        <ion-icon class="mt-1 text-white" name="arrow-forward-outline"></ion-icon>
        <p class="text-white">ভাড়া জনপ্রতি</p>
    </div>
    <div class="flex text-center justify-center gap-3  mt-2 cursor-pointer">
        <ion-icon class="mt-1 text-white" name="arrow-forward-outline"></ion-icon>
        <p class="text-white">দুই বছরের অধিক বয়সীদের টিকিট প্রযোজ্য</p>
    </div>
    <div class="flex text-center justify-center gap-3  mt-2 cursor-pointer">
        <ion-icon class="mt-1 text-white" name="arrow-forward-outline"></ion-icon>
        <p class="text-white">শুধুমাত্র আগ্রহীদের যোগাযোগ করতে অনুরোধ করা হলো।</p>
    </div>
    <div class="flex items-center mt-16">
        <hr class="flex-grow  border-gray-300">
        <span class="px-2 text-white ml-12text-3xl"><i class="fa-solid fa-helicopter"></i></span>
        <hr class="flex-grow  border-gray-300">
    </div>
</section>
<!--note end-->
<!--SERVICE START-->
<section class="container mx-auto mt-16">
    <p class="text-center text-[var(--color-primary)] text-2xl font-bold">OUR SERVICE</p>
    <div class="flex items-center mt-2">
        <hr class="flex-grow  border-gray-300">
        <span class="px-2 text-[var(--color-primary)] text-3xl"><i class="fa-solid fa-helicopter"></i></span>
        <hr class="flex-grow  border-gray-300">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 mt-4 p-2 place-items-center">

        @foreach($missionLists as $missionListsView)
        <div class="card  lg:w-[450px] border bg-base-100 shadow-lg hover:shadow-2xl ">
            <a href="{{ route('service_detail',$missionListsView->slug) }}"><figure><img class="transition duration-300 transform hover:scale-110 p-8"
                src="{{ asset('/') }}{{ $missionListsView->image }}" /></figure></a>
            <p class="mb-4 px-8 cursor-pointer text-md hover:text-[var(--color-primary)] font-bold uppercase"><a
                    href="{{ route('service_detail',$missionListsView->slug) }}">{{ $missionListsView->title }}</a></p>
        </div>
        @endforeach


    </div>
</section>
<!--SERVICE END-->
<!--Our cities start-->
<section class="container mx-auto mt-16">

    <p class="text-center text-[var(--color-primary)] text-2xl font-bold">TOP CITIES</p>
    <div class="flex items-center mt-2">
        <hr class="flex-grow  border-gray-300">
        <span class="px-2 text-[var(--color-primary)] text-3xl"><i class="fa-solid fa-helicopter"></i></span>
        <hr class="flex-grow  border-gray-300">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 mt-4 place-items-center p-2">
        <div class="card  lg:w-[450px] border bg-base-100 shadow-lg hover:shadow-2xl ">
            <figure><img class="transition  duration-300 transform hover:scale-110 p-8"
                    src="{{ asset('/') }}public/front/our cities/1.webp" /></figure>
            <p
                class="mb-10 text-center cursor-pointer text-white ml-12text-md p-2 font-bold bg-[var(--color-primary)]">
                <a href="">ঢাকা</a>
            </p>
        </div>
        <div class="card lg:w-[450px] border bg-base-100 shadow-lg hover:shadow-2xl ">
            <figure><img class="b transition duration-300 transform hover:scale-110 p-8"
                    src="{{ asset('/') }}public/front/our cities/2.webp" /></figure>
            <p
                class="mb-10 text-center cursor-pointer text-white ml-12text-md p-2 font-bold bg-[var(--color-primary)]">
                <a href="">নারায়ণগঞ্জ</a>
            </p>
        </div>
        <div class="card lg:w-[450px] border bg-base-100 shadow-lg hover:shadow-2xl ">
            <figure><img class="transition duration-300 transform hover:scale-110 p-8"
                    src="{{ asset('/') }}public/front/our cities/3.jpg" /></figure>
            <p
                class="mb-10 text-center cursor-pointer text-white ml-12text-md p-2 font-bold bg-[var(--color-primary)]">
                <a href="">ব্রাহ্মণবাড়িয়া</a>
            </p>
        </div>
    </div>
</section>
<!--Our cities end-->
<!--What are our client say start-->
<section class="container mx-auto mt-12">
    <p class="text-center text-[var(--color-primary)] text-2xl font-bold">WHAT OUR CLIENTS SAY</p>
    <div class="flex items-center mt-2">
        <hr class="flex-grow  border-gray-300">
        <span class="px-2 text-[var(--color-primary)] text-3xl"><i class="fa-solid fa-helicopter"></i></span>
        <hr class="flex-grow  border-gray-300">
    </div>
    <div class="mt-8 flex justify-center items-center sm:p-0">
        <div
            class="grid grid-cols-1 gap-3 md:grid-cols-2  lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 [&>img:not(:first-child)]:mt-3 lg:[&>img:not(:first-child)]:mt-8   ">

@foreach($clientSayDetail as $clientSayDetails)
            <div class=" md:w-[350px] h-[250px] p-4 lg:p-2">
                <iframe class="w-full h-full" src="{{ $clientSayDetails->image }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            </div>
            @endforeach


        </div>
    </div>


</section>
<!--what are out client say end-->
<!-- gallery section start-->

<section class="container mx-auto mt-10 ">
    <p class="text-center text-[var(--color-primary)] text-2xl font-bold uppercase">Gallery</p>
    <div class="flex items-center mt-2">
        <hr class="flex-grow  border-gray-300">
        <span class="px-2 text-[var(--color-primary)] text-3xl"><i class="fa-solid fa-helicopter"></i></span>
        <hr class="flex-grow  border-gray-300">
    </div>
    <div class="mt-8 flex justify-center items-center sm:p-0">
        <div
            class="grid grid-cols-1 gap-3 md:grid-cols-2  lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 [&>img:not(:first-child)]:mt-3 lg:[&>img:not(:first-child)]:mt-8   ">

@foreach($galleryList as $galleryLists)

            <div class=" md:w-[350px] p-4 lg:p-2">
                <img class="w-full h-[200px] object-cover" src="{{ asset('/') }}{{ $galleryLists->image }}" alt="">
            </div>
@endforeach


        </div>
    </div>
</section>
<!-- gallery section end -->
<!--VIDEO REVIEWS start-->
<section class="container mx-auto mt-16">
    <p class="text-center text-[var(--color-primary)] text-2xl font-bold ">VIDEO REVIEWS</p>
    <div class="flex items-center mt-2">
        <hr class="flex-grow  border-gray-300">
        <span class="px-2 text-[var(--color-primary)] text-3xl"><i class="fa-solid fa-helicopter"></i></span>
        <hr class="flex-grow  border-gray-300">
    </div>
    <div
        class="grid grid-cols-1 xl:grid-cols-2 gap-4 mt-4 px-2 sm:px-8  ml-0 lg:ml-36 xl:ml-0 lg:px-0 place-items-center">



@foreach($videoreviewList as $videoreviewLists)
        <div class="  w-full h-[400px]">

            <iframe class="w-full h-full" src="{{ $videoreviewLists->image }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>

        </div>
        @endforeach



    </div>

</section>
@endsection
