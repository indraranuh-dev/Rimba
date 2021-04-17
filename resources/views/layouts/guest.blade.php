<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')
    <link rel="shortcut icon" href="{{asset('img/icofont.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>

<body>


    <header class="navigation fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand font-tertiary h3" href="{{route('index')}}">
                <img height="50" src="{{asset('img/logo.png')}}" alt="Logo" />
            </a>
            <button class="navbar-toggler" style="background-color: #41228e;" type="button" data-toggle="collapse"
                data-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('aboutUs')}}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product')}}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('articles')}}">Tips & Tricks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contactUs')}}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contactUs')}}">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    @yield('content')

    <x-footer />

    <ul class="float-social">
        <li class="mb-3">
            <a target="_blank" class="text-white" href="https://m.facebook.com/Maya-Springbed-104916394700733/"
                title="Facebook" data-placement="right">
                <i class="ti-facebook"></i>
            </a>
        </li>
        <li class="mb-3">
            <a target="_blank" class="text-white" href="https://www.instagram.com/maya.springbed/" title="Instagram"
                data-placement="right">
                <i class="ti-instagram"></i>
            </a>
        </li>
        <li class="mb-3">
            <a target="_blank" class="text-white" href="https://www.tokopedia.com/mayaspringbed" title="Tokopedia"
                data-placement="right">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    focusable="false" width="16px" height="16px"
                    style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20">
                    <path
                        d="M6.123 7.25L6.914 2H2.8L1.081 6.5C1.028 6.66 1 6.826 1 7c0 1.104 1.15 2 2.571 2c1.31 0 2.393-.764 2.552-1.75zM10 9c1.42 0 2.571-.896 2.571-2c0-.041-.003-.082-.005-.121L12.057 2H7.943l-.51 4.875c-.002.041-.004.082-.004.125c0 1.104 1.151 2 2.571 2zm5 1.046V14H5v-3.948c-.438.158-.92.248-1.429.248c-.195 0-.384-.023-.571-.049V16.6c0 .77.629 1.4 1.398 1.4H15.6c.77 0 1.4-.631 1.4-1.4v-6.348a4.297 4.297 0 0 1-.571.049A4.155 4.155 0 0 1 15 10.046zM18.92 6.5L17.199 2h-4.113l.79 5.242C14.03 8.232 15.113 9 16.429 9C17.849 9 19 8.104 19 7c0-.174-.028-.34-.08-.5z"
                        fill="#ffffff" />
                </svg>
            </a>
        </li>
        <li>
            <a target="_blank" class="text-white" href="https://shopee.co.id/shop/311781282/" title="Shopee"
                data-placement="right">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    focusable="false" width="16px" height="16px"
                    style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <path
                        d="M5 22h14a2 2 0 0 0 2-2V9a1 1 0 0 0-1-1h-3v-.777c0-2.609-1.903-4.945-4.5-5.198A5.005 5.005 0 0 0 7 7v1H4a1 1 0 0 0-1 1v11a2 2 0 0 0 2 2zm12-12v2h-2v-2h2zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v1H9V7zm-2 3h2v2H7v-2z"
                        fill="#ffffff" />
                </svg>
            </a>
        </li>
    </ul>

    <div class="float-button">
        <a href="https://api.whatsapp.com/send?phone=+6285876771888&text=Saya ingin bertanya seputar produk maya"
            target="_blank" class="btn btn-wa btn-primary">
            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp"
                class="svg-inline--fa fa-whatsapp fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512">
                <path fill="currentColor"
                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                </path>
            </svg>
        </a>
    </div>

    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    <script>
    $('[title]').tooltip()
    </script>
    @stack('scripts')
</body>

</html>