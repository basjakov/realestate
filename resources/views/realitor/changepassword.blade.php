@extends('layouts.app')
@if (Auth::check())
@section('content')
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Change Password</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Change Password</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    @include('realitor.leftside')
    <!-- Titlebar
================================================== -->

    <!-- Content
================================================== -->
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6  my-profile">
                        <h4 class="margin-top-0 margin-bottom-30">Change Password</h4>
                       <form action="{{route('changepassword',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
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

                        <label>Current Password</label>
                        <input type="password" name="oldpassword">

                        <label>New Password</label>
                        <input type="password" name="newpassword">

                        <label>Confirm New Password</label>
                        <input type="password" name="password_confirmation" >

                        <input type="submit" class="margin-top-20 margin-bottom-20 button" value="Save Changes">
                       </form>
                    </div>

                    <div class="col-md-6">
                        <div class="notification notice">
                            <p>Your password should be at least 12 random characters long to be safe</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
@else
    <script type="text/javascript">
        window.location.replace("{{url('/login')}}");
    </script>
@endif
