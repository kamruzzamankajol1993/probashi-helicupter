@extends('front.master')

@section('title')
Service | {{ $ins_name }}
@endsection


@section('body')
<main>


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
                <a href="service1.html"><figure><img class="transition duration-300 transform hover:scale-110 p-8"
                    src="{{ asset('/') }}{{ $missionListsView->image }}" /></figure></a>
                <p class="mb-4 px-8 cursor-pointer text-md hover:text-[var(--color-primary)] font-bold uppercase"><a
                        href="{{ route('service_detail',$missionListsView->slug) }}">{{ $missionListsView->title }}</a></p>
            </div>
            @endforeach


        </div>
    </section>



</main>
@endsection
