<?php
require 'vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;
use Mpdf\Mpdf;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $test_case_title = htmlspecialchars(trim($_POST['test_case_title']));
    $test_cycle = htmlspecialchars(trim($_POST['test_cycle']));
    $date_of_testing = htmlspecialchars(trim($_POST['date_of_testing']));
    $test_data_source = htmlspecialchars(trim($_POST['test_data_source']));
    $module_of_screen = htmlspecialchars(trim($_POST['module_of_screen']));
    $objectives = htmlspecialchars(trim($_POST['objectives']));

    // Check if output_format is set
    if (isset($_POST['output_format'])) {
        $output_format = htmlspecialchars(trim($_POST['output_format']));
    } else {
        echo "Output format is not selected.";
        exit();
    }

    if (isset($_POST['test_cases'])) {
        $test_cases = $_POST['test_cases'];
    } else {
        $test_cases = [];
    }

    // Specify the custom Downloads directory path
    $downloadsDir = 'C:\\Users\\Ennie Ibaraki\\Downloads\\dito';

    // Ensure the directory exists
    if (!is_dir($downloadsDir)) {
        mkdir($downloadsDir, 0777, true);
    }

    // Load the template file
    $templatePath = 'template\\Test_Case_Updated.docx'; // Update to the correct path
    $templateProcessor = new TemplateProcessor($templatePath);

    // Populate the template with data
    $templateProcessor->setValue('Fullname', $fullname);
    $templateProcessor->setValue('Test_Case_Title', $test_case_title);
    $templateProcessor->setValue('test_cycle', $test_cycle);
    $templateProcessor->setValue('date_of_testing', $date_of_testing);
    $templateProcessor->setValue('test_data_source', $test_data_source);
    $templateProcessor->setValue('Module_of_Screen', $module_of_screen);
    $templateProcessor->setValue('Objectives', $objectives);

    // Clone rows in the table
    $templateProcessor->cloneRow('test_case_id', count($test_cases));

foreach ($test_cases as $index => $test_case) {  
    $rowIndex = $index + 1; // Adjust row index accordingly  

    // Setting values; ensure these match what is in your template  
    $templateProcessor->setValue("test_case_id#$rowIndex", htmlspecialchars(trim($test_case['test_case_id'])));  
    $templateProcessor->setValue("description#$rowIndex", htmlspecialchars(trim($test_case['description'])));  
    $templateProcessor->setValue("input_data#$rowIndex", htmlspecialchars(trim($test_case['input_data'])));  
    $templateProcessor->setValue("expected_output#$rowIndex", htmlspecialchars(trim($test_case['expected_output'])));  
    $templateProcessor->setValue("actual_output#$rowIndex", htmlspecialchars(trim($test_case['actual_output'])));  
    $templateProcessor->setValue("status#$rowIndex", htmlspecialchars(trim($test_case['status'])));  
    $templateProcessor->setValue("notes#$rowIndex", htmlspecialchars(trim($test_case['notes'])));  
}

    $file_name = 'test_case_document_' . date('Y_m_d_H_i_s') . '.docx';
    $file_path = $downloadsDir . DIRECTORY_SEPARATOR . $file_name;

    if ($output_format === 'docx') {
        // Save the populated template as a new document
        $templateProcessor->saveAs($file_path);
        echo "Document saved to: " . $file_path;

    } elseif ($output_format === 'pdf') {
        // Save the populated template as a temporary docx file
        $tempDocxPath = $downloadsDir . DIRECTORY_SEPARATOR . 'temp_' . $file_name;
        $templateProcessor->saveAs($tempDocxPath);

        // Convert the temporary docx file to PDF using mPDF
        $mpdf = new Mpdf();
        $mpdf->WriteHTML(file_get_contents($tempDocxPath));

        $pdf_file_name = 'test_case_document_' . date('Y_m_d_H_i_s') . '.pdf';
        $pdf_file_path = $downloadsDir . DIRECTORY_SEPARATOR . $pdf_file_name;

        $mpdf->Output($pdf_file_path, \Mpdf\Output\Destination::FILE);
        echo "Document saved to: " . $pdf_file_path;

        // Remove the temporary docx file
        unlink($tempDocxPath);
    }
}
?>
