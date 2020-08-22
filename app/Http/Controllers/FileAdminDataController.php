<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discipline;
use PhpOffice\PhpSpreadsheet\IOFactory;


class FileAdminDataController extends Controller
{
    public function discipline(){
        $nameFile = public_path('/excel_files/disciplina.xlsx');
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        
        $spreadsheet = $reader->load($nameFile);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();

        for ($i=1; $i <= $highestRow; $i++) { 
            
            $acronym = $spreadsheet->getActiveSheet()->getCell('A'.$i)->getValue();
            $name = $spreadsheet->getActiveSheet()->getCell('B'.$i)->getValue();

            $discipline = new Discipline;
            $discipline->acronym_discipline = $acronym;
            $discipline->name = $name;
            $discipline->save();
        }
        return view('admin.index', [
            'successfully' => 'Disciplinas adicionadas com sucesso'
        ]); 
    }
}
