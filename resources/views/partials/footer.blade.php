<!-- partial:partials/_footer.html -->
<footer>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12">
                <div class="border-top"></div>
            </div>
            <div class="col-sm-3 col-lg-3 ">
                <ul class="footer-vertical-nav">
                    <li class="menu-title"><a href="/#">News</a></li>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/world">World</a></li>
                    <li><a href="/technology">Technology</a></li>
                    <li><a href="/sport">Sport</a></li>
                    <li><a href="/automotive">Automotive</a></li>
                    <li><a href="/food">Food</a></li>
                    <li><a href="/education">Education</a></li>
                    <li><a href="/finance">Finance</a></li>
                    <li><a href="/politic">Politic</a></li>
                    <li><a href="/entertaiment">Entertaiment</a></li>
                    <li><a href="/travel">Travel</a></li>
                    <li><a href="/health">Health</a></li>
                   
                </ul>
            </div>
            <div class="col-sm-3 col-lg-3 ">
                <ul class="footer-vertical-nav">
                    <li class="menu-title"><a href="#">World</a></li>
                    @foreach ($categories as $category)
                    <li><a href="/world/searchnewsworld?category={{ $category->slug }}">{{ $category->name }}</a>
                    </li>

                    @endforeach
                </ul>
            </div>
            <div class="col-sm-3 col-lg-3 ">
                <ul class="footer-vertical-nav">
                    <li class="menu-title"><a href="#">More</a></li>
                    <li><a href="pages/aboutus.html">About us</a></li>
                    <li><a href="pages/contactus.html">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-between">
                    <h3 class="font-weight-bold">Pers pergerakan</h3>

                    <div class="d-flex justify-content-end footer-social">
                        <h5 class="m-0 font-weight-600 mr-3 d-none d-lg-flex">Follow on</h5>
                        <ul class="social-media">
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="d-lg-flex justify-content-between align-items-center border-top mt-5 footer-bottom">
                    <ul class="footer-horizontal-menu">
                        <li><a href="#">Terms of Use.</a></li>
                        <li><a href="#">Privacy Policy.</a></li>
                        <li><a href="#">Accessibility & CC.</a></li>
                        <li><a href="#">AdChoices.</a></li>
                        <li><a href="#">Advertise with us Transcripts.</a></li>
                        <li><a href="#">License.</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                    <p class="font-weight-medium">
                        © 2020 <a href="https://www.bootstrapdash.com/" target="_blank" class="text-dark">@
                            BootstrapDash</a>, Inc.All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- partial -->