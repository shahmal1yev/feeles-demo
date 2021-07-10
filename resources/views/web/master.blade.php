<!DOCTYPE html>
<html lang='{{ app()->getLocale() }}'>
    <head>
        <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name='theme-color' content='#152233' />
		
        <title>
            {{ env('APP_NAME') }}: @yield('title') 
        </title>

        <!-- FONTAWESOME 5.15.3 -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

        <!-- SWIPER 6.4.15 -->
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

		<link rel='stylesheet' type='text/css' href='/assets/css/style.css' />

        @yield('cdnCss')

    </head>
    <body>

        <div class='container-xxl bg-white shadow-sm p-0'>

            @yield('content')
            
        </div>

        <div class='fl-menu-shadow'></div>

		<div id='pageTools'>
			<div id='pageUp' class='circle-btn arrow-up-icon'></div>
			<div id='filterStopper' class='d-none circle-btn unlock-icon'></div>
		</div>

        <!-- JQUERY 3.6.0 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

        <!-- BOOTSTRAP 5.0.1 -->
		<script type='text/javascript' src='/assets/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js'></script>

        <!-- AOS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!-- AXIOS 0.21.1 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>

        <!--Start of Tawk.to Script-->
		<script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/60ca773665b7290ac6365a4a/1f8be3bue';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->

        @yield('cdnJavascript')

        <script type='module' src='/assets/js/script.js'></script>
    </body>
</html>