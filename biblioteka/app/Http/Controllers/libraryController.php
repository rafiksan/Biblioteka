<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\books;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class libraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = \App\books::all();

        foreach($books as $b)
        {
            if(strlen($b->title) > 10)
            {
                $b->title = substr($b->title, 0, 10).'...';

            }
        }

        return view('home',['books' => $books ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'author' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
        {
            return redirect('create')->withErrors($validator->errors());;
        }
        else {
            $book = new books();
            $book->title = $request->title;
            $book->author = $request->author;
            $book->save();

            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
       $book = \App\books::where('id',$id)->get();

        return view('edit', ['book'=> isset($book) ? $book : '']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'title' => 'required',
            'author' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
        {
            return redirect('create')->withErrors($validator->errors());;
        }
        else {
            $book = \App\books::find($id);
            $book->title = Input::get('title');
            $book->author = Input::get('author');
            $book->save();

            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = \App\books::where('id',$id);

        $book->delete();

        return redirect('/');
    }
}
