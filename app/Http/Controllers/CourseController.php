<?php

namespace App\Http\Controllers;
use App\Course;
use App\Period;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        /* $courses=Course::paginate(5);
        return view('course.index',compact('courses'));  */
        //Listar solo registros que tengan como id el 2 
        /* $periods=Period::select('id','name','duration','year','description')->where('id','2')->get(); */
        $courses=Course::all();
        $periods=Period::all();
        return view('course.index',compact('courses','periods'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $courses = Course::all();
        $periods = Period::all();
        return view('course.create', compact('courses','periods'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|alpha',
            'description'=>'required',
            'period_id'=>'required',
        ]);
        Course::create($request->all());
        return redirect('course'); 
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $course=Course::findOrFail($id);
        $periods=Period::all();
        return view('course.edit',compact('course','periods'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'name'=>'required|alpha',
            'description'=>'required',
            'period_id'=>'required',
        ]);
        Course::whereid($id)->update($validatedData);
        $course= Course::findOrFail($id);
        $periods=Period::all();
        return view('course.edit',compact('course','periods'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Course::destroy($id);
        return redirect('course');
    }
}
