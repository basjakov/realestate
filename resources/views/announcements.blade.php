@extends('layouts.app')

@section('content')
    <div class="parallax titlebar"
         data-background="images/listings-parallax.jpg"
         data-color="#333333"
         data-color-opacity="0.7"
         data-img-width="800"
         data-img-height="505">

        <div id="titlebar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h2>Listings</h2>
                        <span>Grid Layout With Sidebar</span>

                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Listings</li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content
================================================== -->
    <div class="container">
        <div class="row sticky-wrapper">

            <div class="col-md-8">

                <!-- Main Search Input -->
                <form method="post" name="{{route('search')}}">
                    {{csrf_field()}}
                <div class="main-search-input margin-bottom-35">
                    <input type="text" class="ico-01" placeholder="Enter address e.g. street, city and state or zip" name="search" />
                    <button class="button">Search</button>
                </div>
                </form>

                <!-- Sorting / Layout Switcher -->
                <div class="row margin-bottom-15">

                    <div class="col-md-6">
                        <!-- Sort by -->
                        <div class="sort-by">
                            <label>Sort by:</label>

                            <div class="sort-by-select">
                                <select data-placeholder="Default order" class="chosen-select-no-single" >
                                    <option>Default Order</option>
                                    <option>Price Low to High</option>
                                    <option>Price High to Low</option>
                                    <option>Newest Properties</option>
                                    <option>Oldest Properties</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Layout Switcher -->
                        <div class="layout-switcher">
                            <a href="#" class="list"><i class="fa fa-th-list"></i></a>
                            <a href="#" class="grid"><i class="fa fa-th-large"></i></a>
                        </div>
                    </div>
                </div>


                <!-- Listings -->
                <div class="listings-container list-layout">
                   @foreach($ancts as $anct)
                     <!-- Listing Item -->
                     <div class="listing-item">

                        <a href="{{route('announcement.show',$anct->id)}}" class="listing-img-container">
                            {{ csrf_field() }}
                            <div class="listing-badges">
                                <?php
                                if ( $anct->new_building == 1){
                                    echo "<span class='featured'>Նորակառույց</span>";
                                }
                                ?>
                                    @if ($anct->estate_desc == "sale")
                                        <span>Վաճառք</span>
                                    @elseif($anct->estate_desc == "rent")
                                        <span  >Վարձակալություն</span>
                                    @elseif($anct->estate_desc == "rent per day")
                                        <span >Օրավարձ</span>>
                                    @endif

                            </div>

                            <div class="listing-img-content">
                                <span class="listing-price"> {{ $anct->currency === "USD" ? $anct->price." $" : "" }} <i>{{$anct->price_sqm}} /Ք․Մ</i></span>
                                <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                                <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                            </div>

                            <div class="listing-carousel">
                                @foreach($ancts_images as $image)
                                    <div><img src="uploads/announcement/{{$image->ancmt_id}}/{{$image->filename}}" width="128px" alt=""></div>
                                @endforeach
                            </div>
                        </a>

                        <div class="listing-content">

                            <div class="listing-title">
                                <h4><a href="{{route('announcement.show',$anct->id)}}">{{$anct->rooms}} սենյակ,{{$anct->location}}</a></h4>
                                <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
                                    <i class="fa fa-map-marker"></i>
                                   {{$anct->location}} {{$anct->address}}
                                </a>

                                <a href="{{route('announcement.show',$anct->id)}}" class="details button border">Details</a>
                            </div>

                            <ul class="listing-details">
                                <li><b>{{$anct->square_meter}} Քառ․ մետր</b></li>
                                <li><b>1 Bedroom</b></li>
                                <li><b>{{$anct->rooms}} Սենյակ</b></li>

                            </ul>

                            <div class="listing-footer">
                                <a href="#"><i class="fa fa-user"></i> {{$anct->agent}}</a>
                                <span><i class="fa fa-calendar-o"></i> {{$anct->created_at}}</span>
                            </div>

                        </div>

                    </div>
                       @endforeach


                </div>
                <!-- Listings Container / End -->


                <!-- Pagination -->
                <div class="pagination-container margin-top-20">
                    <nav class="pagination">
                        <ul>

                            <li>{{ $ancts->withQueryString()->links() }}</li>
                        </ul>
                    </nav>


                </div>
                <!-- Pagination / End -->

            </div>


            <!-- Sidebar
            ================================================== -->
            <div class="col-md-4">
                <div class="sidebar sticky right">

                    <!-- Widget -->
                    <div class="widget margin-bottom-40">
                        <h3 class="margin-top-0 margin-bottom-35">Մանրամասն ֆիլտրացիա</h3>
                        <form method="GET" action="{{route('announcement.index')}}">

                        @include('layouts.filter')
                        </form>
                    </div>
                    <!-- Widget / End -->

                </div>
            </div>
            <!-- Sidebar / End -->
        </div>
    </div>
@endsection

