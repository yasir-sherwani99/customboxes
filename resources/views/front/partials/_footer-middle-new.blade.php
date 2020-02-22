			<div class="footer-middle">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-sm-12 col-lg-6">
	            			<div class="widget widget-about">
	            				<img src="{{ URL::asset('assets/images/logos/Logo-WS-2.png') }}" class="footer-logo" alt="PackagingXpert Logo">
	            				<div class="mb-3">
	            					We deal in pre-assembled boxes, custom printed boxes and custom packaging wholesale. We have an excellent quality of personalized Custom Boxes with digital and Off-Set printing services.
	            				</div> 
	            				<div class="widget-about-info">
	            					@php
					                    $general = \App\General::findOrFail(1);
					                @endphp	
	            					<div class="row">
	            						<div class="col-sm-7 col-md-7">
	            							<span class="widget-about-title" style="font-weight: 600;">Call Us:</span>
	            							<h5 style="color: #0A72E8;">
	            								<a href="tel:{{ $general->phone }}">{{ $general->phone }}</a>
	            							</h5>
	            						</div><!-- End .col-sm-6 -->
	            						<div class="col-sm-5 col-md-5">
	            							<span class="widget-about-title" style="font-weight: 600;">Follow Us:</span>
	            						<!--	<figure class="footer-payments">
							        			<img src="{{ URL::asset('assets/images/payments.png') }}" alt="Payment methods" width="272" height="20">
							        		</figure> --><!-- End .footer-payments -->
							        		<div class="social-icons social-icons-color mt-1">
						    					<a href="{{ isset($general->facebook) ? 'https://' . $general->facebook : '#' }}" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
						                        <a href="{{ isset($general->twitter) ? 'https://' . $general->twitter : '#' }}" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
						                        <a href="{{ isset($general->instagram) ? 'https://' . $general->instagram : '#' }}" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
						                        <a href="{{ isset($general->youtube) ? 'https://' . $general->youtube : '#' }}" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
						                        <a href="{{ isset($general->pinterest) ? 'https://' . $general->pinterest : '#' }}" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
						    				</div><!-- End .soial-icons -->
	            						</div><!-- End .col-sm-6 -->
	            					</div><!-- End .row -->
	            				</div><!-- End .widget-about-info -->
	            			</div><!-- End .widget about-widget -->
	            		</div><!-- End .col-sm-12 col-lg-3 -->

	            		<div class="col-sm-4 col-lg-2">
	            			<div class="widget">
	            				<h4 class="widget-title">Useful links</h4><!-- End .widget-title -->

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

	            		<div class="col-sm-4 col-lg-4">
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
	            		</div><!-- End .col-sm-64 col-lg-3 -->

	            	<!--	<div class="col-sm-4 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">Customer Service</h4>

	            				<ul class="widget-list">
	            					<li><a href="#">Payment Methods</a></li>
	            					<li><a href="#">Money-back guarantee!</a></li>
	            					<li><a href="#">Returns</a></li>
	            					<li><a href="#">Shipping</a></li>
	            					<li><a href="#">Terms and conditions</a></li>
	            					<li><a href="#">Privacy Policy</a></li>
	            				</ul>
	            			</div>
	            		</div> --><!-- End .col-sm-4 col-lg-3 -->
	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->