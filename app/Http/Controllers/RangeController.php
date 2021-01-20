<?php

namespace App\Http\Controllers;
use App\Range;
use Illuminate\Http\Request;

class RangeController extends Controller
{
    //Restringir la vista de la pagina web solo a los usuarios con incio de sesion activa
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $ranges=Range::paginate(5);
        return view('range.index',compact('ranges')); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $ranges = Range::all();
        return view('range.create', compact('ranges'));

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
            'duration'=>'required|numeric',
            'start_date'=>'required|',
            'final_date'=>'required|',
        ]);

        $range = new Range();
        $range->name = $request->name;
        $range->duration = $request->duration;
        $range->start_date = $request->start_date;
        $range->final_date = $request->final_date;
        $range->save();  
        return redirect('range'); 
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
        $period = Period::all();
        $period= Period::findOrFail($id);
        return view('period.edit',compact('period'));
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
            'duration'=>'required|numeric',
            'year'=>'required|numeric',
            'description'=>'required|alpha',
        ]);
        Period::whereid($id)->update($validatedData);
        $period = Period::all();
        $period= Period::findOrFail($id);
        return view('period.edit',compact('period'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Period::destroy($id);
        return redirect('period');
    }
}
