<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Empresa;
use App\Section;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcome()
    {
        $empresa = Empresa::findOrFail(1);

    	return view('welcome', ['empresa' => $empresa]);
    }

    public function home(){
    	return view('home');
    }

    public function imagenes_portada()
    {
    	return view('imagenes.portada');
    }
}
