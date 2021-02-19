<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use DB;
use App\Company;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        return view('company.companies');
    }

    public function getCompanies(Request $req){
        $companies = DB::table('tb_haryalal')
            ->orderBy('list')->get();
        return DataTables::of($companies)
            ->addColumn('action', '<button onclick="up({{$id}})"><img src="' . url('public/images/up.png') . '"></button> <button onclick="down({{$id}})"><img src="' . url('public/images/down.png') . '"></button>')
            ->make(true);
    }

    public function store(Request $req){
        try {
            $company = new Company;
            $company->haryalalName = $req->name;
            $company->list = $this->getLastListNumber();
            $company->save();
            $array = array(
                  'status' => 'success',
                  'msg' => 'Амжилттай нэмлээ!!!'
              );
            return $array;
        } catch (\Exception $e) {
            $array = array(
                  'status' => 'error',
                  'msg' => 'Алдаа гарлаа!!!'
              );
            return $array;
        }
    }

    public function update(Request $req){
        try {
            $company = Company::find($req->companyID);
            $company->haryalalName = $req->name;
            $company->save();
            $array = array(
                  'status' => 'success',
                  'msg' => 'Амжилттай заслаа!!!'
              );
            return $array;
        } catch (\Exception $e) {
            $array = array(
                  'status' => 'error',
                  'msg' => 'Алдаа гарлаа!!!'
              );
            return $array;
        }
    }

    public function delete(Request $req){
        try {
            DB::beginTransaction();
            $company = Company::find($req->id);
            $company->delete();
            $this->minusAfterAction($req->list);
            DB::commit();
            $array = array(
                'status' => 'success',
                'msg' => 'Амжилттай нэмлээ!!!'
            );
            return $array;
        } catch (\Exception $e) {
            DB::rollback();
            $array = array(
                  'status' => 'error',
                  'msg' => 'Алдаа гарлаа!!!'
              );
            return $array;
        }
    }

    public function getLastListNumber(){
        $company = DB::table('tb_haryalal')
            ->orderBy('list', 'DESC')->first();
        return $company->list + 1;
    }

    public function countCompany(){
        $companies = DB::table('tb_haryalal')
            ->get();
        return count($companies);
    }

    public function minusAfterAction($list){
        $nextCompanies = DB::table('tb_haryalal')
            ->where('list', '>', $list)->get();
        foreach ($nextCompanies as $nextCompany) {
            $company = Company::find($nextCompany->id);
            $company->list = $nextCompany->list - 1;
            $company->save();
        }
    }

    public function upCompany(Request $req){
        try {
            DB::beginTransaction();
            $upCompanyRow = DB::table('tb_haryalal')
                ->where('id', '=', $req->id)
                ->first();
            if($upCompanyRow != null){
                if($upCompanyRow->list == 1){
                    $array = array(
                          'status' => 'error',
                          'msg' => 'Дээшлэх боломжгүй!!!'
                      );
                    return $array;
                }
                Company::where(
                    [
                        'list' => $upCompanyRow->list-1
                    ]
                )->update(
                    [
                        'list' => $upCompanyRow->list
                    ]
                );
                $upCompany = Company::find($req->id);
                $upCompany->list = $upCompany->list -1;
                $upCompany->save();
                DB::commit();
                $array = array(
                      'status' => 'success'
                    );
                return $array;
            }
            else{
                $array = array(
                      'status' => 'error',
                      'msg' => 'Алдаа гарлаа!!! Веб мастерт хандана уу!'
                  );
                return $array;
            }
        } catch (\Exception $e) {
            DB::rollback();
            $array = array(
                  'status' => 'error',
                  'msg' => 'Алдаа гарлаа!!! Веб мастерт хандана уу!'
              );
            return $array;
        }
    }

    public function downCompany(Request $req){
        try {
            DB::beginTransaction();
            $downCompanyRow = DB::table('tb_haryalal')
                ->where('id', '=', $req->id)
                ->first();
            if($downCompanyRow != null){
                if($downCompanyRow->list == $this->countCompany()){
                    $array = array(
                          'status' => 'error',
                          'msg' => 'Доошлох боломжгүй!!!'
                      );
                    return $array;
                }
                Company::where(
                    [
                        'list' => $downCompanyRow->list+1
                    ]
                )->update(
                    [
                        'list' => $downCompanyRow->list
                    ]
                );
                $downCompany = Company::find($req->id);
                $downCompany->list = $downCompany->list + 1;
                $downCompany->save();
                DB::commit();
                $array = array(
                      'status' => 'success'
                    );
                return $array;
            }
            else{
                $array = array(
                      'status' => 'error',
                      'msg' => 'Алдаа гарлаа!!! Веб мастерт хандана уу!'
                  );
                return $array;
            }
        } catch (\Exception $e) {
            DB::rollback();
            $array = array(
                  'status' => 'error',
                  'msg' => 'Алдаа гарлаа!!! Веб мастерт хандана уу!'
              );
            return $array;
        }
    }
}
