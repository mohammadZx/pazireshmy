<?php

namespace App\Listeners\Export;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
class PDFExportListener
{
   public function run($query, $export, $model = null){
    return view($export, ['data' => $query]);
   }
}
