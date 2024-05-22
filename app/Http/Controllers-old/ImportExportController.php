<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ScoresImport;
use App\Imports\PlayersImport;
use App\Imports\TeamsImport;
use App\Exports\TeamsExport;
use App\Exports\UsersExport;

use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function importExport()
    {
        return view('import');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'all-users.xlsx');
    }

    public function exportTeams()
    {
        return Excel::download(new TeamsExport, 'all-teams.xlsx');
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

    public function importTeam()
    {
        Excel::import(new TeamsImport, request()->file('file'));
        return back()->withSuccess('Teams Updated !');
    }
}
