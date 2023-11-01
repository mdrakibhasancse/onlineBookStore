			<!-- Footer Area Start -->
            <footer>
                <div class="footer-top-area">
                    <div class="container ">
                         <div class="row text-center">

							<a href="{{ url('/')}}"><h4 style="font-size: 32px; color:#32b5f3; margin-bottom:20px;">{{$setting->name}}</h4></a>
							<ul class="footer-contact">
								<li>
									<i class="flaticon-location"></i>
									{{$setting->address}}
								</li>
								<li>
									<i class="flaticon-technology"></i>
									{{$setting->mobile}}
								</li>
								<li>
									<i class="flaticon-web"></i>
									{{$setting->email}}
								</li>
							</ul>
                         </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-bottom-left pull-left">
                                    <p>{{ $setting->copyright }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="footer-bottom-right pull-right">
                                    <ul class="social-icon">
                                        @if($setting->facebook) <li><a target="_blank" title="Facebook" href="{{ $setting->facebook }}" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>@endif
                                        @if($setting->twitter)<li><a target="_blank" title="Twitter" href="{{ $setting->twitter }}" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>@endif
                                        @if($setting->reddit)<li><a target="_blank" title="reddit" href="{{ $setting->reddit }}" class="reddit social-icon"><i class="fa fa-reddit"></i></a></li>@endif
                                        @if($setting->email)<li><a target="_blank" title="Google +" href="{{ $setting->email }}" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>@endif
                                        @if($setting->linkedin)<li><a target="_blank" title="LinkedIn" href="{{ $setting->linkedin }}" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>@endif
                                        @if($setting->instagram)<li><a target="_blank" title="instagram" href="{{ $setting->instagram }}" class="instagram social-icon"><i class="fa fa-instagram"></i></a></li>@endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer Area End -->
