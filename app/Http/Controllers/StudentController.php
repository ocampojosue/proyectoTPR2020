<?php

namespace App\Http\Controllers;
use App\Student;
use App\Matter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    //Restringir la vista de la pagina web solo a los usuarios con incio de sesion activa
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $students=Student::all();
        
        //Listar solo registros que tengan como id el 2 
        /* $periods=Period::select('id','name','duration','year','description')->where('id','2')->get(); */
        return view('student.index',compact('students')); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $students = Student::all();
        $matters=Matter::all();
        return view('student.create', compact('students','matters'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'sex' => 'required',
            'avatar' => 'required|image'
        ]); 
        $student = new Student();
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->sex = $request->sex;     
        $student->avatar = $request->avatar;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/students/',$name);
        }
        $student->avatar = $name;
        $student->save();  
        if($request->matters){
            $student->matters()->attach($request->matters);
        }
        return redirect('student'); 
        /* $teacher=request()->except('_token');
        if($request->input('radio') == 'male'){
            $teacher->sex = 'Male';
        }
        else{
            if($request->input('radio') == 'female'){
                $teacher->sex = 'Female';
            }
            else{
                $teacher->sex = 'No binary';
            }      
        }
        if($request->hasFile('avatar')){
            $teacher['avatar']=$request->file('avatar')->store('uploads','public');
        }
        
        Teacher::insert($teacher);
        return response()->json($teacher); */
        /* $validateData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'matter' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'sex' => 'required',
            'avatar' => 'required|image'
        ]); 
        $teacher = new Teacher;
        
        $teacher->name = $request->name;
        $teacher->lastname = $request->lastname;
        $teacher->address = $request->address;
        $teacher->matter = $request->area;
        $teacher->city = $request->city;
        $teacher->phone = $request->phone;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $img = time().$file->getClientOriginalName();
            $file->move(public_path().'images/',$name);
        }
        if($request->input('radio') == 'male'){
            $teacher->sex = 'Male';
        }
        else{
            if($request->input('radio') == 'female'){
                $teacher->sex = 'Female';
            }
            else{
                $teacher->sex = 'No binary';
            }      
        }
        $teacher->avatar = $img;
        Teacher::insert($teacher);
        return response()->json($teacher); */
/*         $teacher->slug = time().$request->input('name'); */
        /* $teacher->save();
        $teachers = Teacher::All();
        return view('teacher.index', compact('teachers')); */
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
        $student = Student::all();
        $student= Student::findOrFail($id);
        return view('student.edit',compact('student'));
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
            'name' => 'required',
            'surname' => 'required',
            'sex' => 'required',
            'avatar' => 'required|image'
        ]);
        if($request->hasFile('avatar')){
            $student= Student::findOrFail($id);
            Storage::delete(['public/images/students',$name]);
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/students/',$name);
        }
        $student->avatar = $name;
        Student::whereid($id)->update($validatedData);
        $student = Student::all();
        $student= Student::findOrFail($id);
        return view('student.edit',compact('student'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Student::destroy($id);
        return redirect('student');
    }
}
