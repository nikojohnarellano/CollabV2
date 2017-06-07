@extends('layouts.app')

@section('content')
    <div id="my-notes" class="container-fluid">
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