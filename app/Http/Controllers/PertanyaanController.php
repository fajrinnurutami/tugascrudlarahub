<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\PertanyaanModel;
use App\Models\JawabanModel;

class PertanyaanController extends Controller
{   
    public function index(){
        $pertanyaans = PertanyaanModel::get_all();
        return view('crud.pertanyaan', compact('pertanyaans'));
    }

    public function create(){
        return view('crud.form_pertanyaan');
    }

    public function store(Request $request){
        $data = $request->all();
        unset($data["_token"]);
        PertanyaanModel::save($data);
        return redirect('/pertanyaan');
    }

    public function show($id){
        
        $pertanyaan = PertanyaanModel::find_by_id($id);
        $jawabans = JawabanModel::find_by_pertanyaan_id($id);
        return view('crud.detail_jawaban', compact('pertanyaan', 'jawabans'));
    }

    public function edit($id){
        $pertanyaan = PertanyaanModel::find_by_id($id);
        return view ('crud.edit_pertanyaan', compact('pertanyaan', 'id'));
    }

    public function update( Request $request){
        $data = $request->all();
        unset ($data["_token"]);
        unset ($data["_method"]);
        //dd($data);
        PertanyaanModel::update($data );
        return redirect('/pertanyaan');
    }

    public function delete($id){
        PertanyaanModel::delete($id);
        return redirect('/pertanyaan');
    }
}