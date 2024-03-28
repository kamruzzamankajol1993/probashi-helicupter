
<footer class="container mx-auto bg-[var(--color-primary)] mt-12">
    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-4 p-2 gap-6 text-white mt-10 relative">
        <div class="mt-4 ">
            <p class="font-bold text-xl uppercase">Contact us</p>
            <address>
                <div class="flex mt-4 gap-4">
                    <ion-icon class="mt-1 text-3xl" name="location-outline"></ion-icon> </p>
                    <p>{{ $sysInfo->Address }}
                    </p>
                </div>
                <div class="flex mt-4 mb-4 gap-4">
                    <ion-icon class="mt-1" name="call-outline"></ion-icon>
                    <a href="tel:{{ $sysInfo->Phone }}"> {{ $sysInfo->Phone }}</a>
                </div>
                <div class="flex mb-4 gap-4">
                    <ion-icon class="mt-1" name="mail-outline"></ion-icon>
                    <p> {{ $sysInfo->Email }} </p>
                </div>
            </address>
            <div class="gap-4">

                @foreach($socialLinkList as $socialLinkLists)

                @if($socialLinkLists->cat_id == 'facebook')
                <a href="{{ $socialLinkLists->name }}"><ion-icon class="w-8 h-6 bg-sky-700"
                    name="logo-facebook"></ion-icon></a>
                @elseif($socialLinkLists->cat_id == 'twitter')

                <a href="{{ $socialLinkLists->name }}"><ion-icon class="w-8 h-6 bg-sky-400"
                    name="logo-twitter"></ion-icon></a>
                @elseif($socialLinkLists->cat_id == 'instagram')
                <a href="{{ $socialLinkLists->name }}"><ion-icon class="w-8 h-6 bg-rose-500"
                    name="logo-instagram"></ion-icon></a>
                @else
                <a href="{{ $socialLinkLists->name }}"><ion-icon class="w-8 h-6 bg-red-600 "
                    name="logo-youtube"></ion-icon></a>
                @endif


                        @endforeach
            </div>
        </div>
        <div class="mt-4 ">
            <p class="font-bold text-xl uppercase">Company</p>
            <div class=" text-lg mt-4">
                <div class="">
                    <p class="mt-2"> <a href="{{ route('index') }}">Home</a></p>
                    <p class="mt-1"><a href=""><a href="{{ route('about_us') }}">About Us</a> </a></p>
                    <p class="mt-1"><a href="{{ route('contact') }}">Contact us </a></p>
                </div>
            </div>

        </div>
        <div class="mt-4 ">
            <p class="font-bold text-xl uppercase">Discover</p>
            <div class=" text-lg">
                <div>
                    <p class="mt-4"><a href="">Payment Method</a></p>
                    <p class="mt-1"> <a href="">Term & condition</a></p>
                    <p class="mt-1"> <a href="">Privacy Policy</a></p>
                    <p class="mt-1"> <a href="">Refund & Cancel Policy</a></p>
                </div>
            </div>

        </div>
        <div class="mt-4 relative">
            <div class="text-white  mt-2">
                <p class="font-bold text-xl uppercase">Service</p>
                <p class="mt-4">Helicopter</p>
                <p class="mt-1">Ambulance</p>
                <p class="mt-1">Plane</p>
                <p class="mt-1">ICU Ambulance</p>
            </div>
        </div>
    </div>

    <iframe class="aspect-video w-full"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.672890318832!2d90.4022900759674!3d23.865746684337203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c518e6e257e9%3A0x83fbb2e6edd0e180!2sProbashi%20Air!5e0!3m2!1sen!2sbd!4v1699591729627!5m2!1sen!2sbd"
        width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

    <div>
        <hr>
    </div>
    <div class="p-2">
        <p class="text-white ml-12 text-center">Copyright© 2024: All right reserved by {{ $ins_name }}
        </p>
    </div>
</footer>
