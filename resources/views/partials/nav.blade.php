<header id="header">
    <div class="container">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="d-flex justify-content-between align-items-center navbar-top">
                <ul class="navbar-left">
                    <li>{{ date('D, M d, Y') }}</li>
                </ul>
                <div>
                    <a class="navbar-brand header font-weight-bolder ml-5" href="/">Pers Pergerakan</a>
                </div>
                <div class="d-flex">
                    <ul class="navbar-right">
                        @auth
                        <li>
                            <a href="/dashboard/post"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                </svg> {{ auth()->user()->name }}</a>
                        </li>
                        <li>
                            <form action="/auth/logout" method="post">
                                @csrf
                                <button class="dropdown-item px-1 py-0 logout"
                                    style="outline: 0; background: none; border:none;  cursor: pointer; outline: inherit;">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M14.08,15.59L16.67,13H7V11H16.67L14.08,8.41L15.5,7L20.5,12L15.5,17L14.08,15.59M19,3A2,2 0 0,1 21,5V9.67L19,7.67V5H5V19H19V16.33L21,14.33V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H19Z" />
                                    </svg> logout
                                </button>
                            </form>
                        </li>
                        @else
                        <li>
                            <a href="/auth/signin">Sign in</a>
                        </li>
                        <li>
                            <a href="/auth/register">Sign up</a>
                        </li>
                        @endauth

                    </ul>
                    {{-- <ul class="social-media">
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

                    </ul> --}}
                </div>
            </div>
            <div class="navbar-bottom-menu">
                <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                        <li>
                            <button class="navbar-close">
                                <i class="mdi mdi-close"></i>
                            </button>
                        </li>
                        <li class="nav-item " style="">
                            <a class="nav-link first-nav" href="/"  style="font-size: 13px ; ">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/world" style="font-size: 13px ;">World</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/technology" style="font-size: 13px ;">Technology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/sport" style="font-size: 13px ;">Sport</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/automotive" style="font-size: 13px ;">Automotive</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/food" style="font-size: 13px ;">Food</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/education" style="font-size: 13px ;">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/finance" style="font-size: 13px ;">Finance</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/politic" style="font-size: 13px ;">Politic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/entertaiment" style="font-size: 13px ;">Entertaiment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/travel" style="font-size: 13px ;">Travel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/health" style="font-size: 13px;">Health</a>
                        </li>
                        <li class="nav-item d-none">
                            <a class="nav-link" href="/health" style="font-size: 13.5px; margin-left: -50px;">Health</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- partial -->
    </div>
</header>