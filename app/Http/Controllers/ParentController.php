<?php

namespace App\Http\Controllers;

use App\Semaine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Enfant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    private function validateAddChild(array $data){
        return Validator::make($data, [
            'prenom' => 'required|regex:/^[a-zA-Z ]+$/|max:255',
            'pseudo' => 'required|string|max:255|unique:enfants,pseudo',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:255',
        ]);
    }



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
        $this->validateAddChild($request->all())->validate();

        $this->createChild($request->all());
        return redirect('tableau_de_bord');
    }

    public function chooseChild(Request $request, $pseudo){

        $enfant = Enfant::where('pseudo', '=', $pseudo)->first();
        $data = array(
            "enfant" => $enfant,
            "semaine" => $enfant->semaines()->orderBy('id','desc')->first()
        );
        return view('enfant', $data);
    }

    public function addRedToken(Request $request, $pseudo){

        $num_semaine = Carbon::now()->weekOfYear;
        $enfant = Enfant::where('pseudo', $pseudo)->first();
        $semaine = $enfant->semaines()->orderBy('id','desc')->first();
        if($semaine != null && $num_semaine == $semaine->num_semaine){
            $semaine->nb_rouge ++;
            $semaine->save();
        } else {
            $semaine = new Semaine();

            $semaine->num_semaine = $num_semaine;
            $semaine->nb_vert = 0;
            $semaine->nb_rouge = 1;
            $semaine->enfant_id = $enfant->id;
            $semaine->parent_id = Auth::id();
            $semaine->save();
        }
        return redirect(url('enfant/'.$enfant->pseudo));

    }

    public function addGreenToken(Request $request,$pseudo){
        $num_semaine = Carbon::now()->weekOfYear;
        $enfant = Enfant::where('pseudo', $pseudo)->first();
        $semaine = $enfant->semaines()->orderBy('id','desc')->first();
        if($semaine != null && $num_semaine == $semaine->num_semaine){
            $semaine->nb_vert ++;
            $semaine->save();
        } else {
            $semaine = new Semaine();

            $semaine->num_semaine = $num_semaine;
            $semaine->nb_vert = 1;
            $semaine->nb_rouge = 0;
            $semaine->enfant_id = $enfant->id;
            $semaine->parent_id = Auth::id();
            $semaine->save();
        }
        return redirect(url('enfant/'.$enfant->pseudo));

    }
}
