<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Excel\Export\DeviceExport;
use App\Services\Excel\Import\DeviceImport;

class DeviceExportController extends Controller
{
    public function deviceExport()
    {
        $deviceExport = new DeviceExport();
        return $deviceExport->handle();
    }

    public function deviceImport(Request $request)
    {
        $file = $request->file('csv_file');
        $deviceImport = new DeviceImport($file);
        $deviceImport->handle();

        return redirect()->back();
    }
    
}
