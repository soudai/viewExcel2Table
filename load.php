<?php

$config = parse_ini_file('../config.ini');
extract($config);
try {
    $excel_data = get_excel_data($excel_folder_path);
} catch (Exception $exc) {
    echo $exc->getMessage();
    die('システムエラーだお(´・ω・｀)');
}

function get_excel_data($excel_folder_path)
{
    include '../Classes/PHPExcel.php';
    include '../Classes/PHPExcel/IOFactory.php';

    $xlsReader = PHPExcel_IOFactory::createReader('Excel2007');
    $xlsObject = $xlsReader->load($excel_folder_path);
    return excel_to_array($xlsObject);
}

function excel_to_array($xlsObject)
{
    $sheet_count = $xlsObject->getSheetCount();
    for ($i = 0; $i < $sheet_count; $i++) {
        $xlsObject->setActiveSheetIndex($i);
        $xlsSheet = $xlsObject->getActiveSheet();
        $sheetTitle = $xlsSheet->getTitle();
        #-- シートの行ごとに読んでいく
        foreach ($xlsSheet->getRowIterator() as $row_num => $row) {
            $xlsCell = $row->getCellIterator();
            $xlsCell->setIterateOnlyExistingCells(true);
            #-- 行のセルごとに読んでいく
            foreach ($xlsCell as $column_num => $cell) {
                #-- 「シート名・行番号・セル番号」の連想配列にセル内のデータを格納
                $data[$sheetTitle][$row_num][$column_num] = $cell->getCalculatedValue();
            }
        }
    }
    return $data;
}

function get_header($sheet)
{
    global $view_column_number_list;
    $header_list = array_shift($sheet);
    foreach ($view_column_number_list as $view_column_number) {
        $header[] = "<th>{$header_list[$view_column_number]}</th>";
    }
    return implode(PHP_EOL, $header);
}

function get_body($sheet)
{
    global $view_column_number_list;
    //headerを削除
    array_shift($sheet);
    $callback = function ($record) use ($view_column_number_list) {
        $tmp_body[] = "<tr>";
        foreach ($view_column_number_list as $view_column_number) {
            $tmp_body[] = "<td>{$record[$view_column_number]}</td>";
        }
        $tmp_body[] = "</tr>";

        return implode(PHP_EOL, $tmp_body);
    };
    return implode(PHP_EOL, array_map($callback, $sheet));
}
