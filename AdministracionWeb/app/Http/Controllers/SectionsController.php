<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Empresa;
use App\Section;
use App\Post;

use Validator, Redirect, Input, Session;

class SectionsController extends Controller
{
    /*redirecciona según la sección*/
    public function section($id)
    {
        if($id == 1){
            return redirect('/posts');
        }

    	$section = Section::with('paragraphs')->where('id', $id)->get()->first();
        $sections = Section::all();

        if(null !== $section){
            return view('sections.'.$section->link, ['section' => $section, 'sections' => $sections]);
        }else{
            return redirect('/');
        }
    }

    public function posts()
    {
        $posts = Post::orderBy('created_at')->paginate(10);
        $section = Section::with('paragraphs')->where('id', 1)->get()->first();
        $sections = Section::all();

        return view('sections.posts', ['posts' => $posts, 'section' => $section, 'sections' => $sections]);
    }

    /*para la petición ajax que llena el menú guest*/
    public function getSections()
    {
        $sections = Section::orderBy('title')->get();

        return response()->json(
            $sections->toArray()
        );
    }

    /*para la petición ajax que llena el menú guest*/
    public function getSection(Request $request)
    {
        $section = Section::where('id', '=', $request->get('id'))->get();

        return response()->json(
            $section->toArray()
        );
    }

    public function validation()
    {
        $rules = ['title' => 'required'];
        $errors = ['title' => 'Debe completar el t&iacute;tulo de la secci&oacute;n'];
        return Validator::make($request->all(), $rules, $errors);
    }

/**/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::orderBy('title')->get();

        return view('sections.index', ['sections' => $sections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['title' => 'required'];
        $errors = ['title' => 'Debe completar el t&iacute;tulo de la secci&oacute;n'];
        $validator = Validator::make($request->all(), $rules, $errors);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('sections')
                ->withErrors($errors)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();
            
            Section::create($input);

            Session::flash('flash_message', 'Nueva secci&oacute;n guardada con &eacute;xito!');

            return redirect('/sections');
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
    public function update(Request $request, $id)
    {
        $rules = ['title' => 'required'];
        $errors = ['title' => 'Debe completar el t&iacute;tulo de la secci&oacute;n'];
        $validator = Validator::make($request->all(), $rules, $errors);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('sections')
                ->withErrors($errors)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();
            
            $seccion = Section::findOrFail($id);

            $seccion->fill($input)->save();

            Session::flash('flash_message', 'Secci&oacute;n editada con &eacute;xito!');

            return redirect('/sections');
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
        $section = Section::findOrFail($id);
        $section->delete();
        return redirect('/sections');
    }
}