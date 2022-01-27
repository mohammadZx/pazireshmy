<?php

namespace App\Listeners\Export;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\Excel\Facades\Excel;
class ExcelExportListener
{
   public function run($query, $export, $model = null){
      $name = $model ? (new $model)->getTable() : '';
     return Excel::download(new $export($query) , 'export-'. $name . '-' . \Verta::now()->format('Y-m-d') .'.xlsx');
   }
}
