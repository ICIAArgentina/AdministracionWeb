<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Section;
use App\Paragraph;

use Validator, Redirect, Input, Session;

class ParagraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $section_id = (null !== $request->get('section_id'))? $request->get('section_id') : 0;
        $paragraphs = Paragraph::where('section_id', '=', $section_id)->orderBy('order')->get();
        $sections = Section::pluck('title', 'id');

        return view('paragraphs.index', ['paragraphs' => $paragraphs, 'sections' => $sections, 'section_id' => $section_id]);
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
        $rules = [
            'order' => 'required|numeric',
            'content' => 'required'
        ];
        $errors = [
            'order' => 'Debe completar el orden en que aparecer&aacute el p&acute;rrafo',
            'content' => 'Debe completar el conteido del p&aacute;rrafo'
        ];
        $validator = Validator::make($request->all(), $rules, $errors);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('paragraphs')
                ->withErrors($errors)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();
            
            Paragraph::create($input);

            Session::flash('flash_message', 'Nuevo p&aacute;rrafo guardado con &eacute;xito!');

            return redirect('/paragraphs');
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
        $rules = [
            'order' => 'required|numeric',
            'content' => 'required'
        ];
        $errors = [
            'order' => 'Debe completar el orden en que aparecer&aacute el p&acute;rrafo',
            'content' => 'Debe completar el conteido del p&aacute;rrafo'
        ];
        $validator = Validator::make($request->all(), $rules, $errors);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('paragraphs')
                ->withErrors($errors)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();
            
            $paragraph = Paragraph::findOrFail($id);

            $paragraph->fill($input)->save();

            Session::flash('flash_message', 'P&aacute;rrafo editado con &eacute;xito!');

            return redirect('/paragraphs');
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
        $paragraph = Paragraph::findOrFail($id);
        $paragraph->delete();
        return redirect('/paragraphs');
    }
}
