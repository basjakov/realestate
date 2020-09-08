<!-- Row -->

<div class="row with-forms">
    <!-- Status -->
    <div class="col-md-82">
        <select data-placeholder="Any Status" class="chosen-select-no-single" name="estate_desc">
            <option>Any Status</option>
            <option value="{{request()->estate_desc}}">{{request()->estate_desc}}</option>
            <option value="sale">For Sale</option>
            <option value="rent">For Rent</option>
            <option value="rentperday">Rent per day</option>
        </select>
    </div>
</div>
<!-- Row / End -->


<!-- Row -->
<div class="row with-forms">
    <!-- Type -->
    <div class="col-md-82">
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
</div>
<!-- Row / End -->


<!-- Row -->
<div class="row with-forms">
    <!-- States -->
    <div class="col-md-82">
        @include('layouts.region')
    </div>
</div>
<!-- Row / End -->





<!-- Row -->
<div class="row with-forms">

    <!-- Min Area -->
    <div class="col-md-6">
        <select data-placeholder="Սենյակներ" class="chosen-select-no-single" name="rooms">
            <option value="{{request()->rooms}}">{{request()->rooms}}</option>
            <option value="1">8</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7+</option>
        </select>
    </div>

    <!-- Max Area -->
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

</div>
<!-- Row / End -->

<br>

<!-- Area Range -->
<label>Քառակուսի մետր</label>
<div class="main-search-input margin-bottom-20">
    <input name="minsquare_meter" type="text" style="margin:0px 10px 0px 10px;" placeholder="Մինիմում" value="{{request()->minsquare_meter}}">
    <input name="maxsquare_meter" type="text" style="margin:0px 10px 0px 10px;" placeholder="Մաքսիմում" value="{{request()->maxsquare_meter}}">
</div>



<label>Գինը</label>
<div class="main-search-input margin-bottom-20">
    <input name="min_price" type="number" style="margin:0px 10px 0px 10px;" placeholder="Մինիմում" value="{{request()->min_price}}" >
    <input name="max_price" type="number" style="margin:0px 10px 0px 10px;" placeholder="Մաքսիմում" value="{{request()->max_price}}">
</div>
<div class="col-md-6" >
    <label>Արժույթը</label>
    <select data-placeholder="Գումարը" class="chosen-select-no-single" name="currency">
        <option value="{{request()->currency}}">{{request()->currency}}</option>
        <option value="AMD">Դրամ</option>
        <option value="USD">Դոլար</option>
        <option value="Eur">Եվրո</option>
        <option value="rub">Ռուբլի</option>
    </select>

    <div class="checkboxes one-in-row margin-bottom-10">


        <input id="check-3" type="checkbox" name="new_building" @if(request()->new_building) checked  @endif value="1">
        <label for="check-3">Նորակառույց</label>



    </div>
</div>

<!-- More Search Options / End -->

<button class="button fullwidth margin-top-30" >Որոնում</button>
<a href="{{route('announcement.index')}}" class="button fullwidth" style="background-color:#284257;margin-top:85px;">Մաքրել ֆիլտրը</a>

