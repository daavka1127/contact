<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\contact;
use Yajra\DataTables\DataTables;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        $haryalals = DB::table('tb_haryalal')
            ->get();
        return view('admin.contactShow', compact('haryalals'));
    }

    public function store(Request $req){
        $contact = new contact;
        $contact->haryalal = $req->haryalal;
        $contact->heltes = $req->heltes;
        $contact->name = $req->name;
        $contact->dats = $req->dats;
        $contact->hats = $req->hats;
        $contact->thats = $req->thats;
        $contact->tuh = $req->tuh;
        $contact->garUtas = $req->garUtas;
        $contact->save();
        return "Амжилттай хадгаллаа.";
    }

    public function update(Request $req){
        $contact = contact::find($req->id);
        $contact->haryalal = $req->haryalal;
        $contact->heltes = $req->heltes;
        $contact->name = $req->name;
        $contact->dats = $req->dats;
        $contact->hats = $req->hats;
        $contact->thats = $req->thats;
        $contact->tuh = $req->tuh;
        $contact->garUtas = $req->garUtas;
        $contact->save();
        return "Амжилттай заслаа";
    }

    public function delete(Request $req){
        $contact = contact::find($req->id);
        $contact->delete();
        return "Амжилттай устгалаа.";
    }
}
