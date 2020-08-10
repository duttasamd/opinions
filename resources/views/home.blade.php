@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="landing">
    <div class="container">
        <div class="aligncenter">
            <form action="" autocomplete="off" class="form-horizontal w-lg-75" method="post" accept-charset="utf-8">
                <div class="input-group">
                    <input id="txtSearch" name="txtSearch" placeholder="Android vs iOS" class="form-control" type="text">
                    <div id="autocompletelist"></div>
                    <span class="input-group-append">
                   <button class="btn btn-success" type="submit" id="btnSearch">
                       Search
                   </button>
                </span>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="explore">
    Explore
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/home.js') }}" defer></script>
@endsection
