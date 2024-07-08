<?php
// Include necessary files and initialize database connection
include 'conn.php';
require 'vendor/autoload.php'; // Include PHPExcel library (or PhpSpreadsheet library for newer versions)

// Create new PHPExcel object (or PhpSpreadsheet object)
$objPHPExcel = new PHPExcel(); // or new \PhpOffice\PhpSpreadsheet\Spreadsheet();

// Set properties for Excel file
$objPHPExcel->getProperties()->setCreator("Your Name")
                             ->setLastModifiedBy("Your Name")
                             ->setTitle("Complaints Report")
                             ->setSubject("Complaints Data")
                             ->setDescription("Report generated from Complaints System")
                             ->setKeywords("complaints report excel")
                             ->setCategory("Complaints Data");

// Add data to Excel sheet
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Faculty Name')
            ->setCellValue('B1', 'Caption')
            ->setCellValue('C1', 'Hall')
            ->setCellValue('D1', 'Details');

// Fetch data based on form inputs (Modify this part accordingly)
$sql = "SELECT sname, capt, hall, details FROM complaint";
$result = $conn->query($sql);
$rowIndex = 2; // Start from row 2 for data
if ($result !== false && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$rowIndex, $row['sname']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$rowIndex, $row['capt']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$rowIndex, $row['hall']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$rowIndex, $row['details']);
        $rowIndex++;
    }
}

// Set headers for download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="complaints_report.xls"');
header('Cache-Control: max-age=0');

// Write Excel file to PHP output
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
