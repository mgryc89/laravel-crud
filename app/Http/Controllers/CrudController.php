<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Name;
use App\Category;
use Session;
use Input;
use Storage;

class CrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function file(Request $request)
    {
        // $file = $request->file('image');
        // $filename = 'wczytanyplik.jpg';       
        // $request->file('image')->move('uploads', $filename);

        $files = $request->file('image');
        if ($files !== null ) 
        {
           foreach ($files as $file) 
           {
                $file->move('uploads', $file->getClientOriginalName() );
           }
        }else{
            echo "nie dziala ";
        }

        echo "string";


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $dane = Name::orderBy('id', 'desc')->paginate(4);
        return view('widoki.widok1')->with('dane', $dane);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('widoki.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, array(
                'name'=>'required|max:10',
                'sername'=>'required|max:255',
                'slug' => 'required|alpha_dash|unique:names,slug'
            ));
        //store in the database
        $post = new Name;
        $post->name = $request->name;
        $post->sername = $request->sername;
        $post->slug = $request->slug;
        $post->save();

        Session::flash('alert', 'Imie i nazwisko zosatało dodane do bazy danych!');
        return redirect()->route('crud.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dane = Name::find($id);
        if ($dane) {
            $danespr = true;
        }else {
            $danespr = false;
        }
        return view('widoki.show')->with('dane', $dane)->with('spr', $danespr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dane = Name::find($id);
        $categories = Category::all();
        foreach ($categories as $item) 
        {
            $cats[$item->id] = $item->name;
        }
        return view('widoki.edit')->with('dane', $dane)->with('cats', $cats);
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
        // echo  "update";
        $dane = Name::find($id);

        if ($request->input('slug') == $dane->slug) {
            $this->validate($request, array(
                'name'=>'required',
                'sername'=>'required',
            ));
        }else{
            $this->validate($request, array(
                    'name'=>'required',
                    'sername'=>'required',
                    'slug' => 'required|alpha_dash|unique:names,slug'
                ));    
        }
        
        // $dane->name = $request->input('name');
        $dane->name = $request->name;
        $dane->sername = $request->input('sername');
        $dane->slug = $request->input('slug');
        $dane->category_id = $request->input('category_id');
        $dane->save();

        Session::flash('alert', 'dane zostały zmienione!');

        return redirect()->route('crud.show', $dane->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dane = Name::find($id);
        $dane->delete();

        Session::flash('alert', 'Dane zostały usunięte!');
        return redirect()->route('crud.index');
    }
}
