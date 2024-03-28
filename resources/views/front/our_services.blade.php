@extends('front.master')

@section('title')
Confirm Order | {{ $ins_name }}
@endsection


@section('body')
<main>

    <section class="container mx-auto mt-4">
        <p class="text-center text-[var(--color-primary)] text-2xl font-bold ">Confirm Order</p>
        <div class="flex items-center mt-2">
            <hr class="flex-grow  border-gray-300">
            <span class="px-2 text-[var(--color-primary)] text-3xl"><i class="fa-solid fa-helicopter"></i></span>
            <hr class="flex-grow  border-gray-300">
        </div>
        <div
            class="grid grid-cols-1 xl:grid-cols-2 gap-4 mt-4 px-2 sm:px-8  ml-0 lg:ml-36 xl:ml-0 lg:px-0 place-items-center">



            <div class="  w-full h-[400px]">

                <form class="w-full max-w-lg" id="form" method="post" action="{{route('final_confirm')}}">
@csrf
                    <input value="offer" name="order_type" type="hidden" >
                    <input value="{{$allOffers->price}}"  name="price" type="hidden" >

                    <input value="{{$allOffers->id}}"  name="id" type="hidden" >


                    <div class="flex flex-wrap -mx-3 mb-6">

                      <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Full Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" required name="name" type="text" placeholder="Full Name">
                      </div>

                      <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Phone Number
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" required name="phone" type="text" placeholder="Phone Number">
                      </div>



                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Address
                          </label>
                          <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" required name="address"  placeholder="Address"></textarea>

                      </div>


                      <div class="w-full px-3 mt-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Payment Type
                          </label>
                          <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" required name="payment_type"  placeholder="Address">
<option value="">--Please Select --</option>
<option value="Cash">Cash</option>
<option value="Online Payment">Online Payment</option>
                          </select>

                      </div>


                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                  </form>

             </div>
            <div class="  w-full h-[400px]">

                <div
                class=" card md:w-[350px]  bg-base-100 shadow-md hover:shadow-xl xl:transition xl:duration-300 xl:transform xl:hover:scale-110">
                
                <div class="card-body">

                    <p class="mt-2"><span class="text-md font-bold text-[var(--color-primary)]">DEPARTURE </span>: {{$allOffers->departure}}</p>
                    <p class=""><span class="text-md font-bold text-[var(--color-primary)]">LANDING </span>: {{$allOffers->landing}}</p>
                    <p class=""><span class="text-md font-bold text-[var(--color-primary)]">FLY DATE </span>:  {{ date('d F, Y', strtotime($allOffers->fly_date)) }}</p>

                    <p class=""><span class="text-md font-bold text-[var(--color-primary)]">OFFER END </span>:  {{ date('d F, Y', strtotime($allOffers->end_date)) }}
                    </p>
                    <p class="text-xl font-bold "><span class="text-md font-bold text-[var(--color-primary)]">OFFER RATE </span>:
                        {{$allOffers->price}}</p>
               
                </div>
            </div>

            </div>




        </div>

    </section>
</main>
@endsection
