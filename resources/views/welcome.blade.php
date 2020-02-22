<!DOCTYPE html>
<html lang="en">

@include('front.partials._head')

<body>
    <div class="page-wrapper">
        <div style="{{ request()->path() == '/' ? 'border-bottom: 0.1rem solid rgba(235,235,235,0.2);' : '' }}">  
            <header class="header">

                @include('front.partials._header-top-others') 

                @include('front.partials._header-middle-others')


            </header>

        </div>                

        @yield('content')

        <footer class="footer bg-light">

        {{--    @if( request()->path() == '/')
                @include('front.partials._footer-top')
            @endif  

            @if( request()->path() == '/')  
                @include('front.partials._footer-middle')
            @else   
                @include('front.partials._footer-middle-others')
            @endif  --}}

            @include('front.partials._footer-middle-new')
            
            @include('front.partials._footer-bottom')

        </footer>
    </div>
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    @include('front.partials._mobile_menu')

   {{-- @include('front.partials._pop-up') --}}

    @include('front.partials._script')

</body>
</html>