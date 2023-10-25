<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::with('pasien', 'doctor')->get();
        return view('list-record', ['records' => $records]);
    }
}
