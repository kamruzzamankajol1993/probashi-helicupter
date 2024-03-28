@extends('front.master')

@section('title')
News & Media | {{ $ins_name }}
@endsection


@section('body')
<main>

    <section id="news&media" class="container mx-auto mt-16">
        <p class="text-center text-[var(--color-primary)] text-2xl font-bold ">NEWS & MEDIA</p>
        <div class="flex items-center mt-2">
            <hr class="flex-grow  border-gray-300">
            <span class="px-2 text-[var(--color-primary)] text-3xl"><i class="fa-solid fa-helicopter"></i></span>
            <hr class="flex-grow  border-gray-300">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3  gap-4 mt-8 place-items-center p-2">

@foreach($allNewsList as $allNewsLists)
            <div class="card  md:w-72 lg:w-96 bg-base-100 shadow-lg hover:shadow-2xl border-8">
                <div class="card-body">
                    <h2 class="card-title">{{ date('d F, Y', strtotime($allNewsLists->created_at)) }}</h2>
                    <a target="_blank" href="{{ $allNewsLists->des }}">
                        <p>{{ $allNewsLists->title }}</p>
                    </a>
                </div>
                <figure class="w-full h-[100px]"><a target="_blank"   href="{{ $allNewsLists->des }}"><img
                      class="p-4 w-full h-full" src="{{ asset('/') }}{{ $allNewsLists->image }}" /></a></figure>
            </div>
            @endforeach

        </div>
    </section>

</main>
@endsection
