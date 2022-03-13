<?php

namespace App\Http\Controllers;

use App\Models\Obatalkes;
use App\Models\Signa;
use App\Models\TransPrescriptions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class PrescriptionController extends Controller
{
    public function index()
    {
        $data = TransPrescriptions::paginate(10);
        $package = Obatalkes::all();
        $package2 = Signa::all();
        return view('precription', compact('data', 'package', 'package2'));
    }

    public function create()
    {
        $package = Obatalkes::all();
        $package2 = Signa::all();
        return view('create_precription', compact('package', 'package2'));
    }

    public function store(Request $request)
    {

        $obat = $request->input('obat');
        $signa = $request->input('signa');
        $qty2 = $request->input('qty2');
        $obat_id = $request->input('obat_id');
        $signa_m_id = $request->input('signa_m_id');
        $qty = $request->input('qty');
        $name = $request->input('name');
        $type2 = $request->input('type2');
        $type = $request->input('type');
        $user_id = Session::get('id');
        $data = new TransPrescriptions();
        foreach ($type as $key => $types) {
            $data->obat_id =  $obat[$key];
            $data->signa_m_id =  $signa[$key];
            $data->qty =  $qty2[$key];
            $data->type =  $type2[$key];
            $data->obat_id =  $obat_id[$key];
            $data->signa_m_id =  $signa_m_id[$key];
            $data->name = $name[$key];
            $data->qty =  $qty[$key];
            $data->type = $types;
            $data->user_id =  $user_id;
            $obatalkes = Obatalkes::where('obatalkes_id', $data->obat_id)->get();
            foreach ($obatalkes as $obatt) {
                $obatt->stok = $obatt->stok - $data->qty;
                $obatt->last_modified_date = Carbon::now();
                if ($data->qty > $obatt->stok) {
                    Session::flash('message', 'prohibited');
                    return back();
                }
                $obatt->save();
            }
        }

        $data->save();
        Session::flash('message', 'insert');
        return redirect()->route('transaction.index');
    }

    public function destroy(Request $request, $id)
    {
        $ids = $request->input('check');
        $alls = $request->input('select-all');
        if ($alls == 0) {
            foreach ($ids as $deletes) {
                $data = TransPrescriptions::where('id', $deletes)->first();
                $data->delete();
            }
        } else if ($alls == 1) {
            $datas = TransPrescriptions::all();
            foreach ($datas as $data) {
                $data->delete();
            }
        }
        Session::flash('message', 'delete');
        return redirect()->route('transaction.index');
    }

    public function pdfTransaction()
    {
        $data = TransPrescriptions::get();
        $pdf = PDF::loadview('report_transaction', ['data' => $data])->setPaper('A4', 'potrait');
        return $pdf->stream();
    }

    public function jsonObat(Request $request)
    {
        //ambil data grade yang dikirim via ajax post
        $value = $request->input('value');
        $datas =  Obatalkes::where('obatalkes_nama', 'LIKE', '%' . $value . '%')->get();
        //Buat variabel untuk menampung tag - tag optionnya
        $lists = "<option value=''>Pilih Obat</option>";
        foreach ($datas as $data) {
            $lists .= "<option value='" . $data->obatalkes_id . "'>" . $data->obatalkes_nama . '-' . $data->stok . "</option>"; //menambahkan tag option ke variabel lists
        }

        //memasukkan variabel lists tadi ke dalam array dengan nama indexnya list_matpel
        $callback = array('list_data' => $lists);

        echo json_encode($callback); //konversi variabel $callback menjadi JSON
    }

    public function jsonSigna(Request $request)
    {
        //ambil data grade yang dikirim via ajax post
        $value = $request->input('value');
        $datas =  Signa::where('signa_nama', 'LIKE', '%' . $value . '%')->get();
        //Buat variabel untuk menampung tag - tag optionnya
        $lists = "<option value=''>Pilih Signa</option>";
        foreach ($datas as $data) {
            $lists .= "<option value='" . $data->signa_id . "'>" . $data->signa_nama . "</option>"; //menambahkan tag option ke variabel lists
        }

        //memasukkan variabel lists tadi ke dalam array dengan nama indexnya list_matpel
        $callback = array('list_data' => $lists);

        echo json_encode($callback); //konversi variabel $callback menjadi JSON
    }
}
