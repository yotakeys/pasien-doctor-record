<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Pasien;
use App\Models\Doctor;
use Illuminate\Support\Str;

class RecordController extends Controller
{
    public function index(Request $request)
    {
        $doctor = Doctor::all();
        $pasien = Pasien::all();

        if ($request->has('pasien_id') && $request->has('doctor_id')) {
            $records = Record::with('pasien', 'doctor')->where('pasien_id', $request->pasien_id)->where('doctor_id', $request->doctor_id)->get();
            return view('list-record', ['records' => $records, 'doctor' => $doctor, 'pasien' => $pasien]);
        } else if ($request->has('pasien_id')) {
            $records = Record::with('pasien', 'doctor')->where('pasien_id', $request->pasien_id)->get();
            return view('list-record', ['records' => $records, 'doctor' => $doctor, 'pasien' => $pasien]);
        } else if ($request->has('doctor_id')) {
            $records = Record::with('pasien', 'doctor')->where('doctor_id', $request->doctor_id)->get();
            return view('list-record', ['records' => $records, 'doctor' => $doctor, 'pasien' => $pasien]);
        } else {
            $records = Record::with('pasien', 'doctor')->get();
            return view('list-record', ['records' => $records, 'doctor' => $doctor, 'pasien' => $pasien]);
        }
    }

    public function getForm()
    {
        $pasien = Pasien::all();
        $doctor = Doctor::all();
        return view('form-record', ['pasien' => $pasien, 'doctor' => $doctor]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'kondisi' => 'required',
                'pasien_id' => 'required',
                'doctor_id' => 'required',
                'suhu' => 'required|numeric|between:35,45.5',
                'resep' => 'required|mimes:jpeg,png,jpg,pdf|max:4096',
            ]
        );
        $str_rand = Str::random(20);
        $file_name = "{$str_rand}-{$request->resep->getClientOriginalName()}";
        $request->resep->storeAs('public/images', $file_name);

        Record::create(
            [
                'kondisi' => $request->kondisi,
                'pasien_id' => $request->pasien_id,
                'doctor_id' => $request->doctor_id,
                'suhu' => $request->suhu,
                'resep_url' => "storage/images/{$file_name}",
            ]
        );


        return redirect()->route('form-record.get')->with(['status' => 'record-added']);
    }
}
