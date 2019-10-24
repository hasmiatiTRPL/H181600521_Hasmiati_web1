<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriArtikel;

class KategoriArtikelController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relation Mapping)
        $listKategoriArtikel=KategoriArtikel::all(); //select * from kategori_artikel

        return view('kategori_artikel.index', compact('listKategoriArtikel'));
        //return view('kategori_artikel.index')->with('data', $listKategoriArtikel);
    }

    public function show($id){
        //$kategoriArtikel=KategoriArtikel::where('id', $id)->first(); //select  form kategori_artikel where id=$id limit 1
        $kategoriArtikel=KategoriArtikel::find($id);

        if(empty($kategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

        return view('kategori_artikel.show', compact('kategoriArtikel'));
    }

    public function create(){
        return view('kategori_artikel.create');
    }

    public function store(Request $request){
        $input=$request->all();
        KategoriArtikel::create([
            'nama'=>$input['nama'],
            'users_id'=>$input['users_id']
        ]);

        return redirect(route('kategori_artikel.index'));
    }
public function edit($id){
    $kategoriArtikel=KategoriArtikel::find($id);
    

    if(empty($kategoriArtikel)){
        return redirect(route('home'));
    }

    return view('kategori_artikel.edit',compact('kategoriArtikel'));
}

public function update($id,Request $request){
    $kategoriArtikel=KategoriArtikel::find($id);
    $input=$request->all();

    if(empty($kategoriArtikel)){
        return redirect(route('kategori_artikel.index'));
    }

    $kategoriArtikel->update($input);

    return redirect(route('kategori_artikel.index'));
    }

public function destroy($id){
    $kategoriArtikel=KategoriArtikel::find($id);
    

    if(empty($kategoriArtikel)){
        return redirect(route('kategori_artikel.index'));
    }
    
    $kategoriArtikel->delete();
    return redirect(route('kategori_artikel.index'));
}
public function trash(){
    $listKategoriArtikel=KategoriArtikel::onlyTrashed(); //select * from kategori_artikel

    return view('kategori_artikel.index', compact('listKategoriArtikel'));
    //return view('kategori_artikel.index')->with('data', $listKategoriArtikel);
}

    
}

