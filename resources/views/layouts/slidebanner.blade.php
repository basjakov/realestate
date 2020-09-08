<div class="parallax" data-background="images/home-parallax.jpg" data-color="#36383e" data-color-opacity="0.45" data-img-width="2500" data-img-height="1600">
    <div class="parallax-content">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Main Search Container -->
                    <div class="main-search-container">
                        <h2>Գտիր քո երազանքի անշարժ գույքը</h2>

                        <!-- Main Search -->
                        <form class="main-search-form" action="{{route('main')}}" method="get">

                            <!-- Type -->
                            <div class="search-type">
                                <label class="active"><input class="first-tab" name="tab" checked="checked" type="radio" value="">Բոլորը</label>
                                <label><input name="tab" type="radio" @if(request()->tab) value="{{request()->tab}}" @else value="sale" @endif>Վաճառք</label>
                                <label><input name="tab" type="radio" @if(request()->tab) value="{{request()->tab}}" @else value="rent" @endif>Վարձակալություն</label>
                                <label><input name="tab" type="radio" @if(request()->tab) value="{{request()->tab}}" @else value="rentperday" @endif>Մեկօրյա վարձակալություն</label>
                                <div class="search-type-arrow"></div>
                            </div>


                            <!-- Box -->
                            <div class="main-search-box">

                                <!-- Main Search Input -->
                                <div class="main-search-input larger-input">
                                    <input type="text" class="ico-01" id="autocomplete-input" name="address" placeholder="թաղամաս,հասցե կամ կասկադային կոդ" @if(request()->address) value="{{request()->address}}"  @endif/>
                                    <button class="button">Որոնել</button>
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">

                                    <!-- Property Type -->
                                    <div class="col-md-4">
                                            <select data-placeholder="Շինության տեսակը" class="chosen-select-no-single" name="estate_type">
                                                <option value="{{request()->estate_type}}">{{request()->estate_type}}</option>
                                                <option value="apartament">Բնակարան</option>
                                                <option value="palace">Առանձնատուն</option>
                                                <option value="comercion">Կոմերցիոն</option>
                                                <option value="land">Հողատարածք</option>
                                                {{--            <option>Garages</option>--}}
                                                {{--            <option>Lots</option>--}}
                                            </select>
                                    </div>


                                    <!-- Min Price -->
                                    <div class="col-md-4">

                                        <!-- Select Input -->
                                        <div class="select-input">
                                            <input type="text" placeholder="Մին․ գինը" data-unit="USD" name="min_price" @if(request()->min_price) value="{{request()->min_price}}"  @endif>
                                        </div>
                                        <!-- Select Input / End -->

                                    </div>


                                    <!-- Max Price -->
                                    <div class="col-md-4">

                                        <!-- Select Input -->
                                        <div class="select-input">
                                            <input type="text" placeholder="Մաքս․ գինը" data-unit="USD" name="max_price" @if(request()->max_price) value="{{request()->max_price}}"  @endif>
                                        </div>
                                        <!-- Select Input / End -->

                                    </div>

                                </div>
                                <!-- Row / End -->


                                <!-- More Search Options -->
                                <a href="#" class="more-search-options-trigger" data-open-title="Մանրամասն որոնում" data-close-title="կոմպակտ որոնում"></a>

                                <div class="more-search-options">
                                    <div class="more-search-options-container">

                                        <!-- Row -->
                                        <div class="row with-forms">
                                            <div class="col-md-6">
                                                <select data-placeholder="Շինության տիպը" class="chosen-select-no-single" name="typeofbld">
                                                    <option value="{{request()->typeofbld}}">{{request()->typeofbld}}</option>
                                                    <option value="rock">Քարե</option>
                                                    <option value="pannel">Պանելային</option>
                                                    <option value="monolit">Մոնոլիտ</option>
                                                    <option value="wood">Փայտե</option>
                                                    <option value="other">Այլ</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select data-placeholder="Գումարը" class="chosen-select-no-single" name="currency">
                                                    <option value="{{request()->currency}}">{{request()->currency}}</option>
                                                    <option value="AMD">Դրամ</option>
                                                    <option value="USD">Դոլար</option>
                                                    <option value="Eur">Եվրո</option>
                                                    <option value="rub">Ռուբլի</option>
                                                </select>
                                            </div>
                                            <!-- Min Price -->
                                            <div class="col-md-6">

                                                <!-- Select Input -->
                                                <div class="select-input">
                                                    <input type="text" placeholder="Մինիմում" name="minsquare_meter"data-unit="Քառ․ մետր" @if(request()->minsquare_meter) value="{{request()->minsquare_meter}}"  @endif>
                                                </div>
                                                <!-- Select Input / End -->

                                            </div>

                                            <!-- Max Price -->
                                            <div class="col-md-6">

                                                <!-- Select Input -->
                                                <div class="select-input">
                                                    <input type="text" placeholder="Մաքսիմում" name="maxsquare_meter" data-unit="Քառ․ մետր" @if(request()->maxsquare_meter) value="{{request()->maxsquare_meter}}"  @endif >
                                                </div>
                                                <!-- Select Input / End -->

                                            </div>

                                        </div>
                                        <!-- Row / End -->


                                        <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Min Area -->
                                            <div class="col-md-6">
                                                <select data-placeholder="Մին․ սենյակներ" class="chosen-select-no-single" name="min_rooms">
                                                    <option value="{{request()->min_rooms}}">{{request()->min_rooms}}</option>
                                                    <option>Beds (Any)</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>

                                            <!-- Max Area -->
                                            <div class="col-md-6">
                                                <select data-placeholder="Մաքս․ սենյակներ" class="chosen-select-no-single" name="max_rooms">
                                                    <option value="{{request()->max_rooms}}">{{request()->max_rooms}}</option>
                                                    <option value="1">8</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7+</option>
                                                </select>
                                            </div>

                                        </div>
                                        <!-- Row / End -->


                                        <!-- Checkboxes -->
                                        <div class="checkboxes in-row">

                                            <input id="check-2" type="checkbox" name="new_building" @if(request()->new_building) checked  @endif value="1">
                                            <label for="check-2">Նորակառույց</label>

                                        </div>
                                        <!-- Checkboxes / End -->

                                    </div>
                                </div>
                                <!-- More Search Options / End -->
                                @if(request()->tab)
                                    <br>
                                    <a href="{{route('main')}}" class="button">Մաքրել որոնումը</a>
                                @endif

                            </div>
                            <!-- Box / End -->

                        </form>
                        <!-- Main Search -->

                    </div>
                    <!-- Main Search Container / End -->

                </div>
            </div>
        </div>

    </div>
</div>
