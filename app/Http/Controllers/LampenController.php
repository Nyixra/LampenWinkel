<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Producten;
use App\Lamp;
use App\part;
use Illuminate\Http\Request;

class LampenController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex() {
        return view('lampenwinkel', ['producten' => $this->productenOverzicht()]);
    }

    public function productenOverzicht() {
        return Producten::getProducten();
    }

    public function lampenOverzicht(Request $request) {
        return Lamp::getLampen($request->input('productsoort'), $request->input('wattage'))->toJson();
    }

    public function Update($id) {
        $data['lampinfo'] = part::select('partnr','specs','price')->where('partnr','=',$id)->get();
        return view('edit', $data);
    }

    public function store(Request $request){
        part::where('partnr', '=', $request->partnr)->update(['price' => $request->Price]);
        return redirect('/');
    }
}
