<?php

namespace App\Http\Controllers;
use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index(){
        $periods=Period::paginate(5);
        return view('period.index',compact('periods')); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $periods = Period::all();
        
        return view('period.create', compact('periods'));

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
            'year'=>'required|numeric',
            'description'=>'required|alpha',
        ]);

        $period = new Period();
        $period->name = $request->name;
        $period->duration = $request->duration;
        $period->year = $request->year;
        $period->description = $request->description;
        $period->save();  
        return redirect('period'); 
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
