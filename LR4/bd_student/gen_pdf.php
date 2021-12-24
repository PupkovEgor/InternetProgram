<?
include("check.php");
require_once('tcpdf/tcpdf.php');
//require_once('tcpdf/include/tcpdf_fonts.php');

$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetFont('dejavusans', '', '14');
$pdf->AddPage();

//$pdf->Cell(80);
$pdf->Cell(200, 10, 'Зачётные ведомости', 0, 0, 'C');
$pdf->Ln(20);

$pdf->SetFillColor(200, 200, 200);
$pdf->SetFontSize(6);

$header = array("п/п", "ФИО студента", "Факультет", "Группа", "Номер зачётки", "Дата сдачи", "Название предмета", "Оценка", "ФИО преподавателя");
$w = array(6, 35, 15, 10, 20, 20, 35, 10, 40);
$h = 20;
for ($c = 0; $c < 9; $c++) {
    $pdf->Cell($w[$c], $h, $header[$c], 'LRTB', '0', '', true);
}
$pdf->Ln();

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

if ($result) {
    $counter = 1;
    // Для каждой строки из запроса
    while ($row = $result->fetch_row()) {
        $pdf->Cell($w[0], $h, $counter, 'LRBT', '0', 'C', true);
        $pdf->Cell($w[1], $h, $row[0], 'LRB');

        for ($c = 2; $c < 9; $c++) {
            $pdf->Cell($w[$c], $h, $row[$c - 1], 'RB');
        }
        $pdf->Ln();
        $counter++;
    }
}

$pdf->Output('Zach_vedom.pdf');
?>

?>
