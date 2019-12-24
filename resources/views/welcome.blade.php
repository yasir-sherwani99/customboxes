<!DOCTYPE html>
<html lang="en">

@include('front.partials._head')

<body>
    <div class="page-wrapper">
        <div class="background" style="background-color: #00003f;">
            <header class="header">

            @if( request()->path() == '/')
                
                @include('front.partials._header-top')

            @else

                @include('front.partials._header-top-others')

            @endif

            @if( request()->path() == '/')

                @include('front.partials._header-middle')

            @else

                @include('front.partials._header-middle-others')

            @endif

            </header>

            @php
                $general = \App\General::findOrFail(1);
            @endphp
            <div class="background" style="background-image: url(assets/images/demos/demo-24/slider/{{ $general->banner_image }});">

            @if( request()->path() == '/')
                @include('front.partials._slider')
            @endif

            </div>  

        </div>                

        @yield('content')

        <footer class="footer mt-3">

            @if( request()->path() == '/')
                @include('front.partials._footer-top')
            @endif

            @if( request()->path() == '/')
                @include('front.partials._footer-middle')
            @else
                @include('front.partials._footer-middle-others')
            @endif
            
        </footer>
    </div>
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    @include('front.partials._mobile_menu')

   {{-- @include('front.partials._pop-up') --}}

    @include('front.partials._script')

</body>
</html>