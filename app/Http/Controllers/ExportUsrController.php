<?php

namespace App\Http\Controllers;

use App\Services\Excel\Export\UserExport;
use App\Services\Excel\Import\ImportUser;
use Illuminate\Http\Request;

class ExportUsrController extends Controller
{
    public function usercsv()
    {
        $userExport = new UserExport();
        return $userExport->handle();
    }

    public function userImport(Request $request)
    {
        $file = $request->file('usercsv');
        $importUsers = new ImportUser($file);
        return $importUsers->handle();
    }
}
