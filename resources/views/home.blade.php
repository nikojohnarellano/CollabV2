@extends('layouts.app')

@section('content')

<div class="">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Notes Feed</h1>
        </div>
    </div>

    @php
        $count = 0;
    @endphp
    @foreach($notes as $note)
        @if($count % 3 == 0)
            <div class="row">
        @endif
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ $note->category }}
                        </div>
                        <div class="panel-body">
                            <p>
                            <a href="/notes/{{ $note->id }}"> {{ $note->question }} </a>
                            </p>
                        </div>
                        <div class="panel-footer">
                            Owned by: {{ $note->user->name }}
                        </div>
                    </div>
                </div>
        @php ++$count; @endphp
        @if($count % 3 === 0 || $count === sizeof($notes))
            </div>
        @endif
    @endforeach
</div>
<script>
    $('.panel').matchHeight();
</script>
@endsection
