<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class JawabanModel {
    //menampilkan semua data
    //public static function get_all(){
    //    $items = DB::table('jawabans')->get();
     //   return $items;
    //}


    //menyimpan data
    public static function save($data) {
        //membuang data token
        unset($data["_token"]);
        $new_item = DB::table('jawabans')->insert($data);
        return $new_item;
    }

    public static function find_by_pertanyaan_id($id_pertanyaan){
        $items = DB::table('jawabans')->where('pertanyaan_id', $id_pertanyaan)->get();
        return $items;
    }
}

?>