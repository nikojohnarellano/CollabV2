<?php

/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 2017-05-29
 * Time: 3:01 AM
 */
namespace App\Repository\Instance;


use App\Note;

class NoteRepository
{
    public function selectAll()
    {
        return Note::all();
    }

    public function find($id)
    {
        return Note::find($id);
    }

    public function selectNotesPerCategory($category)
    {
        return Note::where('category', '=', $category)->get();
    }

    public function selectNotesFromSearch($search)
    {
        return Note::where('category', 'like', '%' . $search . '%' )
                    ->orWhere('question', 'like', '%' . $search . '%')
                    ->orWhere('answer', 'like', '%' . $search . '%')
                    ->get();
    }
}