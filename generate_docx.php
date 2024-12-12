<?php
// Include the autoloader for Composer
require_once 'vendor/autoload.php';

// Use the TemplateProcessor class from PHPWord
use PhpOffice\PhpWord\TemplateProcessor;

// Path to your updated template document
$templatePath = 'template/Test_Case_Updated.docx'; 

// Create a TemplateProcessor object
$templateProcessor = new TemplateProcessor($templatePath);

// Data input from the user (can come from a form)
$testCycles = [
    [
        'Test_Cycle' => 'Cycle 1',
        'Date_of_Testing' => '2024-12-12',
        'Test_Data_Source' => 'Database Dump v1.2',
        'Test_Cases' => [
            [
                'Test_Case_ID' => '001',
                'Description' => 'Verify login with valid credentials.',
                'Input_Data' => 'username: user1, password: pass1',
                'Expected_Output' => 'Login successful.',
                'Actual_Output' => 'Login successful.',
                'Status' => 'Pass',
                'Notes' => 'No issues.',
            ],

        ],
    ],
];

// Handle multiple test cycles and tables
$cycleIndex = 1; // To differentiate cycles
foreach ($testCycles as $cycle) {
    // Set test cycle placeholders
    $templateProcessor->setValue("Test_Cycle", $cycle['Test_Cycle']);
    $templateProcessor->setValue("Date_of_Testing", $cycle['Date_of_Testing']);
    $templateProcessor->setValue("Test_Data_Source", $cycle['Test_Data_Source']);

    // Clone the table row for each test case in this cycle
    $templateProcessor->cloneRow('Test_Case_ID', count($cycle['Test_Cases']));

    $caseIndex = 1; // To keep track of the test case in this cycle
    foreach ($cycle['Test_Cases'] as $testCase) {
        foreach ($testCase as $key => $value) {
            $templateProcessor->setValue("${key}#{$caseIndex}", $value);
        }
        $caseIndex++;
    }
}

// Define the folder path to save the generated document
$directory = 'uploads/';
$fileName = 'test_case_filled_dynamic.docx';
$filePath = $directory . $fileName;

// Ensure the directory exists, create it if it doesn't
if (!file_exists($directory)) {
    mkdir($directory, 0777, true); // Create folder with write permissions
}

// Save the filled document
$templateProcessor->saveAs($filePath);

// Provide a download link or success message
echo "Document generated successfully. <a href='$filePath' download>Click here to download the filled .docx file</a>";
?>
