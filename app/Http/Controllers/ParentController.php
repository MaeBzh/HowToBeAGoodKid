<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enfant;
use  Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            "enfants" => Auth::user()->enfants()->get()
        );
        return view('tableauDeBord', $data);
    }

    public function showFormAddChild(){

        return view('addChild');
    }

    /*private function validateAddChild(array $data){
        return Validator::make($data, [
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:255',
        ]);
    }*/



    public function createChild(array $data)
    {
        return Enfant::create([
            'prenom' => $data['prenom'],
            'pseudo' => $data['pseudo'],
            'date_naissance' => $data['date_naissance'],
            'sexe' => $data['sexe'],
            'parent_id' => Auth::id(),
        ]);
    }

    public function addChild(Request $request){
        //$this->validateAddChild($request->all())->validate();

        $this->createChild($request->all());
        return redirect('tableau_de_bord');
    }

    public function chooseChild(Request $request, $pseudo){

        $enfant = Enfant::where('pseudo', '=', $pseudo)->first();
        $data = array(
            "enfant" => $enfant,
            "semaine" => $enfant->jetons()->orderBy('id','desc')->first()
        );
        return view('enfant', $data);
    }

    public function addRedToken(){

    }

    public function addGreenToken(){

    }
}
