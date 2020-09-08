@extends('layouts.app')

@section('content')

    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="property-titlebar margin-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <a href="listings-list-with-sidebar.html" class="back-to-listings"></a>
                    <div class="property-title">
                        <h2>{{$anct->new_building == 1 ? "Նորակառույց":""}} {{$anct->rooms}} սենյակ,{{$anct->location}}<span class="property-badge">{{$anct->estate_desc}}</span></h2>
                        <span>
						<a href="#location" class="listing-address">
							<i class="fa fa-map-marker"></i>
                            {{$anct->location}} {{$anct->address}}
						</a>
					</span>
                    </div>

                    <div class="property-pricing">
                        <div class="property-price">{{$anct->currency == "USD" ? "$".$anct->price:$anct->currency." ".$anct->price}}</div>
                        <div class="sub-price">{{$anct->currency == "USD" ? "$".$anct->price_sqm:$anct->currency." ".$anct->price_sqm}} քառ․մ</div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row margin-bottom-50">
            <div class="col-md-12">

                <!-- Slider -->
                <div class="property-slider default">
                    @foreach($ancts_images as $image)
                        <a href="/uploads/announcement/{{$image->ancmt_id}}/{{$image->filename}}" data-background-image="/uploads/announcement/{{$image->ancmt_id}}/{{$image->filename}}" class="item mfp-gallery"></a>
                    @endforeach
                </div>

                <!-- Slider Thumbs -->
                <div class="property-slider-nav">
                    @foreach($ancts_images as $image)
                        <div class="item"><img src="/uploads/announcement/{{$image->ancmt_id}}/{{$image->filename}}" alt="{{$image->filename}}"></div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <!-- Property Description -->
            <div class="col-lg-8 col-md-7 sp-content">
                <div class="property-description">

                    <!-- Main Features -->
                    <ul class="property-main-features">
                        <li>Մակերես <span>{{$anct->square_meter}}</span></li>
                        <li>Սենյակներ<span>{{$anct->rooms}}</span></li>
                        <li>Սանհանգույց<span>{{$anct->toilets}}</span></li>
                    </ul>


                    <!-- Description -->
                    <h3 class="desc-headline">Նկարագրություն</h3>
                    <div class="show-more">
                        <p>
                            {{substr($anct->desc_arm,0,500)}}
                        </p>

                        <p>
                            {{substr($anct->desc_arm,500)}}
                        </p>



                        <a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a>
                    </div>

                    <!-- Details -->
                    <h3 class="desc-headline">Details</h3>
                    <ul class="property-features margin-top-0">
                        <li>Հարկը`<span>{{$anct->floor}}</span></li>
                        <li><span>{{$anct->storey}}</span> Հարկանի </li>
                        <li>Քառակուսի մետր՝ <span>{{$anct->square_meter}}</span></li>
                        <li>Սենյակներ՝ <span>{{$anct->rooms}}</span></li>
                        <li>Սանհանգույց՝ <span>{{$anct->toilets}}</span></li>
                        <li>Շինության տիպը՝ <span>{{$anct->typeofbld}}</span></li>
                        <li>Առաստաղի բարձրությունը՝<span>{{$anct->celling_height}}</span></li>
                        <li>Վիճակը՝ <span>{{$anct->condition}}</span></li>
                        <li>Storage Room: <span>Yes</span></li>
                    </ul>

                    <h3 class="desc-headline">Կոմունալ</h3>
                    <ul class="property-features checkboxes margin-top-0">
                    @foreach (json_decode($anct->comunal) as $comunal)
                        <li>{{$comunal}}</li>
                        @endforeach
                        </ul>

                    <!-- Features -->
                    <h3 class="desc-headline">Հնարավորություններ</h3>
                    <ul class="property-features checkboxes margin-top-0">
                    @foreach (json_decode($anct->additional) as $additional)
                        <li>{{$additional}}</li>
                        @endforeach
                        </ul>




                    <!-- Floorplans -->
                    <h3 class="desc-headline no-border">Նկարագրությոն</h3>
                    <!-- Accordion -->
                    <div class="style-1 fp-accordion">
                        <div class="accordion">

                            <h3>Նկարագրությոն <i class="fa fa-angle-down"></i> </h3>
                            <div>
                                <a class="floor-pic mfp-image" href="https://i.imgur.com/kChy7IU.jpg">
                                    <img src="https://i.imgur.com/kChy7IU.jpg" alt="">
                                </a>
                                <p>{{$anct->desc_arm}}</p>
                            </div>
                            <h3>Այլ <i class="fa fa-angle-down"></i> </h3>
                            <div>
                                <a class="floor-pic mfp-image" href="https://i.imgur.com/kChy7IU.jpg">
                                    <img src="https://i.imgur.com/kChy7IU.jpg" alt="">
                                </a>
                                <p>{{$anct->other}}</p>
                            </div>
                        </div>
                    </div>


                    <!-- Video -->
                    <h3 class="desc-headline no-border">Video</h3>
                    <div class="responsive-iframe">
                        <iframe width="560" height="315" src="{{$anct->videourl}}" frameborder="0" allowfullscreen></iframe>
                    </div>


                    <!-- Location -->
                    <h3 class="desc-headline no-border" id="location">Location</h3>
                    <div id="propertyMap-container">
                        <div id="propertyMap" >{{$anct->map}}</div>
                        <a href="#" id="streetView">Street View</a>
                    </div>


                    <!-- Similar Listings Container -->
                    <h3 class="desc-headline no-border margin-bottom-35 margin-top-60">Similar Properties</h3>

                    <!-- Layout Switcher -->

                    <div class="layout-switcher hidden"><a href="#" class="list"><i class="fa fa-th-list"></i></a></div>
                    <div class="listings-container list-layout">

                        <!-- Listing Item -->
                        <div class="listing-item">

                            <a href="#" class="listing-img-container">

                                <div class="listing-badges">
                                    <span>For Rent</span>
                                </div>

                                <div class="listing-img-content">
                                    <span class="listing-price">$1700 <i>monthly</i></span>
                                    <span class="like-icon"></span>
                                </div>

                                <img src="images/listing-03.jpg" alt="">

                            </a>

                            <div class="listing-content">

                                <div class="listing-title">
                                    <h4><a href="#">Meridian Villas</a></h4>
                                    <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
                                        <i class="fa fa-map-marker"></i>
                                        778 Country St. Panama City, FL
                                    </a>

                                    <a href="#" class="details button border">Details</a>
                                </div>

                                <ul class="listing-details">
                                    <li>1450 sq ft</li>
                                    <li>1 Bedroom</li>
                                    <li>2 Rooms</li>
                                    <li>2 Rooms</li>
                                </ul>

                                <div class="listing-footer">
                                    <a href="#"><i class="fa fa-user"></i> Chester Miller</a>
                                    <span><i class="fa fa-calendar-o"></i> 4 days ago</span>
                                </div>

                            </div>
                            <!-- Listing Item / End -->

                        </div>
                        <!-- Listing Item / End -->


                        <!-- Listing Item -->
                        <div class="listing-item">

                            <a href="#" class="listing-img-container">

                                <div class="listing-badges">
                                    <span>For Sale</span>
                                </div>

                                <div class="listing-img-content">
                                    <span class="listing-price">$420,000 <i>$770 / sq ft</i></span>
                                    <span class="like-icon"></span>
                                </div>

                                <div><img src="images/listing-04.jpg" alt=""></div>

                            </a>

                            <div class="listing-content">

                                <div class="listing-title">
                                    <h4><a href="#">Selway Apartments</a></h4>
                                    <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
                                        <i class="fa fa-map-marker"></i>
                                        33 William St. Northbrook, IL
                                    </a>

                                    <a href="#" class="details button border">Details</a>
                                </div>

                                <ul class="listing-details">
                                    <li>540 sq ft</li>
                                    <li>1 Bedroom</li>
                                    <li>3 Rooms</li>
                                    <li>2 Bathroom</li>
                                </ul>

                                <div class="listing-footer">
                                    <a href="#"><i class="fa fa-user"></i> Kristen Berry</a>
                                    <span><i class="fa fa-calendar-o"></i> 3 days ago</span>
                                </div>

                            </div>
                            <!-- Listing Item / End -->

                        </div>
                        <!-- Listing Item / End -->


                        <!-- Listing Item -->
                        <div class="listing-item">

                            <a href="#" class="listing-img-container">
                                <div class="listing-badges">
                                    <span>For Sale</span>
                                </div>

                                <div class="listing-img-content">
                                    <span class="listing-price">$535,000 <i>$640 / sq ft</i></span>
                                    <span class="like-icon"></span>
                                </div>

                                <img src="images/listing-05.jpg" alt="">
                            </a>

                            <div class="listing-content">

                                <div class="listing-title">
                                    <h4><a href="#">Oak Tree Villas</a></h4>
                                    <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
                                        <i class="fa fa-map-marker"></i>
                                        71 Lower River Dr. Bronx, NY
                                    </a>

                                    <a href="#" class="details button border">Details</a>
                                </div>

                                <ul class="listing-details">
                                    <li>350 sq ft</li>
                                    <li>1 Bedroom</li>
                                    <li>2 Rooms</li>
                                    <li>1 Bathroom</li>
                                </ul>

                                <div class="listing-footer">
                                    <a href="#"><i class="fa fa-user"></i> Mabel Gagnon</a>
                                    <span><i class="fa fa-calendar-o"></i> 4 days ago</span>
                                </div>

                            </div>
                            <!-- Listing Item / End -->

                        </div>
                        <!-- Listing Item / End -->

                    </div>
                    <!-- Similar Listings Container / End -->

                </div>
            </div>
            <!-- Property Description / End -->


            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5 sp-sidebar">
                <div class="sidebar sticky right">

                    <!-- Widget -->
                    <div class="widget margin-bottom-30">
                        <button class="widget-button with-tip" data-tip-content="Print"><i class="sl sl-icon-printer"></i></button>
                        <button class="widget-button with-tip" data-tip-content="Add to Bookmarks"><i class="fa fa-star-o"></i></button>
                        <button class="widget-button with-tip compare-widget-button" data-tip-content="Add to Compare"><i class="icon-compare"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Widget / End -->


                    <!-- Booking Widget -->
                    <div class="widget">
                        <div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
                            <h3><i class="fa fa-calendar-check-o"></i> Schedule a Tour</h3>
                            <div class="row with-forms  margin-top-0">

                                <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
                                <div class="col-lg-12">
                                    <input type="text" id="date-picker" placeholder="Date" readonly="readonly">
                                </div>

                                <!-- Panel Dropdown -->
                                <div class="col-lg-12">
                                    <div class="panel-dropdown time-slots-dropdown">
                                        <a href="#">Time</a>
                                        <div class="panel-dropdown-content padding-reset">
                                            <div class="panel-dropdown-scrollable">

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-1">
                                                    <label for="time-slot-1">
                                                        <strong>8:30 am - 9:00 am</strong>
                                                        <span>1 slot available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-2">
                                                    <label for="time-slot-2">
                                                        <strong>9:00 am - 9:30 am</strong>
                                                        <span>2 slots available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-3">
                                                    <label for="time-slot-3">
                                                        <strong>9:30 am - 10:00 am</strong>
                                                        <span>1 slots available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-4">
                                                    <label for="time-slot-4">
                                                        <strong>10:00 am - 10:30 am</strong>
                                                        <span>3 slots available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-5">
                                                    <label for="time-slot-5">
                                                        <strong>13:00 pm - 13:30 pm</strong>
                                                        <span>2 slots available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-6">
                                                    <label for="time-slot-6">
                                                        <strong>13:30 pm - 14:00 pm</strong>
                                                        <span>1 slots available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-7">
                                                    <label for="time-slot-7">
                                                        <strong>14:00 pm - 14:30 pm</strong>
                                                        <span>1 slots available</span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Panel Dropdown / End -->

                            </div>

                            <!-- Book Now -->
                            <a href="#" class="button book-now fullwidth margin-top-5">Send Request</a>
                        </div>

                    </div>
                    <!-- Booking Widget / End -->


                    <!-- Widget -->
                    <div class="widget">
                        <h3 class="margin-bottom-30 margin-top-30">Agent</h3>
                        <!-- Agent Widget -->
                        <div class="agent-widget">
                            <div class="agent-title">
                                <div class="agent-photo"><img src="/uploads/realtor/{{$User->image}}" alt="" /></div>
                                <div class="agent-details">
                                    <h4><a href="#">{{$User->name}} {{$User->lastname}}</a></h4>
                                    <span><i class="sl sl-icon-call-in"></i>{{$User->phone_1}}</span>
                                    <span><i class="sl sl-icon-call-in"></i>{{$User->phone_2}}</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- Agent Widget / End -->

                    </div>
                    <!-- Widget / End -->


                    <!-- Widget -->
                    <div class="widget">
                        <h3 class="margin-bottom-30 margin-top-30">Mortgage Calculator</h3>

                        <!-- Mortgage Calculator -->
                        <form action="javascript:void(0);" autocomplete="off" class="mortgageCalc" data-calc-currency="USD">
                            <div class="calc-input">
                                <div class="pick-price tip" data-tip-content="Set This Property Price"></div>
                                <input type="text" id="amount" name="amount" placeholder="Sale Price" required>
                                <label for="amount" class="fa fa-usd"></label>
                            </div>

                            <div class="calc-input">
                                <input type="text" id="downpayment" placeholder="Down Payment">
                                <label for="downpayment" class="fa fa-usd"></label>
                            </div>

                            <div class="calc-input">
                                <input type="text" id="years" placeholder="Loan Term (Years)" required>
                                <label for="years" class="fa fa-calendar-o"></label>
                            </div>

                            <div class="calc-input">
                                <input type="text" id="interest" placeholder="Interest Rate" required>
                                <label for="interest" class="fa fa-percent"></label>
                            </div>

                            <button class="button calc-button" formvalidate>Calculate</button>
                            <div class="calc-output-container"><div class="notification success">Monthly Payment: <strong class="calc-output"></strong></div></div>
                        </form>
                        <!-- Mortgage Calculator / End -->

                    </div>
                    <!-- Widget / End -->


                    <!-- Widget -->
                    <div class="widget">
                        <h3 class="margin-bottom-35">Featured Properties</h3>

                        <div class="listing-carousel outer">
                            <!-- Item -->
                            <div class="item">
                                <div class="listing-item compact">

                                    <a href="#" class="listing-img-container">

                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                            <span>For Sale</span>
                                        </div>

                                        <div class="listing-img-content">
                                            <span class="listing-compact-title">Eagle Apartments <i>$275,000</i></span>

                                            <ul class="listing-hidden-content">
                                                <li>Area <span>530 sq ft</span></li>
                                                <li>Rooms <span>3</span></li>
                                                <li>Beds <span>1</span></li>
                                                <li>Baths <span>1</span></li>
                                            </ul>
                                        </div>

                                        <img src="images/listing-01.jpg" alt="">
                                    </a>

                                </div>
                            </div>
                            <!-- Item / End -->

                            <!-- Item -->
                            <div class="item">
                                <div class="listing-item compact">

                                    <a href="#" class="listing-img-container">

                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                            <span>For Sale</span>
                                        </div>

                                        <div class="listing-img-content">
                                            <span class="listing-compact-title">Selway Apartments <i>$245,000</i></span>

                                            <ul class="listing-hidden-content">
                                                <li>Area <span>530 sq ft</span></li>
                                                <li>Rooms <span>3</span></li>
                                                <li>Beds <span>1</span></li>
                                                <li>Baths <span>1</span></li>
                                            </ul>
                                        </div>

                                        <img src="images/listing-02.jpg" alt="">
                                    </a>

                                </div>
                            </div>
                            <!-- Item / End -->

                            <!-- Item -->
                            <div class="item">
                                <div class="listing-item compact">

                                    <a href="#" class="listing-img-container">

                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                            <span>For Sale</span>
                                        </div>

                                        <div class="listing-img-content">
                                            <span class="listing-compact-title">Oak Tree Villas <i>$325,000</i></span>

                                            <ul class="listing-hidden-content">
                                                <li>Area <span>530 sq ft</span></li>
                                                <li>Rooms <span>3</span></li>
                                                <li>Beds <span>1</span></li>
                                                <li>Baths <span>1</span></li>
                                            </ul>
                                        </div>

                                        <img src="images/listing-03.jpg" alt="">
                                    </a>

                                </div>
                            </div>
                            <!-- Item / End -->
                        </div>

                    </div>
                    <!-- Widget / End -->

                </div>
            </div>
            <!-- Sidebar / End -->

        </div>
    </div>

@endsection
