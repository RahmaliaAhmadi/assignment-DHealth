<?php

namespace App\Http\Controllers;

use App\Models\Obatalkes;
use App\Models\Signa;
use App\Models\TransPrescriptions;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $data = TransPrescriptions::paginate(10);
        $package = Obatalkes::all();
        $package2 = Signa::all();
        return view('precription',compact('data','package','package2'));
    }

    public function store(Request $request)
    {
        $nik = $request->input('nik');
        $name = $request->input('name');
        $gender = $request->input('gender');
        $place_of_birth = $request->input('place_of_birth');
        $birthday = $request->input('birthday');
        $address = $request->input('address');
        $rt = $request->input('rt');
        $rw = $request->input('rw');
        $ward = $request->input('ward');
        $district = $request->input('district');
        $religion = $request->input('religion');
        $marital_status = $request->input('marital_status');
        $profession = $request->input('profession');
        $citizenship = $request->input('citizenship');
        $valid_until = $request->input('valid_until');
        $data = new TblKtp();
        $data->nik =  $nik;
        $data->name =  $name;
        $data->gender =  $gender;
        $data->place_of_birth =  $place_of_birth;
        $data->birthday =  $birthday;
        $data->address =  $address;
        $data->rt =  $rt;
        $data->rw =  $rw;
        $data->ward =  $ward;
        $data->district =  $district;
        $data->religion =  $religion;
        $data->marital_status =  $marital_status;
        $data->profession =  $profession;
        $data->citizenship =  $citizenship;
        $data->valid_until =  $valid_until;
        $data->save();
        Session::flash('message', 'insert');
        return redirect()->route('data-ktp.index');
    }

    public function edit($id)
    {
        $data = TblKtp::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $nik = $request->input('nik');
        $name = $request->input('name');
        $gender = $request->input('gender');
        $place_of_birth = $request->input('place_of_birth');
        $birthday = $request->input('birthday');
        $address = $request->input('address');
        $rt = $request->input('rt');
        $rw = $request->input('rw');
        $ward = $request->input('ward');
        $district = $request->input('district');
        $religion = $request->input('religion');
        $marital_status = $request->input('marital_status');
        $profession = $request->input('profession');
        $citizenship = $request->input('citizenship');
        $valid_until = $request->input('valid_until');
        $data = TblKtp::find($id);
        $data->nik =  $nik;
        $data->name =  $name;
        $data->gender =  $gender;
        $data->place_of_birth =  $place_of_birth;
        $data->birthday =  $birthday;
        $data->address =  $address;
        $data->rt =  $rt;
        $data->rw =  $rw;
        $data->ward =  $ward;
        $data->district =  $district;
        $data->religion =  $religion;
        $data->marital_status =  $marital_status;
        $data->profession =  $profession;
        $data->citizenship =  $citizenship;
        $data->valid_until =  $valid_until;
        $data->save();
        Session::flash('message', 'update');
        return redirect()->route('data-ktp.index');
    }

    public function destroy(Request $request, $id)
    {
        $ids = $request->input('check');
        $alls = $request->input('select-all');
        if($alls == 0){
            foreach ($ids as $deletes) {
                $data = TblKtp::where('id', $deletes)->first();
                $data->delete();
            }
        }
        else if($alls == 1){
            $datas = TblKtp::all();
            foreach ($datas as $data){
                $data->delete();
            }
        }
        Session::flash('message', 'delete');
        return redirect()->route('data-ktp.index');
    }

    
}

