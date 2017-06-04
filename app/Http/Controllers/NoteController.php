<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Repository\Instance\NoteRepository;
use App\Note;
use App\Comment;
use Auth;
use App;

class NoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->note_repo = App::make('App\Repository\Instance\NoteRepository');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = $this->note_repo->selectAll()
                                 ->sortBy(function($note)
                                 {
                                     return $note->created_at;
                                 });

        return view('home', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notes = $this->note_repo->selectAll()
                                 ->where('owner', '=', Auth::user()->id);

        return view('my-notes', compact('notes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'bail|required',
            'answer'   => 'required',
            'category' => 'required'
        ]);

        $note = new Note;

        $note->question = htmlentities($request->question);
        $note->answer   = htmlentities($request->answer);
        $note->category = $request->category;
        $note->owner    = Auth::user()->id;

        $note->save();

        return redirect()->action('NoteController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return view('note', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = new Comment;

        $comment->content  = $request->comment;
        $comment->postedby = Auth::user()->id;
        $comment->noteid   = $note->id;

        $comment->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the categories page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCategoriesPage()
    {
        return view('categories');
    }

    /**
     * Show notes per category page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showNotesPerCategory()
    {
        $category = Input::get("category");

        $notes    = $this->note_repo->selectNotesPerCategory($category);

        return view('category-notes', compact('notes', 'category'));
    }

    /**
     * Show notes per category page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showNotesFromSearch()
    {
        $search = Input::get("search");

        $notes    = $this->note_repo->selectNotesFromSearch($search);
        
        return view('search-notes', compact('notes'));
    }
}
