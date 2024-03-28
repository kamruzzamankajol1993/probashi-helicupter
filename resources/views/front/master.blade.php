<!DOCTYPE html>
<html data-theme="light" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ $ins_name }}" name="description" />
    <meta content="{{ $ins_name }}" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}{{ $icon }}">
    <title> @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(function () {
            $("#header-content").load('/siteHeader');
            $("#footer").load("/siteFooter");
        });
    </script>
    <style>
        .submenu {
            display: none;
        }

        :root {
            /* --color-primary: #8d328f; */
            --color-primary: #1675e1;
            --color-primary-light: #d96cdb;
            --secondary-color: #0a5c83;
        }

        /* Show the submenu when hovering over the parent element */
        .group:hover .submenu {
            display: block;
        }

        @keyframes carousel {
            100% {
                transform: translateX(-250);
            }
        }

        .scroll-container {
            width: 100%;
            overflow: hidden;
        }


        .scroll-text {
            white-space: nowrap;
            animation: scroll 10s linear infinite;
        }


        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }

            60% {
                transform: translateX(30%);
            }
        }

        .dropdown_item:hover .dropdown_arrow {
            transform: rotate(180deg);
        }
    </style>
</head>

<body>

    @include('front.include.top_header')

        @yield('body')


        @include('front.include.footer')
    <script>
        function Menu(e) {
            let list = document.querySelector('ul');
            e.name === 'menu' ? (e.name = "close", list.classList.add('top-[80px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[80px]'), list.classList.remove('opacity-100'))
        }

    </script>
</body>

</html>
