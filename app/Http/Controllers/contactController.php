<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\contact;
use Yajra\DataTables\DataTables;

class contactController extends Controller
{
    public function show(){
        $haryalals = DB::table('tb_haryalal')
            ->get();
        return view('contact.contactShow', compact('haryalals'));
    }

    public function getContacts(){
        $contacts = DB::table("tb_contacts")
            ->join('tb_haryalal', 'tb_contacts.haryalal', '=', 'tb_haryalal.id')
            ->leftjoin('tb_heltes', 'tb_contacts.heltes', '=', 'tb_heltes.id')
            ->select('tb_haryalal.haryalalName', 'tb_heltes.heltesName', 'tb_contacts.*')
            ->orderBy('tb_contacts.haryalal', 'ASC')
            ->get();
        return DataTables::of($contacts)
            ->make(true);
    }

    public function getContactsSearch(Request $req){
        $contacts = DB::table("tb_contacts")
            ->join('tb_haryalal', 'tb_contacts.haryalal', '=', 'tb_haryalal.id')
            ->leftjoin('tb_heltes', 'tb_contacts.heltes', '=', 'tb_heltes.id')
            ->select('tb_haryalal.haryalalName', 'tb_heltes.heltesName', 'tb_contacts.*');
            if($req->id > 0){
                $contacts->where('tb_haryalal.id', '=', $req->id);
            }
            $contacts->where('tb_contacts.name', 'like', '%' . $req->name . '%');
            $contacts->orderBy('tb_contacts.haryalal', 'ASC');
            $contacts->get();
        return DataTables::of($contacts)
            ->make(true);
    }
}
