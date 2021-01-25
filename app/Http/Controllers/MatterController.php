<?php

namespace App\Http\Controllers;
use App\Matter;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MatterController extends Controller
{
    //Restringir la vista de la pagina web solo a los usuarios con incio de sesion activa
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $matters=Matter::paginate(5);

        //Listar solo registros que tengan como id el 2 
        /* $periods=Period::select('id','name','duration','year','description')->where('id','2')->get(); */
        return view('matter.index',compact('matters')); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){        
        return view('matter.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'matter_name'=>'required|alpha',
        ]);

        $matter = new Matter();
        $matter->matter_name = $request->matter_name;
        $matter->save();  
        return redirect('matter'); 
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $matters = Matter::findOrFail($id);
        $sql='select DISTINCT s.id,s.name,s.surname,s.sex from matters m,matter_student ms,students s where (2=ms.matter_id AND ms.student_id=s.id)';
        $matters=DB::select($sql);
        return view('matter.show',compact('matters'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $matter = Matter::find($id);
        return view('matter.edit',compact('matter'));
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
            'matter_name'=>'required|alpha',
        ]);
        Matter::whereid($id)->update($validatedData);
        $matter = Matter::all();
        $matter= Matter::findOrFail($id);
        return redirect()->route('matter.index',compact('matter'));

        /* return view('matter.edit',compact('matter')); */
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Matter::destroy($id);
        return redirect('matter');
    }
}
