<footer class="footer" style="direction: ltr">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">   {{__('messages.list')}}</h2>


                <ul>
                    <li><a href="{{ route('homepage') }} ">   {{__('messages.home')}} </a></li>
                    <li><a href="{{ route('about') }} ">  {{__('messages.about')}} </a></li>
                    <li><a href="{{route('homepage')}}#services ">  {{__('messages.services')}} </a></li>
                    <li><a href="{{ route('work_in_twenty') }} ">     {{__('messages.work_with_twinty')}} </a></li>
                    <li><a href="{{ route('contact_us') }} " >    {{__('messages.contact_us')}}</a></li>
                </ul>
                    </div>
                    <!-- /Footer Widget -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">{{__('messages.contact')}}</h2>
                        <ul>
                            <li>
                                <a href="#">{{__('messages.address')}}</a>
                            </li>

                            <li> <li><a href="mailto: support@twnty2.co">support@twnty2.co</a>                            </li>
                        </ul>
                    </div>
                    <!-- /Footer Widget -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-contact">
                        <div class="social-icon" style="margin-bottom: 21px">
                            <ul class="nav footer-navbar-rht">
                                <div class="social-icon">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/apptwnty2" target="_blank"
                                              ><i class="fab fa-facebook-f"></i>
                                            </a>
                                          </li>
                                          <li>
                                            <a href="https://www.snapchat.com/add/apptwnty2" target="_blank"
                                              ><i class="fab fa-snapchat"></i>
                                            </a>
                                          </li>
                                          <li>
                                            <a href="https://api.whatsapp.com/send?phone=966547011016" target="_blank"
                                              ><i class="fab fa-whatsapp"></i
                                            ></a>
                                          </li>
                                          <li>
                                            <a href="https://www.instagram.com/apptwnty2" target="_blank"
                                              ><i class="fab fa-instagram"></i
                                            ></a>
                                          </li>
                                          <li>
                                            <a href="https://www.twitter.com/apptwnty2" target="_blank"
                                              ><i class="fab fa-twitter"></i
                                            ></a>
                                          </li>
                                          <li>

                                            <a href="https://www.linkedin.com/in/apptwnty2" target="_blank"
                                              ><i class="fab fa-linkedin-in"></i
                                            ></a>

                                          </li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                        <div class="footer-contact-info text-center">
                            <div class="footer-address mb-1">
                                <a href="#"
                                ><img src="assets/img/APP.html" alt="" width="150"
                                    /></a>
                            </div>
                            <div class="footer-address mb-1">
                                <a href="#"
                                ><img src="assets/img/Google.html" alt="" width="150"
                                    /></a>
                            </div>
                            <div class="footer-address">
                                <a href="#"
                                ><img src="assets/img/Gallery.html" alt="" width="150"
                                    /></a>
                            </div>
                        </div>
                    </div>
                    <!-- /Footer Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- /Footer Top -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container-fluid">
            <!-- Copyright -->
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="copyright-text">
                            <div class="d-flex" >
                                <a style="padding: 0 24px;" href="{{route('role')}}"> <p class="mb-0">

                                    {{__('messages.use')}}
                                </p></a>
                                   <a href="{{route('conditions')}}">
                                    <p class="mb-0" style="margin-right: 50px">
                                        {{__('messages.condition')}}
                                    </p>
                                </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Copyright -->
        </div>
    </div>
    <!-- /Footer Bottom -->
</footer>
