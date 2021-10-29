<?php

namespace App\Services\Excel\Import;

use App\Models\Brand;
use App\Models\Models;
use App\Models\Series;
use Illuminate\Http\UploadedFile;
use App\Services\Excel\Import\AbstractImportService;


class DeviceImport extends AbstractImportService
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
        return $this->brand();
    }

    public function brand()
    {
        Brand::truncate();
        Models::truncate();
        Series::truncate();

        foreach(range(2 , $this->noRows) as $row) {
            //get Cell Value from sheet
            $brandName = $this->getValue('B'.$row);
            $modelName = $this->getValue('C'.$row);
            $seriesName = $this->getValue('D'.$row);
            $issueName = $this->getValue('E'.$row);
            $desName = $this->getValue('F'.$row);
            $priceName = $this->getValue('G'.$row);
            // dd($brandName);

            ///Add Brand
            $brand = Brand::where('Name',$brandName)->first();
            if(!$brand){
                Brand::create([
                    'Name' => $brandName
                ]);
            }

            ///Add Models
            $brands = Brand::where('Name', $brandName)->get();
            $model = Models::where('name',$modelName)->first();
            foreach($brands as $brand){
            
                if(!$model){
                Models::create([
                    'brand_id' => $brand->id,
                    'name' => $modelName
                ]);
            }

            ///Add Series
            // $brands = Brand::where('Name', $brandName)->get();
             $models = Models::where('name',$modelName)->get();
             $serie = Series::where('name',$seriesName)->first();

             foreach($models as $model){
                
                if(!$serie){
                    Series::create([
                        'brand_id' => $model->brand_id,
                        'model_id' => $model->id,
                        'name' => $seriesName,
                        'issue' => $issueName,
                        'description' => $desName,
                        'price' => $priceName
                    ]);
                }  
             }
            
            
        }

            
        }
    }
}