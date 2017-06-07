@extends('layouts.app')

@section('content')
    <div id="my-notes" class="container-fluid">
        <div class="inner-container">
            <h3>My Notes</h3>
            <div class="well note-list">
                @if(isset($notes) && count($notes) > 0)
                    @foreach($notes as $note)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <a href="/notes/{{ $note->id }}"> {{ $note->question }} </a>
                            </div>
                            <!--
                            <div class="pull-right">
                                <button class="icon-button" type="button" id="menu1" data-record-id="" data-caller="dashboard" data-toggle="modal" data-target="#">
                                    <i class="fa fa-times fa-1x" aria-hidden="true" style="color:#337ab7;"></i>
                                </button>
                            </div>
                            -->
                        </div>
                    </div>
                    <hr/>
                    @endforeach
                @else
                    <h4>(No notes to show.)</h4>
                @endif
            </div>
        </div>
    </div>
@endsection