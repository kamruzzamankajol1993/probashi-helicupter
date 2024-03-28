@extends('front.master')

@section('title')
Top City | {{ $ins_name }}
@endsection


@section('body')
<main>

    <section id="city" class="container mx-auto mt-16">

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
            <div class="card  lg:w-[450px] border bg-base-100 shadow-lg hover:shadow-2xl ">
                <figure><img class=" transition duration-300 transform hover:scale-110 p-8"
                        src="{{ asset('/') }}public/front/our cities/2.webp" /></figure>
                <p
                    class=" mb-10 text-center cursor-pointer text-white ml-12text-md p-2 font-bold bg-[var(--color-primary)]">
                    <a href="">নারায়ণগঞ্জ</a>
                </p>
            </div>
            <div class="card  lg:w-[450px] border bg-base-100 shadow-lg hover:shadow-2xl ">
                <figure><img class="transition duration-300 transform hover:scale-110 p-8"
                        src="{{ asset('/') }}public/front/our cities/3.jpg" /></figure>
                <p
                    class="mb-10 text-center cursor-pointer text-white ml-12text-md p-2 font-bold bg-[var(--color-primary)]">
                    <a href="">ব্রাহ্মণবাড়িয়া</a>
                </p>
            </div>
        </div>
    </section>

</main>
@endsection
