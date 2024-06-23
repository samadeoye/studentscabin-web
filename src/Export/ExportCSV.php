<?php
namespace StudentsCabin\Export;

class ExportCSV
{
    static $arData = [];
    static $arHeaders = [];
    static $fileName = '';
    static $output;

    public static function exportArray()
    {
        ob_start();
        $output = fopen("php://output",'w') or die("Can't open php://output");
        fputcsv($output, self::$arHeaders);
        
        $arData = self::$arData;
        if (count($arData) > 0)
        {
            foreach ($arData as $r)
            {
                fputcsv($output, $r);
            }

            header('Content-type: application/csv');
            header('Content-Disposition: attachment;filename="' . self::$fileName.'-'.date('Y-m-d h:i:a').'.csv');
            header('Cache-Control: max-age=0');
            header("Expires: 0");
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: cache, must-revalidate');
            header('Pragma: public');
            fpassthru($output);
            fclose($output);
            exit;
        }
    }
}