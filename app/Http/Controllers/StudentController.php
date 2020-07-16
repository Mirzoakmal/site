<?php

namespace App\Http\Controllers;
/*2. используем класс Student для последующей работы таблицы students.
т.е. для того чтобы получить и хранить данные мы используем класс Student */
use App\Student;
use Illuminate\Http\Request;

/*StudentController расширение/продолжение Controller*/
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /*layout = расположение*/
     /**/
    public function index()
    {
        $students = Student::all() ;
        return view('student',['students'=>$students,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $students = Student::all();
      /*Возвращаем в шаблон "student.blade.php" данные.
      сопаставим переменные шаблона students со значением переменного $students  */
      return view('student',['students'=>$students,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->cne = $request->input('cne');
        $student->firstname = $request->input('firstname');
        $student->secondname = $request->input('secondname');
        $student->age = $request->input('age');
        $student->speciality = $request->input('speciality');
        $student->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $students = Student::all();
        return view('student',['students'=>$students,'student'=>$student,'layout'=>'show']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $student = Student::find($id);
      $students = Student::all();
      /* показать в шаблоне, students, student,layout = edit */
      return view('student',['students'=>$students,'student'=>$student,'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      /* находим данные по id из модели Student и присвоим в $student */
        $student = Student::find($id);
      /*  извлекаем поле cne из $student и обновляем новым данным cne */
        $student->cne = $request->input('cne');
        $student->firstname = $request->input('firstname');
        $student->secondname = $request->input('secondname');
        $student->age = $request->input('age');
        $student->speciality = $request->input('speciality');
        $student->save();
      /* возврашаем главную страницу*/
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/');
    }
}
