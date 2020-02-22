                <div class="header-top" id="header-top-others">
                    <div class="header-left">
                        @php
                            $general = \App\General::findOrFail(1);
                        @endphp
                        <ul class="top-menu">
                            <li>
                                <a href="#">Contact Details</a>
                                <ul class="sub-top-menu">
                                    <li><a href="tel:#">Call: <span>{{ strtolower($general->phone) }}</span></a></li>
                                    <li>
                                        <a href="javascript:;">Email: <span>{{ strtolower($general->email) }}</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
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
                                <ul class="sub-top-menu">
                                 <!--   <li><a href="{{ route('contact_us.index') }}"><i class="icon-map-marker"></i>Contact Us</a></li> -->
                                    <li style="font-weight: 500;">
                                        @if (Route::has('login'))
                                        @auth
                                        <a href="{{ route('home') }}">Dashboard</a>    
                                        @else
                                        <a href="{{ route('login') }}">Login / Register</a>
                                        @endauth
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .header-top -->