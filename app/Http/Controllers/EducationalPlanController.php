<?php

namespace App\Http\Controllers;

use App\EducationalPlan;
use App\Career;
use App\Discipline;
use Illuminate\Http\Request;

class EducationalPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.EducationalPlan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $career = Career::where('acronym_career', '=', $request->acronymCareer)->first();
            $discipline = Discipline::where('acronym_discipline', '=', $request->acronymDiscipline)->first();
            if(!is_null($career) && !is_null($discipline)){
                $educationalPlan = new EducationalPlan;
                $educationalPlan->acronym_career_from_careers = strtoupper($request->acronymCareer);
                $educationalPlan->acronym_discipline_from_disciplines = strtoupper($request->acronymDiscipline);
                $educationalPlan->semester = strtoupper($request->semester);

                $educationalPlan->save();
            } else {
                return view('admin.index', [
                    'error' => 'Este curso ou disciplina não existem'
                ]);
            }
        } catch (\Exception $e) {
            if(isset($educationalPlan)){
                $educationalPlan->delete();
            }
            if (strpos($e, 'Duplicate') !== false) {
                return view('admin.index', [
                    'error' => 'Este Plano de Educação já existe'
                ]);
            } else if(strpos($e, 'Unknown database') !== false) {
                return view('admin.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            }
        }
        return view('admin.index', [
            'successfully' => 'Curso adicionado com sucesso'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EducationalPlan  $educationalPlans
     * @return \Illuminate\Http\Response
     */
    public function show(EducationalPlan $educationalPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EducationalPlan  $educationalPlans
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = EducationalPlan::findOrFail($id);
        return view('admin.EducationalPlan.edit.editEducationalPlan', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EducationalPlan  $educationalPlans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationalPlan $educationalPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EducationalPlan  $educationalPlans
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $plan = EducationalPlan::findOrFail($id);
            $plan->delete();
            
        } catch (\Exception $e) {
            if(strpos($e, 'Unknown database') !== false) {
                return view('admin.EducationalPlan.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            } else {
                return view('admin.EducationalPlan.index', [
                    'error' => 'Erro ao apagar o Plano de Educação',
                    'plan' => EducationalPlan::findOrFail($id)
                ]);
            }
        }

        return view('admin.EducationalPlan.index', [
            'successfully' => 'Plano de Educação foi apagado com sucesso',
        ]);
    }
    public function findPlan(Request $request)
    {
        try {    
            if($request->acronymCareer){
                $plans = EducationalPlan::where('acronym_career_from_careers', '=', $request->acronymCareer)->get();
                if($request->acronymCareer == '*'){
                    $plans = EducationalPlan::all();
                }
            }
        } catch (\Exception $e) {
            if(strpos($e, 'Unknown database') !== false) {
                return view('admin.EducationalPlan.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            } else {
                return view('admin.EducationalPlan.index', [
                    'error' => 'Erro ao encontra o Plano de Educação'
                ]);
            }
        }
        return view('admin.EducationalPlan.educationaPlanList', compact('plans'));
    }
}
