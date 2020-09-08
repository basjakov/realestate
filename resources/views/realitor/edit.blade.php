@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <div id="titlebar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h2>Edit user</h2>

                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="{{route('main')}}">Profile</a></li>
                                <li>Edit users</li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">


                <!-- Widget -->
                @include('realitor.leftside')

                <div class="col-md-8">
                    <div class="row">

                    <form method="post" action="{{route('realtor.update',Auth::user()->id)}}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color:red;">{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-8 my-profile">
                            <h4 class="margin-top-0 margin-bottom-30">My Account</h4>

                            <input value="{{Auth::user()->name}}" type="text" name="name">

                            <label>Your Title</label>
                            <input value="{{Auth::user()->lastname}}" type="text" name="lastname">

                            <label>Type</label>
                            <select name="type" >
                                <option value="{{Auth::user()->type}}"><b>{{Auth::user()->type}}</b></option>
                                <option value="agent">Agent</option>
                                <option value="agency">Agency(company)</option>
                            </select>
                            <label>Email</label>
                            <input value="{{Auth::user()->email}}" type="email" name="email">

                            <label>Age</label>
                            <input value="{{Auth::user()->age}}" type="date" name="age">

                            <label>Experience</label>
                            <input value="{{Auth::user()->experience}}" type="text" name="experience">

                            <label>Level</label>
                            <input value="{{Auth::user()->level}}" type="text" name="level">

                            <label>Working_days</label>
                            <input value="{{Auth::user()->working_days}}" type="text" name="working_days">


                            <label>Phone 1</label>
                            <input value="{{Auth::user()->phone_1}}" type="text" name="phone_1">

                            <label>Phone 2</label>
                            <input value="{{Auth::user()->phone_2}}" type="text" name="phone_2">

                            <label><i class="fa fa-facebook-square"></i> Facebook</label>
                            <input value="{{Auth::user()->fb_link}}" type="text">



                            <input type="submit" class="button" value="Edit">
                        </div>

                        <div class="col-md-4">
                            <!-- Avatar -->
                            <div class="edit-profile-photo">
                                <img src="images/agent-02.jpg" alt="">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" class="upload" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                    </div>
                </div>

            </div>
        </div>

    @else
        <script type="text/javascript">
            window.location.replace("{{url('/login')}}");
        </script>

    @endif
@endsection
