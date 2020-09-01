<?php

namespace App\Http\Controllers;


use App\User;
use App\Career;
use App\Student;
use App\Professor;
use App\Program;
use App\Discipline;
use App\Administrator;
use App\EducationalPlan;
use App\Http\Controllers\EmailController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;



class FileAdminDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function discipline(Request $nameFile){
        $data = $this->configSheet('/excel_files/' . $nameFile['nameFile']);

        try {
            for ($i=1; $i <= $data['highestRow']; $i++) { 
            
                $acronym = $data['spreadsheet']->getActiveSheet()->getCell('A'.$i)->getValue();
                $name = $data['spreadsheet']->getActiveSheet()->getCell('B'.$i)->getValue();
                
                $msg = '"'. $acronym . '" ou "' . $name . '"';

                if(!$acronym && !$name){
                    break;
                } else if(!$acronym){
                    throw new Exception('Acronimo vazio',204);
                } else if(!$name) {
                    throw new Exception('Nome vazio',204);
                } else {
                    Discipline::create(['acronym_discipline'=>$acronym,'name'=>$name]);
                }
            }
        } catch (\Exception $e) {
            if(!isset($msg)){ $msg = null; }
            return $this->reportError('/home',$e,$msg);
        }

        return redirect('/home')->with('successfully', 'Disciplinas adicionadas com sucesso');
    }

    public function career(Request $nameFile){
        $data = $this->configSheet('/excel_files/' . $nameFile['nameFile']);

        try {
            for ($i=1; $i <= $data['highestRow']; $i++) { 
            
                $acronym = $data['spreadsheet']->getActiveSheet()->getCell('A'.$i)->getValue();
                $name = $data['spreadsheet']->getActiveSheet()->getCell('B'.$i)->getValue();
                
                $msg = '"'. $acronym . '" ou "' . $name . '"';

                if(!$acronym && !$name){
                    break;
                } else if(!$acronym){
                    throw new Exception('Acronimo vazio',204);
                } else if(!$name) {
                    throw new Exception('Nome vazio',204);
                } else {
                    Career::create(['acronym_career'=>$acronym,'name'=>$name]);
                }
            }
        } catch (\Exception $e) {
            if(!isset($msg)){ $msg = null; }
            return $this->reportError('/home',$e,$msg);
        }

        return redirect('/home')->with('successfully', 'Cursos adicionados com sucesso');
    }

    public function student(Request $nameFile){
        $data = $this->configSheet('/excel_files/' . $nameFile['nameFile']);

        try {
            for ($i=1; $i <= $data['highestRow']; $i++) { 
            
                $name = $data['spreadsheet']->getActiveSheet()->getCell('A'.$i)->getValue();
                $numberStudent = $data['spreadsheet']->getActiveSheet()->getCell('B'.$i)->getValue();
                $email = $data['spreadsheet']->getActiveSheet()->getCell('C'.$i)->getValue();
                $cardId = $data['spreadsheet']->getActiveSheet()->getCell('D'.$i)->getValue();
                $acronym = $data['spreadsheet']->getActiveSheet()->getCell('E'.$i)->getValue();
                $acronymTwo = $data['spreadsheet']->getActiveSheet()->getCell('F'.$i)->getValue();
                $acronymThree = $data['spreadsheet']->getActiveSheet()->getCell('G'.$i)->getValue();

                $msg = '"'. $numberStudent . '" ou "' . $email . '"';

                if(!$name && !$numberStudent && !$email && !$cardId && !$acronym){
                    break;
                } else if(!$name){
                    throw new Exception('Nome vazio',204);
                } else if(!$numberStudent) {
                    throw new Exception('Numero Estudante vazio',204);
                } else if(!$email) {
                    throw new Exception('Email vazio',204);
                } else if(!$cardId) {
                    throw new Exception('Id Cartão vazio',204);
                } else if(!$acronym) {
                    throw new Exception('Acronimo Curso vazio',204);
                }  else {

                $arrayCareers = ['studentCareer'=>$acronym,'studentCareerTwo'=>$acronymTwo,'studentCareerThree'=> $acronymThree];
                $request = new Request($arrayCareers);
                $validateCareer = $this->validateCareers($request);
                
                    if($validateCareer){
                        $pass = Str::random(9);
                        $user = User::create([
                            'name' => $name,
                            'email' => $email,
                            'password' => Hash::make($pass),
                            'type_user_from_type_users' => 1,
                            'card_id' => $cardId
                        ]);
                        
                        $j = 0;
                        $limitStudents = 30;
                        do {
                            $numStudents = Student::where('students.group', '=', $j)->get();
                            if(count($numStudents) >= $limitStudents){
                                $j++;
                            }
                        } while (count($numStudents) >= $limitStudents);

                        $student = Student::create([
                            'number_student' => $numberStudent,
                            'id_student_from_users' => $user->id,
                            'acronym_career' => strtoupper($acronym),
                            'acronym_career_two' => strtoupper($acronymTwo),
                            'acronym_career_three' => strtoupper($acronymThree),
                            'group' => $j
                        ]);
                        $mail = new EmailController($name,$email,$pass);
                        $resultSendEmail = $mail->sendEmail();
                        if($resultSendEmail !== true){ throw new Exception('Erro no envio do Email com a Senha para o Utilizador'); }    
                    } else {
                        throw new Exception('Verifique os cursos, há um que não existe.');
                    }
                }
            }
        } catch (\Exception $e) {
            if(isset($user)){ 
                $user->delete(); 
            }
            if(isset($student)){
                $student->delete();
            }
            if(!isset($msg)){ $msg = null; }
            return $this->reportError('/home',$e,$msg);
        }

        return redirect('/home')->with('successfully', 'Studantes adicionados com sucesso');
    }

    public function professor(Request $nameFile){
        $data = $this->configSheet('/excel_files/' . $nameFile['nameFile']);

        try {
            for ($i=1; $i <= $data['highestRow']; $i++) { 
            
                $name = $data['spreadsheet']->getActiveSheet()->getCell('A'.$i)->getValue();
                $numberProfessor = $data['spreadsheet']->getActiveSheet()->getCell('B'.$i)->getValue();
                $email = $data['spreadsheet']->getActiveSheet()->getCell('C'.$i)->getValue();
                $cardId = $data['spreadsheet']->getActiveSheet()->getCell('D'.$i)->getValue();
                $acronym = $data['spreadsheet']->getActiveSheet()->getCell('E'.$i)->getValue();
                $acronymTwo = $data['spreadsheet']->getActiveSheet()->getCell('F'.$i)->getValue();
                $acronymThree = $data['spreadsheet']->getActiveSheet()->getCell('G'.$i)->getValue();
                $acronymDiscipline = $data['spreadsheet']->getActiveSheet()->getCell('H'.$i)->getValue();
                $acronymDisciplineTwo = $data['spreadsheet']->getActiveSheet()->getCell('I'.$i)->getValue();
                $acronymDisciplineThree = $data['spreadsheet']->getActiveSheet()->getCell('J'.$i)->getValue();

                $msg = '"'. $name . '" - "' . $email . '" - "' . $numberProfessor . '" - "' . $cardId . '"';
                
                if(!$name && !$numberProfessor && !$email && !$cardId && !$acronym && !$acronymDiscipline){
                    break;
                } else if(!$name){
                    throw new Exception('Nome vazio',204);
                } else if(!$numberProfessor) {
                    throw new Exception('Numero Professor vazio',204);
                } else if(!$email) {
                    throw new Exception('Email vazio',204);
                } else if(!$cardId) {
                    throw new Exception('Id Cartão vazio',204);
                } else if(!$acronym) {
                    throw new Exception('Acronimo Curso vazio',204);
                } else if(!$acronymDiscipline) {
                    throw new Exception('Acronimo Disciplina vazio',204);
                }  else {

                    $arrayCareers = ['studentCareer'=>$acronym,'studentCareerTwo'=>$acronymTwo,'studentCareerThree'=> $acronymThree];
                    $arrayDisciplines = ['professorDiscipline'=>$acronymDiscipline,'professorDisciplineTwo'=>$acronymDisciplineTwo,'professorDisciplineThree'=>$acronymDisciplineThree];
                    
                    $requestCareers = new Request($arrayCareers);
                    $requestDisciplines = new Request($arrayDisciplines);
                    
                    $validateCareer = $this->validateCareers($requestCareers);
                    $validateDiscipline = $this->validateDiscipline($requestDisciplines);

                    if($validateCareer === true && $validateDiscipline === true){
                        $pass = Str::random(9);
                        $user = User::create([
                            'name' => $name,
                            'email' => $email,
                            'password' => Hash::make($pass),
                            'type_user_from_type_users' => 2,
                            'card_id' => $cardId
                        ]);
                        $professor = Professor::create([
                            'number_professor' => $numberProfessor,
                            'id_professor_from_users' => $user->id,
                            'acronym_career' => strtoupper($acronym),
                            'acronym_career_two' => strtoupper($acronymTwo),
                            'acronym_career_three' => strtoupper($acronymThree),
                            'professor_discipline' => strtoupper($acronymDiscipline),
                            'professor_discipline_two' => strtoupper($acronymDisciplineTwo),
                            'professor_discipline_three' => strtoupper($acronymDisciplineThree)
                        ]);
                    } else {
                        if($validateCareer !== true){
                            throw new Exception('Curso não existe');
                        } else if($validateDiscipline !== true){
                            throw new Exception('Disciplina não existe');
                        }
                    } 
                }
                $mail = new EmailController($name,$email,$pass);
                $resultSendEmail = $mail->sendEmail();
                if($resultSendEmail !== true){ throw new Exception('Erro no envio do Email com a Senha para o Utilizador'); }    
            }
            } catch (\Exception $e) {
            if(isset($user)){ $user->delete(); }
            if(isset($professor)){ $professor->delete(); }
            if(!isset($msg)){ $msg = null; }
            return $this->reportError('/home',$e,$msg);
        }

        return redirect('/home')->with('successfully', 'Professores adicionados com sucesso');
    }

    public function program(Request $nameFile){
        $data = $this->configSheet('/excel_files/' . $nameFile['nameFile']);
        try {
            for ($i=1; $i <= $data['highestRow']; $i++) { 
            
                $acronym = $data['spreadsheet']->getActiveSheet()->getCell('A'.$i)->getValue();
                $acronymDiscipline = $data['spreadsheet']->getActiveSheet()->getCell('B'.$i)->getValue();
                $numberProfessor = $data['spreadsheet']->getActiveSheet()->getCell('C'.$i)->getValue();
                $date = $data['spreadsheet']->getActiveSheet()->getCell('D'.$i)->getValue();
                $startTime = $data['spreadsheet']->getActiveSheet()->getCell('E'.$i)->getValue();
                $endTime = $data['spreadsheet']->getActiveSheet()->getCell('F'.$i)->getValue();
                $classRoom = $data['spreadsheet']->getActiveSheet()->getCell('G'.$i)->getValue();
                $group = $data['spreadsheet']->getActiveSheet()->getCell('H'.$i)->getValue();

                if(!$acronym && !$acronymDiscipline && !$numberProfessor && !$date && !$startTime && !$endTime && !$classRoom && !$group){
                    break;
                } else if(!$acronym){
                    throw new Exception('Acronimo Curso vazio',204);
                } else if(!$acronymDiscipline) {
                    throw new Exception('Acronimo Disciplina vazio',204);
                } else if(!$numberProfessor) {
                    throw new Exception('Número Professor vazio',204);
                } else if(!$date) {
                    throw new Exception('Data vazio',204);
                } else if(!$startTime) {
                    throw new Exception('Começo Aula vazio',204);
                } else if(!$endTime) {
                    throw new Exception('Fim Aula vazio',204);
                } else if(!$classRoom) {
                    throw new Exception('Aula vazio',204);
                } else if(!$group && $group != 0) {
                    throw new Exception('Número Grupo vazio',204);
                } else {
                    
                    $array = ['acronymCareer'=>$acronym,'acronymDiscipline'=>$acronymDiscipline,'numberProfessor'=>$numberProfessor,'groupStudents'=>$group,'date'=>$date,'startTime'=>$startTime,'endTime'=>$endTime];
                    
                    $request = new Request($array);

                    $validateProgram = $this->validateProgram($request);

                    if($validateProgram === true){
                        Program::create([
                            'acronym_career' => $acronym,
                            'acronym_discipline' => $acronymDiscipline,
                            'number_professor' => $numberProfessor,
                            'date_to_class' => $date,
                            'start_class' => $startTime,
                            'end_class' => $endTime,
                            'classroom_number' => $classRoom,
                            'group_from_students' => $group
                        ]);
                    } else {
                        throw new Exception($validateProgram);
                    }
                }
            }
        } catch (\Exception $e) {
            return $this->reportError('/home',$e);
        }
        return redirect('/home')->with('successfully', 'Programas adicionados com sucesso');
    }

    public function administrator(Request $nameFile){
        $data = $this->configSheet('/excel_files/' . $nameFile['nameFile']);
        try {
            for ($i=1; $i <= $data['highestRow']; $i++) { 
        
                $name = $data['spreadsheet']->getActiveSheet()->getCell('A'.$i)->getValue();
                $email = $data['spreadsheet']->getActiveSheet()->getCell('B'.$i)->getValue();
                $cardId = $data['spreadsheet']->getActiveSheet()->getCell('C'.$i)->getValue();

                $msg = '"'. $email . '"';

                if(!$name && !$email && !$cardId){
                    break;
                } else if(!$name){
                    throw new Exception('Nome vazio',204);
                } else if(!$email) {
                    throw new Exception('Email vazio',204);
                } else if(!$cardId) {
                    throw new Exception('ID Card vazio',204);
                } else {

                    $pass = Str::random(9);
                    User::create([
                        'name' => $name,
                        'email' => $email,
                        'password' => Hash::make($pass),
                        'type_user_from_type_users' => 3,
                        'card_id' => $cardId,
                    ]);
                }
            }
            $mail = new EmailController($name,$email,$pass);
            $resultSendEmail = $mail->sendEmail();
            if($resultSendEmail !== true){ throw new Exception('Erro no envio do Email com a Senha para o Utilizador'); } 
        } catch (\Exception $e) {
            return $this->reportError('/home',$e,$msg);
        }
        return redirect('/home')->with('successfully', 'Administradores adicionados com sucesso');
    }

    public function educationalPlan(Request $nameFile){
        $data = $this->configSheet('/excel_files/' . $nameFile['nameFile']);
        try {
            for ($i=1; $i <= $data['highestRow']; $i++) { 
        
                $acronym = $data['spreadsheet']->getActiveSheet()->getCell('A'.$i)->getValue();
                $acronymDiscipline = $data['spreadsheet']->getActiveSheet()->getCell('B'.$i)->getValue();
                $semester = $data['spreadsheet']->getActiveSheet()->getCell('C'.$i)->getValue();
                

                if(!$acronym && !$acronymDiscipline && !$semester){
                    break;
                } else if(!$acronym){
                    throw new Exception('Acronimo Curso vazio',204);
                } else if(!$acronymDiscipline) {
                    throw new Exception('Acronimo Disciplina vazio',204);
                } else if(!$semester) {
                    throw new Exception('Acronimo Semestre vazio',204);
                } else {
                    
                    $msg = '"'. $acronym . '" - "' . $acronymDiscipline . '"';
                    $career = Career::where('acronym_career', '=', $acronym)->first();
                    $discipline = Discipline::where('acronym_discipline', '=', $acronymDiscipline)->first();
                    
                    if(!is_null($career) && !is_null($discipline)){
                        EducationalPlan::create([
                            'acronym_career_from_careers' => strtoupper($acronym),
                            'acronym_discipline_from_disciplines' => strtoupper($acronymDiscipline),
                            'semester' => $semester
                        ]);   
                    } else {
                        throw new Exception('Este curso ou disciplina não existem');
                    }
                }
            }
        } catch (\Exception $e) {
            return $this->reportError('/home',$e);
        }
        return redirect('/home')->with('successfully', 'Cursos adicionados com sucesso');
    }

    public static function reportError($route,$e,$msg = null){
        if($e->getCode() == 23000){
            $numError = $e->getPrevious()->errorInfo[1];
        } else {
            $numError = $e->getCode();
        }
        switch ($numError) {
            case 1049:
                return redirect($route)->with('error','Erro na ligação à base de dados');
                break;
            case 1062:
                return redirect($route)->with('error', $msg . ' já existem');
                break;
            case 204:
                return redirect($route)->with('error', $e->getMessage());
                break;
            default:
                if($e->getMessage() == 'The given data was invalid.'){
                     return redirect($route)->with('error', 'Campos não preenchidos'); 
                } else {
                    return redirect($route)->with('error', $e->getMessage());
                }
                break;
        }
    }

    public function configSheet($urlFile){
        $nameFile = public_path($urlFile);
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        
        $spreadsheet = $reader->load($nameFile);

        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        return ['spreadsheet' => $spreadsheet,'highestRow' => $highestRow]; 
    }

    public static function validateFile($request,$nameAttach,$extension,$fileToSave,$action,$redirectOnError){
            try {
                $nameFile = $request->file($nameAttach)->getClientOriginalName();
                if(substr($nameFile, -4) == $extension){
                    $request->file($nameAttach)->move($fileToSave,$nameFile); 
                    return redirect()->action($action,['nameFile' => $nameFile]);
                } else {
                    return redirect($redirectOnError)->with('error','Ficheiro no tipo Excel');
                }
            } catch (\Exception $e) {
                return redirect($redirectOnError)->with('error', 'Ficheiro não encontrado');
            }
    }

    public static function validateCareers(Request $request){
        try {
            $career = Career::where('acronym_career', '=', $request->studentCareer)->first();
            $careerTwo = Career::where('acronym_career', '=', $request->studentCareerTwo)->first();
            $careerThree = Career::where('acronym_career', '=', $request->studentCareerThree)->first();
            if(!is_null($career)){
                if(is_null($request->studentCareerTwo) || !is_null($careerTwo)){
                    if(is_null($request->studentCareerThree) || !is_null($careerThree)){
                        return true;
                    } else { throw new Exception('Curso ' . strtoupper($request->studentCareerThree) . ' não existe'); }
                } else { throw new Exception('Curso ' . strtoupper($request->studentCareerTwo) . ' não existe'); }
            } else { throw new Exception('Curso ' . strtoupper($request->studentCareer) . ' não existe'); }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function validateDiscipline(Request $request){
        try {
            
            $discipline = Discipline::where('acronym_discipline', '=', $request->professorDiscipline)->first();
            $disciplineTwo = Discipline::where('acronym_discipline', '=', $request->professorDisciplineTwo)->first();
            $disciplineThree = Discipline::where('acronym_discipline', '=', $request->professorDisciplineThree)->first();
            
            if(!is_null($discipline)){
                if(is_null($request->professorDisciplineTwo) || !is_null($disciplineTwo)){
                    if(is_null($request->professorDisciplineThree) || !is_null($disciplineThree)){
                        return true;
                    } else { throw new Exception('Disciplina ' . strtoupper($request->professorDisciplineThree) . ' não existe'); }
                } else { throw new Exception('Disciplina ' . strtoupper($request->professorDisciplineTwo) . ' não existe'); }
            } else { throw new Exception('Disciplina ' . strtoupper($request->professorDiscipline) . ' não existe'); } 
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    } 

    public static function validateProgram(Request $request){
        try {
            $career = Career::where('acronym_career', '=', $request->acronymCareer)->first();
            $discipline = Discipline::where('acronym_discipline', '=', $request->acronymDiscipline)->first();
            $professor = Professor::where('number_professor', '=', $request->numberProfessor)->first();
            $student = Student::where('group', '=', $request->groupStudents)->first();
            $careerProfessor = Professor::where('acronym_career', '=', $request->acronymCareer)->where('number_professor', '=', $request->numberProfessor)->first();
            $careerProfessorTwo = Professor::where('acronym_career_two', '=', $request->acronymCareer)->where('number_professor', '=', $request->numberProfessor)->first();
            $careerProfessorThree = Professor::where('acronym_career_three', '=', $request->acronymCareer)->where('number_professor', '=', $request->numberProfessor)->first();
            $disciplineProfessor = Professor::where('professor_discipline', '=', $request->acronymDiscipline)->where('number_professor', '=', $request->numberProfessor)->first();
            $disciplineProfessorTwo = Professor::where('professor_discipline_two', '=', $request->acronymDiscipline)->where('number_professor', '=', $request->numberProfessor)->first();
            $disciplineProfessorThree = Professor::where('professor_discipline_three', '=', $request->acronymDiscipline)->where('number_professor', '=', $request->numberProfessor)->first();
            $validateHourProgram = Program::where('date_to_class', '=',$request->date)
                    ->where('start_class', '>=',$request->startTime)
                    ->where('start_class', '<=',$request->endTime)
                    ->where('end_class', '>=',$request->startTime)
                    ->where('end_class', '<=',$request->endTime)
                    ->where('number_professor', '>=',$request->numberProfessor)
                    ->first();
            if(!is_null($career) && !is_null($discipline) && !is_null($professor) && !is_null($student)){
                if(is_null($validateHourProgram)){
                    if(!is_null($careerProfessor) || !is_null($careerProfessorTwo) || !is_null($careerProfessorThree)){
                        if(!is_null($disciplineProfessor) || !is_null($disciplineProfessorTwo) || !is_null($disciplineProfessorThree)){
                            return true;
                        } else { throw new Exception('Disciplina não Associada ao Professor'); }
                    } else { throw new Exception('Curso não Associado ao Professor'); } 
                } else { throw new Exception('Um programa já existe para o professor a mesma hora'); }
            } else { throw new Exception('Dados não existentes'); }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    } 
}
