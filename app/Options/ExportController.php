<?php
namespace App\Options;

use App\Listeners\Export\ExcelExportListener;
use App\Listeners\Export\PDFExportListener;

class ExportController{
    public static $exports = [
        'pdf' => PDFExportListener::class,
        'excel' => ExcelExportListener::class
    ];

    public static function export($query, $model, $export){
        if(!array_key_exists($export, self::$exports) || !property_exists($model, strtolower($export) . '_export')) return;
        $exportClass = new self::$exports[$export]();
        $ref = new \ReflectionClass($model);
        return $exportClass->run($query , $ref->getProperty(strtolower($export) . '_export')->getValue(new $model) , $model);
    }
}