<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ScoresImport;
use App\Imports\PlayersImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function importExport()
    {
        return view('import');
    }

    public function export()
    {
        return Excel::download(new ExportUsers, 'scores.xlsx');
    }

    public function import()
    {
        Excel::import(new ScoresImport, request()->file('file'));
        return back()->withSuccess('Marks Updated !');
    }

    public function importPlayer()
    {
        Excel::import(new PlayersImport, request()->file('file'));
        return back()->withSuccess('Players Updated !');
    }
}
