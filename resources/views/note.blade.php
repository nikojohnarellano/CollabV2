@extends('layouts.app')
@section('content')
    <div id="note-container" class="container-fluid">
        <div class="row" style="margin:auto;">
            <div id="note-title" class="pull-left">
                <h3>
                    {{ $note->question }}
                </h3>
            </div>
            @if($note->owner == Auth::user()->id)
                <!--
                <div class="pull-right" style="margin-top:20px;">
                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" style="vertical-align:middle;" data-caller="note" data-record-id="<?php echo $note; ?>" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fa fa-times fa-lg" aria-hidden="true" ></i>
                    </button>
                </div>
                -->
            @endif
        </div>
        <span>
      Owned by: {{ $note->user->name }}
    </span>
        <hr />
        <p>
        <pre><code> {{ $note->answer }} </code></pre>
        </p>
        <h4>Comments: </h4>
        <div class="post">
            <div class="post-footer">
                <ul class="comments-list">
                    @foreach($note->comments as $comment)
                    <li class="comment">
                        <a class="pull-left" href="#">
                            <img class="avatar"
                                 src="@if(!isset($comment->user->image))
                                        https://ssl.gstatic.com/accounts/ui/avatar_2x.png
                                      @else
                                        {{ $comment->user->image }}
                                      @endif"
                                 alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="user">{{ $comment->user->name }}</h4>
                                <h5 class="time">@php echo date('j M g:i A', strtotime($comment->created_at)); @endphp</h5>
                            </div>
                            <p>@php echo htmlspecialchars($comment->content); @endphp</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <hr />
        <div id="comment-write" class="inner-container">
            <h4>Post a Comment: </h4>
            <form role="form" id="comment-form" method="POST" action="{{ url("/notes/" . $note->id) }}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <textarea rows="4" maxlength="500" id="comment" name="comment" for="comment-form"></textarea>
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection