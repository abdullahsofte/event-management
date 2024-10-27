<!-- footer-section2 - start
  ================================================== -->
<footer id="footer-section" class="footer-section footer-section2 clearfix">

    <!-- footer-top - start -->
    {{-- <div class="footer-top sec-ptb-100 clearfix">
        <div class="container">
            <div class="row">

                <!-- about-wrapper - start -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="about-wrapper">

                        <!-- site-logo-wrapper - start -->
                        <div class="site-logo-wrapper mb-30">
                            <a href="{{ route('home') }}" class="logo">
                                <img src="{{ asset($content->logo) }}" alt="logo_not_found">
                            </a>
                        </div>
                        <!-- site-logo-wrapper - end -->

                        <p class="mb-30">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna.
                        </p>

                        <!-- basic-info - start -->
                        <div class="basic-info ul-li-block mb-50">
                            <ul>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $content->address }}
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <a href="#!">{{ $content->email }}</a>
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <a href="#!">{{ $content->phone_1 }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- basic-info - end -->

                        <!-- social-links - start -->
                        <div class="social-links ul-li">
                            <h3 class="social-title">network</h3>
                            <ul>
                                <li>
                                    <a href="#!"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-twitch"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- social-links - end -->

                    </div>
                </div>
                <!-- about-wrapper - end -->

                <!-- usefullinks-wrapper - start -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="usefullinks-wrapper ul-li-block">
                        <h3 class="footer-item-title">
                            useful <strong>links</strong>
                        </h3>
                        <ul>
                            <li><a href="#!">About Harmoni</a></li>
                            <li><a href="#!">Disclaimer</a></li>
                            <li><a href="#!">Contact us</a></li>
                            <li><a href="#!">Events Schedule</a></li>
                            <li><a href="#!">Sponsors</a></li>
                            <li><a href="#!">Venues</a></li>
                            <li><a href="#!">Tickets</a></li>
                            <li><a href="#!">Pricing Plans</a></li>
                        </ul>

                    </div>
                </div>
                <!-- usefullinks-wrapper - end -->

                <!-- instagram-wrapper - start -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="instagram-wrapper ul-li">
                        <h3 class="footer-item-title">
                            harmoni <strong>instagram</strong>
                        </h3>
                        <ul>
                            <li class="image-wrapper">
                                <img src="{{ asset('website/images/footer/instagram/img1.png') }}"
                                    alt="Image_not_found">
                                <a href="#!"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="image-wrapper">
                                <img src="{{ asset('website/images/footer/instagram/img2.png') }}"
                                    alt="Image_not_found">
                                <a href="#!"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="image-wrapper">
                                <img src="{{ asset('website/images/footer/instagram/img3.png') }}"
                                    alt="Image_not_found">
                                <a href="#!"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="image-wrapper">
                                <img src="{{ asset('website/images/footer/instagram/img4.png') }}"
                                    alt="Image_not_found">
                                <a href="#!"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="image-wrapper">
                                <img src="{{ asset('website/images/footer/instagram/img5.png') }}"
                                    alt="Image_not_found">
                                <a href="#!"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="image-wrapper">
                                <img src="{{ asset('website/images/footer/instagram/img6.png') }}"
                                    alt="Image_not_found">
                                <a href="#!"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                        <h4 class="followus-link">
                            Follow Our Instagram <a href="#!">#Harmoni</a>
                        </h4>
                    </div>
                </div>
                <!-- instagram-wrapper - end -->

            </div>
        </div>
    </div> --}}
    <!-- footer-top - end -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">

                <!-- copyright-text - start -->
                <div class="col-lg-9 col-md-12 col-sm-12">
                    <div class="copyright-text">
                        <p class="m-0" style="color: #fff">&copy; <?php echo date("Y"); ?> <a href="{{ route('home') }}"
                                class="site-link">{{ $content->company_name }}</a> all right reserved.</p>
                    </div>
                </div>
                <!-- copyright-text - end -->

                <!-- footer-menu - start -->
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="{{ route('contact.us') }}">Contact us</a></li>
                            <li><a href="{{ route('aboutUs') }}">About us</a></li>
                        </ul>
                    </div>
                </div>
                <!-- footer-menu - end -->

            </div>
        </div>
    </div>

</footer>
<!-- footer-section2 - end
================================================== -->
