            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="widget widget-about">
                                <img src="{{ URL::asset('assets/images/logos/Logo_new.png') }}" class="footer-logo" alt="CustomBoxesExpert Logo">
                                <p>We deal in pre-assembled boxes, custom printed boxes and custom packaging wholesale. </p>
                                @php
                                    $general = \App\General::findOrFail(1);
                                @endphp
                                <div class="social-icons">
                                    <a href="{{ isset($general->facebook) ? 'https://' . $general->facebook : '#' }}" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="{{ isset($general->twitter) ? 'https://' . $general->twitter : '#' }}" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="{{ isset($general->instagram) ? 'https://' . $general->instagram : '#' }}" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="{{ isset($general->youtube) ? 'https://' . $general->youtube : '#' }}" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                    <a href="{{ isset($general->pinterest) ? 'https://' . $general->pinterest : '#' }}" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-12 col-lg-3 -->

                        <div class="col-lg-3 col-sm-4 col-md-4">
                            <div class="widget">
                                <h4 class="widget-title">useful links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="{{ route('about.index') }}">About Us</a></li>
                                    <li><a href="{{ route('login') }}">Sign Up</a></li>
                                    <li><a href="{{ route('terms_of_use.index') }}">Terms of Use</a></li>
                                    <li><a href="{{ route('contact_us.index') }}">Contact us</a></li>
                                    <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                                    <li><a href="{{ route('privacy_policy.index') }}">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-3 -->

                        <div class="col-lg-3 col-sm-4 col-md-4">
                            <div class="widget">
                                <h4 class="widget-title">Box by Industry</h4><!-- End .widget-title -->
                                @php
                                    $industries = \App\Category::where('main_category', 1)
                                                         ->inRandomOrder()
                                                         ->limit(6)
                                                         ->get();
                                @endphp
                                <ul class="widget-list">
                                    @foreach($industries as $industry)
                                    <li><a href="{{ route('industry-boxes.category.index', $industry->slug) }}">{{ $industry->title }}</a></li>
                                    @endforeach
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-3 -->

                        <div class="col-lg-3 col-sm-4 col-md-4">
                            <div class="widget">
                                <h4 class="widget-title">Box by Style</h4><!-- End .widget-title -->
                                @php
                                    $styles = \App\Category::where('main_category', 2)
                                                         ->inRandomOrder()
                                                         ->limit(6)
                                                         ->get();
                                @endphp
                                <ul class="widget-list">
                                    @foreach($styles as $style)
                                    <li><a href="{{ route('style-boxes.category.index', $style->slug) }}">{{ $style->title }}</a></li>
                                    @endforeach
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-64 col-lg-3 -->
                    </div>
                </div>
            </div>