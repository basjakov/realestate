@extends('layouts.app')
@if (Auth::check())
@section('content')
    <!-- Content
================================================== -->
    <div class="container">
        <div class="row">


            <!-- Widget -->
            @include('realitor.leftside')

            <div class="col-md-8">
                <table class="manage-table responsive-table">

                    <tr>
                        <th><i class="fa fa-file-text"></i> Property</th>
                        <th class="expire-date"><i class="fa fa-calendar"></i> Expiration Date</th>
                        <th></th>
                    </tr>
            @foreach($ancts as $anct)
                    <!-- Item #1 -->
                    <tr>
                        <td class="title-container">

                                <img src="uploads/announcement/{{$anct_images[0]->ancmt_id}}/{{$anct_images[0]->filename}}" alt="">

                            <div class="title">
                                <h4><a href="#">Serene Uptown</a></h4>
                                <span>{{$anct->location}} {{$anct->address}} {{$anct->building}} {{$anct->apt}}</span>
                                <span class="table-property-price">{{$anct->currency}}|{{$anct->price}}</span>
                                <span class="table-property-price">{{$anct->currency}} {{$anct->price_sqm}} Ք․Մ</span>
                            </div>
                        </td>
                        <td class="expire-date">{{$anct->created_at}}</td>
                        <td class="action">
                            <a href="#"><i class="fa fa-pencil"></i> Edit</a>

                            @if ( $anct->published == 1)
                                <a href="{{route("hideanct",$anct->id)}}"><i class="fa  fa-eye-slash"></i> Hide</a>
                            @else
                                 <a href="{{route('publishanct',$anct->id)}}" style="color:red;"><i class="fas fa-allergies" ></i>Show</a>
                            @endif
                            <form action="{{route('announcement.destroy',$anct->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete" style="border:none;background:none;"><i class="fa fa-remove"></i> Delete</button>
                            </form>

                        </td>
                    </tr>
            @endforeach
                    </tr>

                </table>
                <a href="{{route('announcement.create')}}" class="margin-top-40 button">Ավելացնել նոր անշարժ գույք</a>
            </div>

        </div>
    </div>
@endsection
@else
    <script type="text/javascript">
        window.location.replace("{{url('/login')}}");
    </script>

@endif
