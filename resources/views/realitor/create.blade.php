@extends('layouts.app')
@section('content')
<form action="{{route('realtor.store')}}" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <input type="text" name="name" placeholder="name">
  <input type="text" name="lastname" placeholder="lastname">
  <select name="type">
    <option value="agent">Անհատ Գործակալ</option>
    <option value="company">Գործակալություն</option>
  </select>
  <input type="email" name="email" placeholder="email">
  <input type="password" name="password" placeholder="password">
  <label>Age</label>
  <input type="date" name="age">
  <input type="text" name="experience" placeholder="experience">
  <input type="text" name="level" placeholder="level">
  <input type="text" name="working_days" placeholder="working_days">
  <input type="text" name="phone_1" placeholder="phone_1">
  <input type="text" name="phone_2" placeholder="phone_2">
  <input type="text" name="fb_link" placeholder="fb_link">
     @include('layouts.region')
     <div class="form-group">
        <input type="file" name="image" class="form-control" >
    </div>
  <input type="text" name="distributor" placeholder="distributor">
  <input type="submit" value="Register">

</form>
@endsection
