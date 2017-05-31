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
        <hr />
        <div class="inner-container">
            <h3>Post Note</h3>
            <form class="form-collab" id="note-form" method="POST" action="/notes">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="category">Category: </label>
                    <br />
                    <select id="category-select" name="category">
                        <option value="" selected disabled>Please select</option>
                        <option value="Java">Java</option>
                        <option value="C#">C#</option>
                        <option value="C++">C++</option>
                        <option value="C">C</option>
                        <option value="HTML">HTML</option>
                        <option value="CSS">CSS</option>
                        <option value="Javascript">Javascript</option>
                        <option value="PHP">PHP</option>
                        <option value="Git">Git</option>
                        <option value="Database">Database</option>
                        <option value="iOS">iOS</option>
                        <option value="Ruby">Ruby</option>
                        <option value="Python">Python</option>
                    </select>
                </div>

                <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                    @if ($errors->has('question'))
                        <span class="help-block">
                            <strong>{{ $errors->first('question') }}</strong>
                        </span>
                    @endif
                    <label for="question">Title: </label>
                    <br />
                    <textarea class="title-text" maxlength="500" id="question" name="question" for="note-form"></textarea>
                </div>
                <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                    @if ($errors->has('answer'))
                        <span class="help-block">
                            <strong>{{ $errors->first('answer') }}</strong>
                        </span>
                    @endif
                    <label for="answer">Note: </label>
                    <br />
                    <textarea class="note-text" maxlength="5000" id="answer" name="answer" for="note-form"></textarea>
                </div>
                <button id="submit-post" class="btn btn-primary btn-primary" type='submit' name='submit-post'>Post</button>
            </form>
        </div>
    </div>
@endsection