                <div class="header-top">
                    <div class="header-left">
                        @php
                            $general = \App\General::findOrFail(1);
                        @endphp
                        <a href="tel:#">Call Us: +{{ $general->phone }}</a>
                       <!-- <div class="header-dropdown">
                            <a href="#">Usd</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">Eur</a></li>
                                    <li><a href="#">Usd</a></li>
                                </ul>
                            </div>
                        </div> --><!-- End .header-dropdown -->

                      <!--  <div class="header-dropdown">
                            <a href="#">Eng</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </div>
                        </div> --><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                  <!--  <li><a href="about.html">About Us</a></li> -->
                                    <li><a href="{{ route('contact_us.index') }}"><i class="icon-map-marker"></i>Contact Us</a></li>
                                    <li> | </li>
                                    <li>
                                        @if (Route::has('login'))
                                        @auth
                                        <a href="{{ route('home') }}"><i class="icon-home"></i>Dashboard</a>    
                                        @else
                                        <a href="{{ route('login') }}"><i class="icon-user"></i>Login / Register</a>
                                        @endauth
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .header-top -->