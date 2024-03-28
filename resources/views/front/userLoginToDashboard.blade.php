@extends('front.master')

@section('title')
User Registration  | {{ $ins_name }}
@endsection


@section('body')
<main>

    <section class="container mx-auto mt-4">
        <p class="text-center text-[var(--color-primary)] text-2xl font-bold ">Register/Login</p>
        <div class="flex items-center mt-2">
            <hr class="flex-grow  border-gray-300">
            <span class="px-2 text-[var(--color-primary)] text-3xl"><i class="fa-solid fa-helicopter"></i></span>
            <hr class="flex-grow  border-gray-300">
        </div>
        <div
            class="grid grid-cols-1 xl:grid-cols-2 gap-4 mt-4 px-2 sm:px-8  ml-0 lg:ml-36 xl:ml-0 lg:px-0 place-items-center">



            <div class="  w-full h-[400px]">

                <div  class=" card md:w-[600px]  bg-base-100 shadow-md hover:shadow-xl xl:transition xl:duration-300 xl:transform xl:hover:scale-110">

                <div class="card-body">

                    <form class="w-full max-w-lg"  enctype="multipart/form-data"  id="form" method="post" action="{{route('registrationUser')}}">
                        @csrf
                                            <input value="offer" name="order_type" type="hidden" >



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
                                                    Email
                                                  </label>
                                                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" required name="email" type="email" placeholder="Email">

                                              </div>

                                              <div class="w-full px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                    Nid Front Image
                                                  </label>
                                                  <input accept="image/*" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" required name="nid_front" type="file" placeholder="Nid Front Image">

                                              </div>

                                              <div class="w-full px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                    Nid Back Image
                                                  </label>
                                                  <input accept="image/*" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" required name="nid_back" type="file" placeholder="Nid Back Image">

                                              </div>
                                            </div>


                                            <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full md:w-1/2 px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                  Password
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" required name="password" type="password" placeholder="Password">
                                              </div>

                                              <div class="w-full md:w-1/2 px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                  Confirm Password
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" required name="password_confirmation" type="password" placeholder="Confirm Password">
                                              </div>
                                            </div>


                                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
                                          </form>

                </div>
            </div>

            </div>
            <div class="  w-full h-[400px]">

                <div  class=" card md:w-[600px]  bg-base-100 shadow-md hover:shadow-xl xl:transition xl:duration-300 xl:transform xl:hover:scale-110">

                <div class="card-body">

                    <form class="w-full max-w-lg" id="form" method="post" action="{{route('loginUser')}}">
                        @csrf
                                            <input value="offer" name="order_type" type="hidden" >

                                            <div class="flex flex-wrap -mx-3 mb-6">
                                              <div class="w-full px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                    Email
                                                  </label>
                                                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" required name="email" type="email" placeholder="Email">

                                              </div>

                                            </div>

                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                <div class="w-full px-3">
                                                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                      Password
                                                    </label>
                                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" required name="password" type="password" placeholder="Password">

                                                </div>

                                              </div>
                                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
                                          </form>

                </div>
            </div>

            </div>




        </div>

    </section>
</main>

<br><br><br><br><br><br><br><br>
@endsection
