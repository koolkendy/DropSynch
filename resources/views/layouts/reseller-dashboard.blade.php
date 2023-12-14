<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- CSS files -->
        <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet"/>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link rel="stylesheet" href="https://fontawesome.com/v4.7.0/assets/font-awesome/css/font-awesome.css">

        {{--- Page Styles ---}}
        @stack('page-styles')
        @livewireStyles
    </head>


<style>
.icon-control {
    margin-top: 5px;
    float: right;
    font-size: 80%;
}

.btn-light {
    background-color: #fff;
    border-color: #e4e4e4;
}

.list-menu {
    list-style: none;
    margin: 0;
    padding-left: 0;
}
.list-menu a {
    color: #343a40;
}

.card-product-grid .info-wrap {
    overflow: hidden;
    padding: 18px 20px;
}

[class*='card-product'] a.title {
    color: #212529;
    display: block;
}

.card-product-grid:hover .btn-overlay {
    opacity: 1;
}
.card-product-grid .btn-overlay {
    -webkit-transition: .5s;
    transition: .5s;
    opacity: 0;
    left: 0;
    bottom: 0;
    color: #fff;
    width: 100%;
    padding: 5px 0;
    text-align: center;
    position: absolute;
    background: rgba(0, 0, 0, 0.5);
}
.img-wrap {
    overflow: hidden;
    position: relative;
}
</style>

    <body>

        <header class="navbar navbar-expand-md d-print-none" >
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{ Auth::user()->email === 'admin@admin.com' ? url('/') : url('/reseller/dashboard') }}">
                        <img src="{{ asset('static/logo.png') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                        <span style="position:relative; top: 3px;">Dropshipping System</span>
                    </a>
                </h1>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm shadow-none"
                                style="background-image: url({{ Avatar::create(Auth::user()->name)->toBase64() }})">
                        </span>

                        <div class="d-none d-xl-block ps-2">
                            <div>{{ Auth::user()->name }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu">

                        <a href="{{ route('reseller.showCart') }}" class="dropdown-item">
                            <img width="24" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEXElEQVR4nO2cW4hWVRiGHxU1wQsPUTiNF6YoGFQmCeb5whLHzPAqjTEwvAjUlFQyk2oulDyAYomnCxPMAyl4GJEYJM1D4pWliKIXohOKWv521mbiw/en3T/OMO4c17fG9cCC+ffes/53vbPWt457IJFIJBKJRCKRaEg5sB0oAPXAn8Al4BtgAdAnmda0eddlXGPpDrAFeCoZ2ZDtMmm3DLK0R9dOAeuA3/T5GjA2mfhfis02W7t66tpP+twD2JFp3q8lE//lpowpv4eBP5cYVaXrvwL9kol3+Uqm7JGJlvbqmjXvUtbr3tEGdx5R+iq2lXYc1xvpfTurh7ZnXgmg1yUW/7aqOd9UzWtq6DJLBu58iBpbFU8CdTK7fWgxsXJatfCF0EJiZYsMnBJaSKx8IAOXhhYSK+Nl4P7QQmKlV2aefBE4AVQDXwDLgfnAVM1ahmjg3TW0aE+0ycxi7jfd0Dz7W83BzfTFwEygEngVGAiUtfZe/ogMeRN4UQsNZsBsYBGwAdil587mNNyGS1fV6x/UnHy1ppUzgEnAaOA5jWc7EhFrVEgryP1gTfkZYKhq2zTgI2CFauNuhYRa4HYO03/X71ot/1p5rtB3TNN3DpUGq+XBmC7Ba1vwO9oCTwD9geHAROAdYCGwEtgM1AAnZdpfOQy35bqnCcBIpwsLXTTHf0mjhanq1JarNlZnarjp/zGU0G4S8ItqSmy8Lf3bQoq4LBFBmsD/ZKO0WygKxj6JmNCMZw8DhwJcb4wL0v48AflUIj5sxrOHNBR52NfvRXlm1b0dAamUEFtPjIlJmZX4oAyQEBvoxsRq6Z4XWshjGuze1s+xxMAfZKDN090srg6IJAZ21xTRBtAdcMBWGWjxMAYmSO8BnLBAgpYQB8uk92Oc/UX3RRIDj0uvreK4oLcE2X6x9xjYOdPp2c9uFlcLMtECtGdGS+d3OOOYhI3AN5943Qxb14yJuYcYeEA63Z0wmylhtkrtNQZ21NivzmOoGSUDbf/DK0Ok8Xsc8rjEFdSpeOR9afwcp9RKoO0Ze4yBxXOPb+CU/RJo+xDeYmAXbT3UeT4sv1QG2rkZb8yNIEbzlkR+iS9e1uF40zYOxwyUSFtrC41N0wZpWFXcnP8M53TSYaN6Z+mOzt5EsfV6xoFh9Wqy53Vq4lkifPNpcmghsbJQBlqTSeTgdRlog9ZEDvrIQDu1mshBW434zcR0pDcnx2XgsFQF87FBBtpByEQO3m3G4mqiCQbLwNrQJ59ipR1wTibaJk4iB2OAv7X+tkkLDVG9guCBSr1yUO8sRUVvYJVetKlzYF50BhYZJvF/AO/pP4FYmqNrecaNw1sgT7dUq0BW0MaW2/fmPOD+IPN0yxUVyGpI6Q5ame5dcZCnWwolhc3uoBULW3CQp1tqVCCLT6XM070aB3m6pSIT8OeqhpSpoMUdswoHebqmqomhRZWjPF1ToWZ1S6nmAdSSlsgzkUgkEolEglbAP5lTX8ghkRRPAAAAAElFTkSuQmCC">
                            Cart
                        </a>

                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            </svg>
                            Account
                        </a>

                        

                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </header>


        <div class="container-xl" style="margin-top: 2em;">
            <div class="row">
                    @yield('content')
            </div>
        </div>


        <!-- Libs JS -->
        @stack('page-libraries')
        <!-- Tabler Core -->
        <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
        <script src="{{ asset('dist/js/demo.min.js') }}" defer></script>
        {{--- Page Scripts ---}}
        @stack('page-scripts')

        @livewireScripts
    </body>
</html>