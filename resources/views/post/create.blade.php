@extends('layouts.app')

@section('content')
    <div class="container hcenter pt-md-5 pt-2">
        <form class="w-lg-75" action="/post" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title :</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Messi is the best." value="{{ old('title') }}" required autocomplete="title" autofocus>

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea class="form-control mh-40vh" id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="categorytags">Categories :</label>
                <input type="text" data-role="tagsinput" placeholder="start typing .." id="categorytags" name="categorytags" class="bg-white mb-2 @error('categorytags') is-invalid @enderror" value="{{ old('categorytags') }}" required autocomplete="categorytags"/>

                @error('categorytags')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/createpost.js') }}" defer></script>
@endsection
