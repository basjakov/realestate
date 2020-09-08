@extends('layouts.app')
@section('content')
    @if (Auth::check())

    @else
        <script type="text/javascript">
            window.location.replace("{{url('/login')}}");
        </script>

    @endif
@endsection
