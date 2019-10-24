<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\KategoriBerita;

class BeritaController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relation Mapping)
        $listBerita=Berita::all(); //select * from berita

        return view('berita.index', compact('listBerita'));
        //return view('berita.index')->with('data', $listBerita);
    }

    public function show($id){
        //$Berita=Berita::where('id', $id)->first(); //select  form berita where id=$id limit 1
        $Berita=Berita::find($id);

        if(empty($Berita)){
            return redirect(route('berita.index'));
        }

        return view('berita.show', compact('Berita'));
    }
    public function create(){

        $kategoriBerita= KategoriBerita::pluck('nama', 'id');
        

        return view('berita.create',compact('kategoriBerita'));
    }

    public function store(Request $request){
        $input=$request->all();

        Berita::create($input);

        return redirect(route('berita.index'));
    }

    public function edit($id){
        $Berita=Berita::find($id);
        $kategoriBerita= KategoriBerita::pluck('nama', 'id');
    
        if(empty($Berita)){
            return redirect(route('home'));
        }
    
        return view('berita.edit',compact('Berita','kategoriBerita'));
    }
    
    public function update($id,Request $request){
        $Berita=Berita::find($id);
        $input=$request->all();
    
        if(empty($Berita)){
            return redirect(route('berita.index'));
        }
    
        $Berita->update($input);
    
        return redirect(route('berita.index'));
    }

    public function destroy($id){
        $Berita=Berita::find($id);
        
    
        if(empty($Berita)){
            return redirect(route('berita.index'));
        }
        
        $Berita->delete();
        return redirect(route('berita.index'));
    }

    public function trash(){
        $listBerita=Berita::onlyTrashed(); //select * from berita
    
        return view('berita.index', compact('listBerita'));
        //return view('berita.index')->with('data', $listBerita);
    }
}

