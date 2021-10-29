<?php

namespace App\Services\Excel\Export;

use App\Models\Series;
use App\Services\Excel\Export\AbstractExportService;



class DeviceExport extends AbstractExportService
{
    private $startLine = 2;

    public function handle()
    {
        $this->preparExcelSheet();
        return $this->download();
    }

    public function preparExcelSheet()
    {
        $this->devicesName();
        $this->brand();
    }

    public function devicesName()
    {
        $this->setCellValue('A1', 'Sr#');
        $this->setBold('A1', 1500);

        $this->setCellValue('B1', 'Brands');
        $this->setBold('B1', 1500);

        $this->setCellValue('C1', 'Models');
        $this->setBold('C1', 1500);

        $this->setCellValue('D1', 'Series');
        $this->setBold('D1', 1500);

        $this->setCellValue('E1', 'Issues');
        $this->setBold('E1', 1500);

        $this->setCellValue('F1', 'Description');
        $this->setBold('F1', 1500);

        $this->setCellValue('G1', 'Price');
        $this->setBold('G1', 1500);
    }

    public function brand()
    {
        $series = Series::all();
        $i=1;
        $currentLine = $this->startLine;
        foreach($series as $serie){
            $this->setCellValue('A'.$currentLine, $i);
            $this->setCellValue('B'.$currentLine, $serie->brand->Name);
            $this->setCellValue('C'.$currentLine, $serie->deviceModel->name);
            $this->setCellValue('D'.$currentLine, $serie->name);
            $this->setCellValue('E'.$currentLine, $serie->issue);
            $this->setCellValue('F'.$currentLine, $serie->description);
            $this->setCellValue('G'.$currentLine, $serie->price);
            $i++;
            $currentLine++;
        }
    }
}