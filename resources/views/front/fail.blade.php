@extends('front.master')

@section('title')
Fail | {{ $ins_name }}
@endsection


@section('body')
<main>

    <section class="container mx-auto">
        <p class="text-center text-[var(--color-primary)] text-3xl font-bold uppercase  ">Failed</p>
        <div class="flex items-center mt-2">
            <hr class="flex-grow  border-gray-300">
            <span class="px-2 text-[var(--color-primary)] text-3xl"><i class="fa-solid fa-helicopter"></i></span>
            <hr class="flex-grow  border-gray-300">
        </div>
        
    </section>

</main>
@endsection