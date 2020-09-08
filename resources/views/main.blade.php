
@extends('layouts.app')

@section('content')
    @include('layouts.slidebanner')
    <!-- Content
================================================== -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline margin-bottom-25 margin-top-65">Նոր ավելացվածներ</h3>
            </div>

            <!-- Carousel -->
            <div class="col-md-12">
                <div class="carousel">
                    @foreach($ancts as $anct)
                    <!-- Listing Item -->
                    <div class="carousel-item">
                        <div class="listing-item">

                            <a href="{{route('announcement.show',$anct->id)}}" class="listing-img-container">

                                <div class="listing-badges">
                                    @if ($anct->new_building == 1)
                                        <span class="featured">Նորակառույց</span>
                                    @endif
                                    @if ($anct->estate_desc == "sale")
                                        <span>Վաճառք</span>
                                    @elseif($anct->estate_desc == "rent")
                                        <span  >Վարձակալություն</span>
                                    @elseif($anct->estate_desc == "rent per day")
                                        <span >Օրավարձ</span>>
                                    @endif
                                </div>

                                <div class="listing-img-content">
                                    <span class="listing-price">{{$anct->price}}<i>{{$anct->price_sqm}} / sq ft</i></span>
                                    <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                                    <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                                </div>
                                <div class="listing-carousel">
                                    <div><img src="uploads/announcement/{{$ancts_images[0]->ancmt_id}}/{{$ancts_images[0]->filename}}" alt="{{$ancts_images[0]->filename}}"></div>
                                    <div><img src="uploads/announcement/{{$ancts_images[1]->ancmt_id}}/{{$ancts_images[1]->filename}}" alt="{{$ancts_images[1]->filename}}"></div>
                                    <div><img src="uploads/announcement/{{$ancts_images[2]->ancmt_id}}/{{$ancts_images[2]->filename}}" alt="{{$ancts_images[2]->filename}}"></div>
                                </div>

                            </a>

                            <div class="listing-content">

                                <div class="listing-title">
                                    <h4><a href="{{route('announcement.show',$anct->id)}}">{{$anct->rooms}} սենյակ,{{$anct->location}}</a><a href="{{$anct->map}}" class="listing-address popup-gmaps">
                                            <i class="fa fa-map-marker" style="margin:0.6em;font-size:20px;"></i>
                                        </a></h4>

                                    {{$anct->cascade_code}} {{$anct->typeofbld}}
                                </div>

                                <ul class="listing-features">
                                    <li>Մակերես<span>{{$anct->square_meter}}</span></li>
                                    <li>Սենյակ՝<span>{{$anct->rooms}}</span></li>
                                    <li>Հարկ՝<span><b>{{$anct->floor}}</b>|{{$anct->storey}}</span> </li>
                                </ul>

                                <div class="listing-footer">

                                    <span><i class="fa fa-calendar-o"></i> {{$anct->created_at}}</span>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- Listing Item / End -->
                        @endforeach





                </div>
            </div>
            <!-- Carousel / End -->

        </div>
    </div>



    <!-- Fullwidth Section -->
    <section class="fullwidth margin-top-105" data-background-color="#f7f7f7">

        <!-- Box Headline -->
        <h3 class="headline-box">What are you looking for?</h3>

        <!-- Content -->
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Office"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">For Sale</a>
                                <a href="listings-grid-standard-with-sidebar.html">For Rent</a>
                            </div>
                        </div>

                        <h3>Apartments</h3>
                        <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel felis.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Home-2"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">For Sale</a>
                                <a href="listings-grid-standard-with-sidebar.html">For Rent</a>
                            </div>
                        </div>

                        <h3>Houses</h3>
                        <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel felis.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Car-3"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">For Sale</a>
                                <a href="listings-grid-standard-with-sidebar.html">For Rent</a>
                            </div>
                        </div>

                        <h3>Garages</h3>
                        <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel felis.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Clothing-Store"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">For Sale</a>
                                <a href="listings-grid-standard-with-sidebar.html">For Rent</a>
                            </div>
                        </div>

                        <h3>Commercial</h3>
                        <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel felis.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->


    <!-- Container -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-35 margin-top-10">Most Popular Places <span>Properties In Most Popular Places</span></h3>
            </div>

            <div class="col-md-4">

                <!-- Image Box -->
                <a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-01.jpg">

                    <!-- Badge -->
                    <div class="listing-badges">
                        <span class="featured">Featured</span>
                    </div>

                    <div class="img-box-content visible">
                        <h4>New York </h4>
                        <span>14 Properties</span>
                    </div>
                </a>

            </div>

            <div class="col-md-8">

                <!-- Image Box -->
                <a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-02.jpg">
                    <div class="img-box-content visible">
                        <h4>Los Angeles</h4>
                        <span>24 Properties</span>
                    </div>
                </a>

            </div>

            <div class="col-md-8">

                <!-- Image Box -->
                <a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-03.jpg">
                    <div class="img-box-content visible">
                        <h4>San Francisco </h4>
                        <span>12 Properties</span>
                    </div>
                </a>

            </div>

            <div class="col-md-4">

                <!-- Image Box -->
                <a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-04.jpg">
                    <div class="img-box-content visible">
                        <h4>Miami</h4>
                        <span>9 Properties</span>
                    </div>
                </a>

            </div>

        </div>
    </div>
    <!-- Container / End -->


    <!-- Fullwidth Section -->
    <section class="fullwidth margin-top-95 margin-bottom-0">

        <!-- Box Headline -->
        <h3 class="headline-box">Articles & Tips</h3>

        <div class="container">
            <div class="row">

                <div class="col-md-4">

                    <!-- Blog Post -->
                    <div class="blog-post">

                        <!-- Img -->
                        <a href="blog-post.html" class="post-img">
                            <img src="images/blog-post-01.jpg" alt="">
                        </a>

                        <!-- Content -->
                        <div class="post-content">
                            <h3><a href="#">8 Tips to Help You Finding New Home</a></h3>
                            <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc, rutrum in malesuada vitae. </p>

                            <a href="blog-post.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                        </div>

                    </div>
                    <!-- Blog Post / End -->

                </div>

                <div class="col-md-4">

                    <!-- Blog Post -->
                    <div class="blog-post">

                        <!-- Img -->
                        <a href="blog-post.html" class="post-img">
                            <img src="images/blog-post-02.jpg" alt="">
                        </a>

                        <!-- Content -->
                        <div class="post-content">
                            <h3><a href="#">Bedroom Colors You'll Never Regret</a></h3>
                            <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc, rutrum in malesuada vitae. </p>

                            <a href="blog-post.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                        </div>

                    </div>
                    <!-- Blog Post / End -->

                </div>

                <div class="col-md-4">

                    <!-- Blog Post -->
                    <div class="blog-post">

                        <!-- Img -->
                        <a href="blog-post.html" class="post-img">
                            <img src="images/blog-post-03.jpg" alt="">
                        </a>

                        <!-- Content -->
                        <div class="post-content">
                            <h3><a href="#">What to Do a Year Before Buying Apartment</a></h3>
                            <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc, rutrum in malesuada vitae. </p>

                            <a href="blog-post.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                        </div>

                    </div>
                    <!-- Blog Post / End -->

                </div>

            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->

@endsection
