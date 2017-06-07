<?php

namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 2017-05-30
 * Time: 4:06 AM
 */

use \App\Http\Controllers\Controller;
use App;

class IndexController extends Controller
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
                                 ->sortByDesc(function($note)
                                    {
                                        return $note->created_at;
                                    });

        return view('home', compact('notes'));
    }


    /**
     * Show the categories page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCategoriesPage()
    {
        $categories = ["Java"     => "java.png",
            "C#"       => "csharp.png",
            "C++"      => "cplus.png",
            "C"        => "c.png",
            "Android"  => "android.png",
            "iOS"      => "ios.png",
            "CSS"      => "css.png",
            "Git"      => "git.png",
            "HTML"     => "html.png",
            "PHP"      => "php.png",
            "Database" => "database.png",
            "Ruby"     => "ruby.png",
            "Python"   => "python.png",
            "Javascript" => "js.png"
        ];

        return view('categories', compact('categories'));
    }
}