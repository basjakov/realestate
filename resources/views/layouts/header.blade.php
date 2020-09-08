<header id="header-container">

    <!-- Topbar -->
    <div id="top-bar">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Top bar -->
                <ul class="top-bar-menu">
                    <li><i class="fa fa-phone"></i> (123) 123-456 </li>
                    <li><i class="fa fa-envelope"></i> <a href="#">office@example.com</a></li>
                    <li>
                        <div class="top-bar-dropdown">
                            <span>Dropdown Menu</span>
                            <ul class="options">
                                <li><div class="arrow"></div></li>
                                <li><a href="#">Nice First Link</a></li>
                                <li><a href="#">Second Link With Long Title</a></li>
                                <li><a href="#">Third Link</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

            </div>
            <!-- Left Side Content / End -->


            <!-- Left Side Content -->
            <div class="right-side">

                <!-- Social Icons -->
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                    <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                    <li><a class="pinterest" href="#"><i class="icon-pinterest"></i></a></li>
                </ul>

            </div>
            <!-- Left Side Content / End -->

        </div>
    </div>
    <div class="clearfix"></div>
    <!-- Topbar / End -->


    <!-- Header -->
    <div id="header">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Logo -->
                <div id="logo">
                    <a href="{{Route('main')}}"><img src="images/logo.png" alt=""></a>
                </div>


                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                    </button>
                </div>


                <!-- Main Navigation -->
                <nav id="navigation" class="style-1">
                    <ul id="responsive">

                        <li><a class="current" href="{{route('main')}}">Գլխավոր</a></li>

                        <li><a href="{{route('announcement.index')}}">Հայտարարություններ</a></li>

                        <li><a href="#">Features</a></li>

                        <li><a href="#">Pages</a></li>

                    </ul>
                </nav>
                <div class="clearfix"></div>
                <!-- Main Navigation / End -->

            </div>
            <!-- Left Side Content / End -->

            <!-- Right Side Content / End -->
            <div class="right-side">
                <!-- Header Widget -->
                <div class="header-widget">
                    @if (Auth::check())
                        <div class="user-menu">
                            <div class="user-name"><span><img src="uploads/realtor/{{Auth::user()->email}}/{{Auth::user()->image}}" alt=""></span>{{Auth::user()->name}}</div>
                            <ul>
                                <li><a href="{{Route('home')}}"><i class="sl sl-icon-user"></i> My Profile</a></li>
                                <li><a href="my-bookmarks.html"><i class="sl sl-icon-star"></i> Bookmarks</a></li>
                                <li><a href="my-properties.html"><i class="sl sl-icon-docs"></i> My Properties</a></li>
                                <li><a href="{{route('logout')}}"><i class="sl sl-icon-power"></i> Log Out</a></li>
                            </ul>
                        </div>
                    @else
                    <a href="{{route('login')}}" class="sign-in"><i class="fa fa-user"></i>Մուտք/Գրանցում</a>
                    @endif
                    <?php
                      if(Auth::check()) {
                       echo '<a href="/announcement/create" class="button border">Ավելացնել  գույք</a>';
                      }
                    ?>
                </div>
                <!-- Header Widget / End -->
            </div>
            <!-- Right Side Content / End -->

        </div>
    </div>
    <!-- Header / End -->

</header>
