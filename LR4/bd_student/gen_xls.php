<?php
include("check.php");
require_once('PHPExcel/Classes/PHPExcel.php');
require_once('PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');

$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");

// Запрос на выборку сведений о пользователях
$result = $mysqli->query("SELECT
        student.stud_name as stud_name,
        student.stud_faculty as stud_faculty,
        student.stud_group as stud_group,
        student.stud_no_zk as stud_no_zk,
        zach_vedom.vedom_data as vedom_data,
        predm.predm_name as predm_name,
        zach_vedom.ocenka as ocenka,
        predm.prepod_name as prepod_name
        FROM zach_vedom
        LEFT JOIN student ON zach_vedom.id_stud=student.id_stud
        LEFT JOIN predm ON zach_vedom.id_predm=predm.id_predm"
);

$xls = new PHPExcel();
// Устанавливаем индекс активного листа
$xls->setActiveSheetIndex(0);
// Получаем активный лист
$sheet = $xls->getActiveSheet();
// Подписываем лист
$sheet->setTitle('Зачётная ведомость');
// Вставляем текст в ячейку A1
$sheet->setCellValue("A1", 'Зачётная ведомость');
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
// Объединяем ячейки
$sheet->mergeCells('A1:I1');
// Выравнивание текста
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$c = 0;

$header = array("п/п", "ФИО студента", "Факультет", "Группа", "Номер зачётки", "Дата сдачи", "Название предмета", "Оценка", "ФИО преподавателя");
foreach ($header as $h) {
    $sheet->setCellValueByColumnAndRow($c, 2, $h);
    // Применяем выравнивание
    $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
    $c++;
}

if ($result) {
    $r = 3;
    // Для каждой строки из запроса
    while ($row = $result->fetch_row()) {
        $c = 0;

        $sheet->setCellValueByColumnAndRow($c, $r, $r - 2);
        $c++;

        foreach ($row as $cell) {
            $sheet->setCellValueByColumnAndRow($c, $r, $cell);
            $c++;
        }
        $r++;
    }
}

header('Content-Type: application/xls');
header('Content-Disposition: inline; filename=Zach_vedom.xls');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

$objWriter = new PHPExcel_Writer_Excel5($xls);
$objWriter->save('php://output');
?>