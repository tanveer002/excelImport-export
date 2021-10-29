<?php

namespace App\Services\Excel\Import;

use App\Models\User;
use App\Services\Excel\Import\AbstractImportService;
use Illuminate\Http\UploadedFile;

class ImportUser extends AbstractImportService
{
    public function __construct(UploadedFile $file)
    {
       $filename = $this->importFile($file);
       
       parent::__construct(
            $this->getStoragePath($filename)
        );

    }

    public function handle()
    {
        return $this->userData();
    }

    public function userData()
    {
        
        foreach(range(2 , $this->noRows) as $row) {
            
            $userName = $this->getValue('B'.$row);
            $email = $this->getValue('C'.$row);
            $user = User::where('name', $userName)->first();
            $email = User::where('email', $email)->first();
            $user->delete();
            $user = User::create([
                'name' => $userName,
                'email'=> $email,
            ]);
            
        }
        
    }
}