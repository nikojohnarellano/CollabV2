@extends('layouts.app')
@section('content')

    <div id="categories-list" class="container-fluid">
        <div id="categories">
            <div class="inner-container">
                <h1>Categories</h1>
                <hr/>

                @php $count = 0; @endphp
                @foreach($categories as $category => $image)
                @if($count % 4 == 0)
                    <div class="row text-center">
                @endif
                    <div class="col-md-3 col-sm-6">
                        <a href="/notes-per-category?category={{ urlencode($category) }}">
                            <div class="thumbnail">
                                <div class="course">
                                    <img height="150" width="150" src="{{ asset("images/" . $image) }}" alt="">
                                </div>
                                <div class="caption">
                                    <h5>{{ $category }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @php $count++ @endphp
                @if($count % 4 === 0 || $count === sizeof($categories))
                    </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection