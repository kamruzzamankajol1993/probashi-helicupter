<header class="container mx-auto rounded  bg-white h-[76px] sm:mb-[10px]   md:mb-0">

    <div class="flex p-2">
        <div class="w-4/12">
            <img class="h-[50px]" src="{{ asset('/') }}{{ $logo }}" alt="">
        </div>
        <div class="w-4/12 flex justify-center invisible md:visible" style="align-items: center;">
            <b class="uppercase text-[var(--color-primary)] text-xl font-bold">{{ $ins_name }}</b>
        </div>
        <div class="w-4/12 flex justify-end">


            <div class="flex mr-2 pr-2 invisible xl:visible" style="border-right: 1px solid;">
                <!-- <div class="flex justify-center mb-[65px] md:mb-0" style="align-items: center; ">
              <ion-icon class=" lg:text-2xl md:text-sm " name="mail-outline"></ion-icon>
           </div> -->


                <div class="invisible xl:visible">
                    <p class="text-md font-semibold mb-[-6px] text-right text-[var(--color-primary)]">EMAIL</p>
                    <p class="text-right">{{ $sysInfo->Email }}</p>
                </div>
            </div>
            <div class="flex ">
                <!-- <div class="flex justify-center mb-[65px] md:mb-0" style="align-items: center;">
              <ion-icon class=" lg:text-2xl md:text-sm " name="call-outline"></ion-icon>
           </div> -->

                <div>
                    <p class="text-md font-semibold mb-[-6px] text-right text-[var(--color-primary)]">MOBILE</p>
                    <p class="text-right"> {{ $sysInfo->Phone }}</p>
                </div>
            </div>

        </div>

    </div>
</header>

<section class="container mx-auto rounded sticky top-0 z-40 lg:z-50  bg-[var(--color-primary)] ">
    <div
        class="container mx-auto    flex items-center bg-[var(--color-primary)] rounded-md  justify-between text-black xl:text-white">
        <span class="text-4xl mt-1 ml-2 cursor-pointer text-white  xl:hidden">
            <ion-icon name="menu" onclick="Menu(this)"></ion-icon>

        </span>
        <ul class=" uppercase xl:flex xl:items-center z-[-1] xl:z-auto xl:static absolute bg-white xl:bg-[var(--color-primary)] md:w-[450px] border-1 letf-0 xl:w-auto xl:py-0 my-4 xl:pl-0 pl-7 xl:opacity-100 opacity-0 top-[-300px] trasition-all easein doration-500 m-[5px]"
            style="margin: 0px;padding: 5px;">

            <li class="mr-2 md:my-0 font-bold "><a
                class="text-md  decoration-500 xl:hover:bg-[var(--color-primary)]  p-2 " href="{{route('index')}}">Home</a>


        </li>
            <li class="mr-2 md:my-0 relative group ">
                <a class="dropdown_item text-md decoration-500 flex font-bold xl:hover:bg-[var(--color-primary)] items-center  p-2"
                    href="services.html">
                    <div class="flex gap-1">
                        <p class="whitespace-nowrap uppercase">Services</p>
                    </div> <ion-icon class="dropdown_arrow " name="chevron-up-outline"></ion-icon>
                </a>

                <div style="z-index: 99;"
                    class="xl:absolute bg-white  text-slate-500 text-lg  w-56 drop-shadow-md ml-8 ">
                    <ul class="space-y-2 xl:w-56 group-hover:block submenu p-2 ">
                        <li><a class="text-[15px]" href="{{ route('service') }}" >service</a>
                            <hr>
                        </li>
                        <li><a class="text-[15px]" href="{{ route('offer') }}" >offer</a>
                            <hr>
                        </li>
                        <li><a class="text-[15px]" href="{{ route('top_city') }}" >top city</a>
                            <hr>
                        </li>
                    </ul>

                </div>
            </li>
            <li class="mr-2 md:my-0"><a
                    class="text-md decoration-500 font-bold xl:hover:bg-[var(--color-primary)]  p-2"
                    href="{{ route('about_us') }}">About us</a></li>


            <li class="mr-2 md:my-0 relative group"><a
                    class=" dropdown_item text-md  decoration-500 flex font-bold xl:hover:bg-[var(--color-primary)]  p-2"
                    href="{{ route('contact') }}">
                    <div class="flex gap-1">
                        <p class="whitespace-nowrap ">Contact
                    </div>
                </a>

            </li>
            <li class="mr-2 md:my-0 relative group"><a
                class=" dropdown_item text-md  decoration-500 flex font-bold xl:hover:bg-[var(--color-primary)]  p-2"
                href="{{ route('news') }}">
                <div class="flex gap-1">
                    <p class="whitespace-nowrap ">News & media
                </div>
            </a>

        </li>
            <li class="mr-2 md:my-0 relative group"><a
                    class=" dropdown_item text-md  decoration-500 flex font-bold  xl:hover:bg-[var(--color-primary)]  p-2"
                    href="{{ route('offer') }}">
                    <div class="flex gap-1">
                        <button class="p-2 rounded-lg text-center bg-[var(--color-primary)] text-white xl:bg-white uppercase  xl:text-[var(--color-primary)]">
                            <p>Offer</p>
                        </button>
                    </div>
                </a>
            </li>


        </ul>
        </nav>
    </div>
     <marquee class="bg-[#fff] text-[var(--color-primary)] text-sm ">Probashi Helicopter Service Bangladesh. Do you
        want
        to be a agent of probashi air. Please communicate with us. Mobile: {{ $sysInfo->Phone }}, Email: {{ $sysInfo->Email }}
    </marquee>
</section>
