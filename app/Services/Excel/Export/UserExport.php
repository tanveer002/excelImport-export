<?php

namespace App\Services\Excel\Export;

use App\Models\User;
use App\Services\Excel\Export\AbstractExportService;

class UserExport extends AbstractExportService
{
    private $startLine = 2;

    public function handle()
    {
        $this->prepareExcelSheet(); 
        return $this->download();
    }

    private function prepareExcelSheet()
    {
        $this->users();
    }

    private function users()
    {
        $this->setCellValue('A1', 'User Id');
        $this->setBold('A1', 1500);


        $this->setCellValue('B1', 'User Name');
        $this->setBold('B1', 1500);
        $this->setColumnWidth('B', 20);

        $this->setCellValue('C1', 'User Email');
        $this->setBold('C1', 1500);
        $this->setColumnWidth('C', 40);

        $users = User::all();
        $currentLine = $this->startLine;
        foreach($users as $user)
        {
            $this->setCellValue('A'.$currentLine, $user->id);
            $this->setCellValue('B'.$currentLine, $user->name);
            $this->setCellValue('C'.$currentLine, $user->email);

            $currentLine++;
        }
    }
}