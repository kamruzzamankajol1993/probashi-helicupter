@extends('front.master')

@section('title')
Offer | {{ $ins_name }}
@endsection


@section('body')
<main>

    <section id="offer" class="  container mx-auto mt-8">
        <p class="text-center text-[var(--color-primary)] text-2xl font-bold">OUR RUNNING OFFERS</p>
        <div class="grid grid-cols-1 md:grid-cols-2  xl:grid-cols-3 2xl:grid-cols-4 gap-8 p-8">


            @foreach($allOffers as $allOffersView)
            <div class=" card md:w-[350px]  bg-base-100 shadow-md hover:shadow-xl xl:transition xl:duration-300 xl:transform xl:hover:scale-110">
                <figure><img src="{{ asset('/') }}{{ $allOffersView->image }}" /></figure>
                <div class="card-body">

                    <p class="mt-2"><span class="text-md font-bold text-[var(--color-primary)]">DEPARTURE </span>: {{ $allOffersView->departure }}</p>
                    <p class=""><span class="text-md font-bold text-[var(--color-primary)]">LANDING </span>: {{ $allOffersView->landing }}</p>
                    <p class=""><span class="text-md font-bold text-[var(--color-primary)]">FLY DATE </span>: {{ date('d F, Y', strtotime($allOffersView->fly_date)) }}</p>

                    <p class=""><span class="text-md font-bold text-[var(--color-primary)]">OFFER END </span>: {{ date('d F, Y', strtotime($allOffersView->end_date)) }}
                    </p>
                    <p class="text-xl font-bold "><span class="text-md font-bold text-[var(--color-primary)]">OFFER RATE </span>:
                        {{ $allOffersView->price }}</p>
                        @if (Auth::guest())

                        <button class="uppercase text-center p-2 border-2  rounded-lg  text-white bg-[var(--color-primary)] uppercase hover:text-[var(--color-primary)] hover:bg-white font-bold text-lg border-[var(--color-primary)]"></i><a href="{{ route('userLoginForm',['type'=>'offer','name'=>$allOffersView->slug]) }}">Buy now</a></button>


                        @else
                <button
                    class="uppercase text-center p-2 border-2  rounded-lg  text-white bg-[var(--color-primary)] uppercase hover:text-[var(--color-primary)] hover:bg-white font-bold text-lg border-[var(--color-primary)]"><a
                        href="{{ route('confirm_offer_order',$allOffersView->slug) }}">Buy now</a> </button>
                        @endif
                </div>
            </div>
            @endforeach

        </div>
    </section>

</main>
@endsection
