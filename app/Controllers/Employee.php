<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeeModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Employee extends BaseController
{
    public function index()
    {
        $employeeModel = new EmployeeModel;
        $data['employees'] = $employeeModel->findAll();

        return view('employee', $data);
    }

    public function export()
    {
        $employeeModel = new EmployeeModel;
        $employees = $employeeModel->findAll();

        $fileName = 'employee.xlsx';  
        
        $spreadsheet = new Spreadsheet();
        
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NAMA LENGKAP');
        $sheet->setCellValue('B1', 'JABATAN');
        $sheet->setCellValue('C1', 'TEMPAT LAHIR');
        $sheet->setCellValue('D1', 'TANGGAL LAHIR');
        
        $rows = 2;
        foreach ($employees as $employee){
            $sheet->setCellValue('A' . $rows, $employee['nama_lengkap']);
            $sheet->setCellValue('B' . $rows, $employee['jabatan']);
            $sheet->setCellValue('C' . $rows, $employee['tempat_lahir']);
            $sheet->setCellValue('D' . $rows, $employee['tgl_lahir']);
            $rows++;
        } 

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=' . $fileName);
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
