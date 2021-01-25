<?php

namespace App\Http\Controllers;
use App\Teacher;
use App\Matter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    //Restringir la vista de la pagina web solo a los usuarios con incio de sesion activa
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $teachers=Teacher::all();
        //Listar solo registros que tengan como id el 2 
        /* $periods=Period::select('id','name','duration','year','description')->where('id','2')->get(); */
        return view('teacher.index',compact('teachers')); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $teachers = Teacher::all();
        $matters=Matter::all();
        return view('teacher.create', compact('teachers','matters'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'lastname' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'address' => 'required',
            'matter' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'city' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'phone' => 'required',
            'sex' => 'required',
            'avatar' => 'required|image'
        ]); 
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->lastname = $request->lastname;
        $teacher->address = $request->address;
        $teacher->matter = $request->matter;
        $teacher->city = $request->city;
        $teacher->phone = $request->phone;
        $teacher->sex = $request->sex;
        $teacher->avatar = $request->avatar;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/teachers',$name);
        }
        $teacher->avatar = $name;
        $teacher->save(); 
        if($request->matters){
            $teacher->matters()->attach($request->matters);
        } 
        return redirect('teacher'); 
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
        $teacher = Teacher::all();
        $teacher= Teacher::findOrFail($id);
        $matters=Matter::all();
        return view('teacher.edit',compact('teacher','matters'));
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
            'name' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'lastname' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'address' => 'required',
            'matter' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'city' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'phone' => 'required',
            'sex' => 'required',
            'avatar' => 'required|image'
        ]);
        if($request->hasFile('avatar')){
            $teacher= Teacher::findOrFail($id);
            Storage::delete(['public/images/teachers',$name]);
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/teachers/',$name);
        }
        $teacher->avatar = $name;
        Teacher::whereid($id)->update($validatedData);
        $teacher = Teacher::all();
        $teacher= Teacher::findOrFail($id);
        return view('teacher.edit',compact('teacher'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Teacher::destroy($id);
        return redirect('teacher');
    }
}
