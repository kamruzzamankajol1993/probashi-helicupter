@extends('front.master')

@section('title')
User Dashboard  | {{ $ins_name }}
@endsection


@section('body')
<main>

    <section class="container mx-auto mt-4">
        <p class="text-center text-[var(--color-primary)] text-2xl font-bold ">Dashboard</p>
        <div class="flex items-center mt-2">
            <hr class="flex-grow  border-gray-300">
            <span class="px-2 text-[var(--color-primary)] text-3xl"><i class="fa-solid fa-helicopter"></i></span>
            <hr class="flex-grow  border-gray-300">
        </div>


<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Service</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Offer</button>
        </li>

    </ul>
</div>
<div id="default-tab-content">
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">SL</th>
                <th scope="col" class="px-6 py-3">Order Number</th>
                <th scope="col" class="px-6 py-3">Client Info</th>
                <th scope="col" class="px-6 py-3">Service Detail</th>
                <th scope="col" class="px-6 py-3">Payment Detail</th>
                <th scope="col" class="px-6 py-3">Order Status</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($allPendingServices as $user)


            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->index+1 }}</th>
               <td class="px-6 py-4">{{$user->payment_id }}</td>
            <td class="px-6 py-4">

                {{ $user->name }},<br>
                {{ $user->phone }},<br>
                {{ $user->address }}


            </td>

            <td class="px-6 py-4">

                <?php

                $usersOrder = DB::table('missions')->where('id',$user->order_id)->first();

                                                    ?>

                                                    @if(!$usersOrder)


                                                    @else


                                                    <p class="mt-2"><span class="text-md font-bold text-[var(--color-primary)]">Service Name </span>: {{$usersOrder->title}}</p>


                                                    <p class="text-xl font-bold "><span class="text-md font-bold text-[var(--color-primary)]"> Price </span>:
                                                        {{$usersOrder->price}}</p>

                                                    @endif


            </td>

            <td class="px-6 py-4">

               Payment Type: {{ $user->payment_type }}, <br>


               Payment Status: {{ $user->status }}


            </td>

<td class="px-6 py-4">
@if(empty($user->confirm_status))
Pending

                @else
{{ $user->confirm_status }}
                @endif
</td>


            </tr>
@endforeach

        </tbody>
    </table>
</div>

    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">SL</th>
                <th scope="col" class="px-6 py-3">Order Number</th>
                <th scope="col" class="px-6 py-3">Client Info</th>
                <th scope="col" class="px-6 py-3">Offer Detail</th>
                <th scope="col" class="px-6 py-3">Payment Detail</th>
                <th scope="col" class="px-6 py-3">Order Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allPendingOffers as $user)


            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->index+1 }}</th>
               <td class="px-6 py-4">{{$user->payment_id }}</td>
            <td class="px-6 py-4">

                {{ $user->name }},<br>
                {{ $user->phone }},<br>
                {{ $user->address }}


            </td>

            <td class="px-6 py-4">

                <?php

$usersOrder = DB::table('whyjoinuses')->where('id',$user->order_id)->first();

                ?>

                @if(!$usersOrder)


                @else


                <p class="mt-2"><span class="text-md font-bold text-[var(--color-primary)]">DEPARTURE </span>: {{$usersOrder->departure}}</p>
                <p class=""><span class="text-md font-bold text-[var(--color-primary)]">LANDING </span>: {{$usersOrder->landing}}</p>

                <p class="text-xl font-bold "><span class="text-md font-bold text-[var(--color-primary)]">OFFER RATE </span>:
                    {{$usersOrder->price}}</p>

                @endif


            </td>

            <td class="px-6 py-4">

               Payment Type: {{ $user->payment_type }}, <br>


               Payment Status: {{ $user->status }}


            </td>

<td class="px-6 py-4">
@if(empty($user->confirm_status))
Pending

                @else
{{ $user->confirm_status }}
                @endif
</td>


            </tr>
@endforeach
        </tbody>
    </table>
</div>

    </div>

</div>
<br><br><br><br>
<button class="flex border-2 p-4 gap-4 rounded-full bg-[var(--color-primary)] text-white font-bold"><a href="{{ route('userLogout') }}">LogOut</a></button>
    </section>
</main>

<br><br><br><br><br><br><br><br>
@endsection
