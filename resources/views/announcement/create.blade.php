@extends('layouts.app')
@section('content')
@if (Auth::check())
<div class="container-fluid">
<form method="post" action="{{route('announcement.store')}}" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="estate_desc" id="option1" autocomplete="off" checked value="sale"> Վաճառք
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="estate_desc" id="option2" autocomplete="off" value="rent"> Վարձակալություն
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="estate_desc" id="option3" autocomplete="off" value="rentperday"> Օրավարձով
        </label>
    </div>

    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="estate_type" id="option1" autocomplete="off" checked value="apartament"> Բնակարան
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="estate_type" id="option2" autocomplete="off" value="palace">Առանձնատուն
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="estate_type" id="option3" autocomplete="off" value="comercion">Կոմերցիոն
        </label>
    </div>


    @include('layouts.region')<br/>


    <div class="form-group">
        <label for="exampleInputaddress">Ձեր հասցեն</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="address" >
    </div>

    <div class="form-group">
        <label for="exampleInputbuilding">Շենք</label>
        <input type="text" class="form-control" name="building" value="building"><br/>
    </div>
    <div class="form-group">
        <label for="exampleInputapt">Բնակարան</label>
        <input type="number" name="apt"><br/>
    </div>
    <div class="form-group">
        <label for="examplecascade_code">Կադաստրային կոդ</label>
        <input type="text" name="cascade_code" ><br/>
    </div>
    <div class="form-group">
        <label for="examplecascade_code2">Կադաստրային կոդ 2</label>
        <input type="text" name="cascade_code2" ><br/>
    </div>

    <select class="browser-default custom-select" name="currency">
        <option selected>Արժույթի տեսակը</option>
        <option value="USD">USD</option>
        <option value="AMD">AMD</option>
        <option value="Eur">Eur</option>
        <option value="Rub">Rub</option>
    </select>

    <div class="form-group">
        <label for="exampleprice">Գին</label>
       <input type="number" name="price" ><br/>
    </div>
    <div class="form-group">
        <label for="exampleprice_sqm">Գինը ամեն քառակուսի մետրով</label>
        <input type="number" name="price_sqm" ><br/>
    </div>

        <label style="text-transform: uppercase">գույքի դիրքը</label>
    <div class="col-xs-12">
        <div class="form-inline">
            <div class="form-group in_construction">
                <input  name="position" class="css-radio" value="inside_building" type="radio" checked="checked">
                <label  class="css-radio-label">Շինության ներսում</label>
            </div>
            <div class="form-group separate_building">
                <input  name="position" class="css-radio" value="outside_building" type="radio">
                <label  class="css-radio-label">Առանձին շինություն</label>
            </div>
        </div>
    </div>

    <select class="form-control" id="floor" name="floor">
        <option value="100" selected="selected">Ընտրեք հարկը</option>
        <option value="0">Նկուղ</option>
        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option> <option value="25">25+</option>
    </select>

    <select class="form-control"  name="storey">
        <option value="100" selected="selected">Հարկանի</option>
        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option> <option value="25">25+</option>
    </select>

    <div class="form-group">
        <label for="examplesquare_meter">Քառակուսի մետր</label>
        <input type="number" name="square_meter"><br/>
    </div>
    <div class="form-group">
        <label for="exampleland_area">Հողի մակերեսը</label>
        <input type="number" name="land_area" ><br/>
    </div>
    <div class="form-group">
        <div class="form-group" style="margin-bottom: 0">
            <div class="checkbox-inline">
                <label>Սենյակներ</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-inline">
                <div class="form-group">
                    <input id="rooms1" name="rooms" class="css-radio" value="1" type="radio" checked="checked">
                    <label for="rooms1" class="css-radio-label">1</label>
                </div>
                <div class="form-group">
                    <input id="rooms2" name="rooms" class="css-radio" value="2" type="radio">
                    <label for="rooms2" class="css-radio-label">2</label>
                </div>
                <div class="form-group">
                    <input id="rooms3" name="rooms" class="css-radio" value="3" type="radio">
                    <label for="rooms3" class="css-radio-label">3</label>
                </div>
                <div class="form-group">
                    <input id="rooms4" name="rooms" class="css-radio" value="4" type="radio">
                    <label for="rooms4" class="css-radio-label">4</label>
                </div>
                <div class="form-group">
                    <input id="rooms5" name="rooms" class="css-radio" value="5" type="radio">
                    <label for="rooms5" class="css-radio-label">5</label>
                </div>
                <div class="form-group">
                    <input id="rooms6" name="rooms" class="css-radio" value="6" type="radio">
                    <label for="rooms6" class="css-radio-label">6</label>
                </div>
                <div class="form-group">
                    <input id="rooms7" name="rooms" class="css-radio" value="7" type="radio">
                    <label for="rooms7" class="css-radio-label">7+</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
    <div class="form-group" style="margin-bottom: 0">
        <div class="checkbox-inline">
            <label>Սանհանգույց</label>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-inline">

            <div class="form-group">
                <input  name="toilets" class="css-radio" type="radio" value="1" checked="checked">
                <label  class="css-radio-label">1</label>
            </div>
            <div class="form-group">
                <input  name="toilets" class="css-radio" value="2" type="radio">
                <label  class="css-radio-label">2</label>
            </div>
            <div class="form-group">
                <input  name="toilets" class="css-radio" value="3" type="radio">
                <label  class="css-radio-label">3</label>
            </div>
            <div class="form-group">
                <input  name="toilets" class="css-radio" value="4" type="radio">
                <label  class="css-radio-label">4</label>
            </div>
            <div class="form-group">
                <input  name="toilets" class="css-radio" value="5" type="radio">
                <label  class="css-radio-label">5+</label>
            </div>
        </div>
    </div>
    </div>

    <div class="form-group">
        <div class="form-group" style="margin-bottom: 0">
            <div class="checkbox-inline">
                <label>Շինության տիպը</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-inline">
                <div class="form-group">
                    <input id="bulding_type_monolit" name="typeofbld" class="css-radio" value="monolit" type="radio">
                    <label for="bulding_type_monolit" class="css-radio-label">Մոնոլիտ</label>
                </div>
                <div class="form-group">
                    <input id="bulding_type_stone" name="typeofbld" class="css-radio" value="2" type="radio">
                    <label for="bulding_type_stone" class="css-radio-label">Քարե</label>
                </div>
                <div class="form-group">
                    <input id="bulding_type_panel" name="typeofbld" class="css-radio" value="3" type="radio">
                    <label for="bulding_type_panel" class="css-radio-label">Պանելային</label>
                </div>
                <div class="form-group">
                    <input id="bulding_type_other" name="typeofbld" class="css-radio" value="4" type="radio" checked="checked">
                    <label for="bulding_type_other" class="css-radio-label">Այլ</label>
                </div>
                <div class="form-group new_consruction">
                    <input  name="new_building" class="css-checkbox" value="1" type="checkbox">
                    <label  class="css-label">Նորակառույց</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-group" style="margin-bottom: 0">
            <div class="checkbox-inline">
                <label>Նշանակություն</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-inline">
                <div class="form-group">
                    <input  name="Significance" class="css-radio" value="traiding" type="radio">
                    <label  class="css-radio-label">Առևտրային</label>
                </div>
                <div class="form-group">
                    <input  name="Significance" class="css-radio" value="office" type="radio">
                    <label  class="css-radio-label">Գրասենյակային</label>
                </div>
                <div class="form-group">
                    <input  name="Significance" class="css-radio" value="service" type="radio">
                    <label  class="css-radio-label">Սպասարկում</label>
                </div>
                <div class="form-group">
                    <input  name="Significance" class="css-radio" value="other" type="radio">
                    <label  class="css-radio-label">Այլ</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-group" style="margin-bottom: 0">
            <div class="checkbox-inline">
                <label>Առաստաղի բարձրություն</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-inline">
                <div class="form-group">
                    <input id="ceiling_height_26" name="celling_height" class="css-radio" value="260" type="radio">
                    <label for="ceiling_height_26" class="css-radio-label">2.6Մ</label>
                </div>
                <div class="form-group">
                    <input id="ceiling_height_28" name="celling_height" class="css-radio" type="radio" value="280" checked="checked">
                    <label for="ceiling_height_28" class="css-radio-label">2.8Մ</label>
                </div>
                <div class="form-group">
                    <input id="ceiling_height_30" name="celling_height" class="css-radio" value="300" type="radio">
                    <label for="ceiling_height_30" class="css-radio-label">3.0Մ</label>
                </div>
                <div class="form-group">
                    <input id="ceiling_height_32" name="celling_height" class="css-radio" value="320" type="radio">
                    <label for="ceiling_height_32" class="css-radio-label">3.2Մ</label>
                </div>
                <div class="form-group">
                    <input id="ceiling_height_38" name="celling_height" class="css-radio" value="380" type="radio">
                    <label for="ceiling_height_38" class="css-radio-label">3.8Մ</label>
                </div>
                <div class="form-group">
                    <input id="ceiling_height_50" name="celling_height" class="css-radio" value="500" type="radio">
                    <label for="ceiling_height_50" class="css-radio-label">5Մ+</label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-group" style="margin-bottom: 0">
            <div class="checkbox-inline">
                <label>Վիճակը</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-inline">
                <div class="form-group">
                    <input  name="condition" class="css-radio" value="excelient" type="radio">
                    <label  class="css-radio-label">Վերանորոգված</label>
                </div>
                <div class="form-group">
                    <input  name="condition" class="css-radio" value="good" type="radio" checked="checked">
                    <label  class="css-radio-label">Լավ</label>
                </div>
                <div class="form-group">
                    <input  name="condition" class="css-radio" value="zero" type="radio">
                    <label  class="css-radio-label">Զրոյական</label>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="form-group" style="margin-bottom: 0">
            <div class="checkbox-inline">
                <label>Կոմունալ հարմարություններ</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-inline">
                <ul>
                    <li><div class="form-inline">
                            <div class="form-group">
                                <input  name="comunal[]" class="css-checkbox" value="Heating" type="checkbox">
                                <label  class="css-label">Ջեռուցում</label>
                            </div>
                        </div><div class="form-inline">
                            <div class="form-group">
                                <input  name="comunal[]" class="css-checkbox" value="Natural gas" type="checkbox">
                                <label class="css-label">Գազ</label>
                            </div>
                        </div><div class="form-inline">
                            <div class="form-group">
                                <input  name="comunal[]" class="css-checkbox" value="Hot wather" type="checkbox">
                                <label  class="css-label">Տաք ջուր</label>
                            </div>
                        </div></li><li><div class="form-inline">
                            <div class="form-group">
                                <input  name="comunal[]" class="css-checkbox" value="internet" type="checkbox">
                                <label  class="css-label">Ինտերնետ</label>
                            </div>
                        </div><div class="form-inline">
                            <div class="form-group">
                                <input  name="comunal[]" class="css-checkbox" value="Conditioner" type="checkbox">
                                <label class="css-label">Օդորակիչ</label>
                            </div>
                        </div><div class="form-inline">
                            <div class="form-group">
                                <input  name="comunal[]" class="css-checkbox" value="central Heating" type="checkbox">
                                <label  class="css-label">Կենտրոնացված ջեռուցում</label>
                            </div>
                        </div></li><li><div class="form-inline">
                            <div class="form-group">
                                <input  name="comunal[]" class="css-checkbox" value="Electroenergy" type="checkbox">
                                <label  class="css-label">Էլեկտրոէներգիա</label>
                            </div>
                        </div><div class="form-inline">
                            <div class="form-group">
                                <input  name="comunal[]" class="css-checkbox" value="24/7 wather" type="checkbox">
                                <label  class="css-label">Մշտական ջուր</label>
                            </div>
                        </div><div class="form-inline">
                            <div class="form-group">
                                <input  name="comunal[]" class="css-checkbox" value="drinking water" type="checkbox">
                                <label  class="css-label">Խմելու ջուր</label>
                            </div>
                        </div></li><li><div class="form-inline">
                            <div class="form-group">
                                <input  name="comunal[]" class="css-checkbox" value="Rogman water" type="checkbox">
                                <label  class="css-label">Ոռոգում</label>
                            </div>
                        </div><div class="form-inline">
                            <div class="form-group">
                                <input  name="comunal[]" class="css-checkbox" value="Sewer" type="checkbox">
                                <label  class="css-label">Կոյուղի</label>
                            </div>
                        </div></li> </ul>
            </div>
        </div>
    </div>

    <div class="row additional">
        <div class="form-group">
            <div class="form-group" style="margin-bottom: 0">
                <div class="checkbox-inline">
                    <label>Լրացուցիչ</label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-inline">
                    <ul>
                        <li><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="furniture" type="checkbox">
                                    <label  class="css-label">Կահույք</label>
                                </div>
                            </div>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="equipment" type="checkbox">
                                    <label  class="css-label">Տեխնիկա</label>
                                </div>
                            </div>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="open_balcony" type="checkbox">
                                    <label  class="css-label">Բաց պատշգամբ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input name="additional[]" class="css-checkbox" value="close_balcony" type="checkbox">
                                    <label  class="css-label">Փակ պատշգամբ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Lodja" type="checkbox">
                                    <label  class="css-label">Լոջա</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input name="additional[]" class="css-checkbox" value="elivator" type="checkbox">
                                    <label  class="css-label">Վերելակ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="cellar" type="checkbox">
                                    <label  class="css-label">Նկուղ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="High first floor" type="checkbox">
                                    <label  class="css-label">Բարձր առաջին հարկ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Glove" type="checkbox">
                                    <label  class="css-label">Ձեռնահարկ</label>
                                </div>
                            </div></li><li><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Storage" type="checkbox">
                                    <label  class="css-label">Խորդանոց</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Euro window" type="checkbox">
                                    <label  class="css-label">Եվրոպատուհան</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input id="salik" name="salik" class="css-checkbox" value="board" type="checkbox">
                                    <label for="salik" class="css-label">Սալիկ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Underfloor heating" type="checkbox">
                                    <label  class="css-label">Տաքացվող հատակ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Laminate" type="checkbox">
                                    <label  class="css-label">Լամինատ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Parquet" type="checkbox">
                                    <label  class="css-label">Մանրահատակ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="sunly" type="checkbox">
                                    <label  class="css-label">Արևկող</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Beautiful view" type="checkbox">
                                    <label  class="css-label">Գեղեցիկ տեսարան</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Near the bus station" type="checkbox">
                                    <label  class="css-label">Կանգառի մոտ</label>
                                </div>
                            </div></li><li><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Roadside" type="checkbox">
                                    <label  class="css-label">Ճանապարհամերձ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Garden" type="checkbox">
                                    <label class="css-label">Զբոսայգի</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Playground" type="checkbox">
                                    <label class="css-label">Խաղահրապարակ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="garage" type="checkbox">
                                    <label  class="css-label">Ավտոտնակ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="parking" type="checkbox">
                                    <label  class="css-label">Ավտոհանգրվան</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="security" type="checkbox">
                                    <label  class="css-label">Անվտանգության համակարգ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Cages" type="checkbox">
                                    <label  class="css-label">Վանդակաճաղեր</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Turbocharger" type="checkbox">
                                    <label  class="css-label">Տուրբովառարան</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="fireplace" type="checkbox">
                                    <label  class="css-label">Բուխարի</label>
                                </div>
                            </div></li><li><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Existence of a building" type="checkbox">
                                    <label  class="css-label">Շինության առկայություն</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="gate" type="checkbox">
                                    <label  class="css-label">Դարպաս</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Fence" type="checkbox">
                                    <label  class="css-label">Պարսպապատ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Bilateral" type="checkbox">
                                    <label  class="css-label">Երկկողմանի</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="Iron door" type="checkbox">
                                    <label class="css-label">Երկաթյա դուռ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="pool" type="checkbox">
                                    <label  class="css-label">Լողավազան</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input name="additional[]" class="css-checkbox" value="fitness" type="checkbox">
                                    <label  class="css-label">Մարզասրահ</label>
                                </div>
                            </div><div class="form-inline">
                                <div class="form-group">
                                    <input  name="additional[]" class="css-checkbox" value="sauna" type="checkbox">
                                    <label  class="css-label">Շոգեբաղնիք</label>
                                </div>
                            </div></li> </ul>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>
            </div>
        </div>
        <div class="form-group">
            <input  name="videourl" class="css-checkbox" value="Video url" type="text">
        </div>
        <div class="form-group">
            <input type="text" name="map" value="map"><br/>
        </div>
        <div class="form-group">
            <label for="desc_arm">Հայերեն Նկարագրություն</label>
            <textarea class="form-control" rows="5" id="desc_arm" name="desc_arm"></textarea>
        </div>
        <div class="form-group">
            <label for="desc_eng">Description(eng)</label>
            <textarea class="form-control" rows="5" id="desc_eng" name="desc_eng"></textarea>
        </div>
        <div class="form-group">
            <label for="desc_rus">Description Russian</label>
            <textarea class="form-control" rows="5" id="desc_rus" name="desc_rus"></textarea>
        </div>
        <div class="form-group">
            <label for="other">Other</label>
            <textarea class="form-control" rows="5" id="other" name="other"></textarea>
        </div>

        <div class="form-inline">
            <div class="form-group">
                <input  name="published" class="css-checkbox" value="1" type="checkbox">
                <label  class="css-label">Հրապարակել</label>
            </div>
        </div>
        <div class="form-inline">
            <div class="form-group">
                <input  name="ready_prt" class="css-checkbox" value="1" type="checkbox">
                <label  class="css-label">Պատրաստ է համագործակցության</label>
            </div>
        </div>
    </div>


    <input type="hidden" name="agent" value="{{Auth::user()->id}}">

    <input type="submit" value="Send" >
</form>
</div>
@else


    <script type="text/javascript">
        window.location.replace("{{url('/login')}}");
    </script>

@endif
@endsection
