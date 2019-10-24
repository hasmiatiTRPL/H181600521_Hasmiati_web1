<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\KategoriArtikel;

class ArtikelController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relation Mapping)
        $listArtikel=Artikel::all(); //select * from artikel

        return view('artikel.index', compact('listArtikel'));
        //return view('artikel.index')->with('data', $listArtikel);
    }

    public function show($id){
        //$Artikel=Artikel::where('id', $id)->first(); //select  form artikel where id=$id limit 1
        $Artikel=Artikel::find($id);

        if(empty($Artikel)){
            return redirect(route('artikel.index'));
        }

        return view('artikel.show', compact('Artikel'));
    }
    public function create(){

        $kategoriArtikel= KategoriArtikel::pluck('nama', 'id');
        

        return view('artikel.create',compact('kategoriArtikel'));
    }

    public function store(Request $request){
        $input=$request->all();

        Artikel::create($input);

        return redirect(route('artikel.index'));
    }

    public function edit($id){
        $Artikel=Artikel::find($id);
        $kategoriArtikel= KategoriArtikel::pluck('nama', 'id');
    
        if(empty($Artikel)){
            return redirect(route('home'));
        }
    
        return view('artikel.edit',compact('Artikel','kategoriArtikel'));
    }
    
    public function update($id,Request $request){
        $Artikel=Artikel::find($id);
        $input=$request->all();
    
        if(empty($Artikel)){
            return redirect(route('artikel.index'));
        }
    
        $Artikel->update($input);
    
        return redirect(route('artikel.index'));
    }

    public function destroy($id){
        $Artikel=Artikel::find($id);
        
    
        if(empty($Artikel)){
            return redirect(route('artikel.index'));
        }
        
        $Artikel->delete();
        return redirect(route('artikel.index'));
    }

    public function trash(){
        $listArtikel=Artikel::onlyTrashed(); //select * from artikel
    
        return view('artikel.index', compact('listArtikel'));
        //return view('artikel.index')->with('data', $listArtikel);
    }

}

