<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CareerMod;

class careerCtr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $careers=CareerMod::all();//$variname=modelname
        return view('index',compact('careers'));//compact('variable')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('careerView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
        $request->validate(['careerDesc'=>'required',
                            'active'=>'required',
                            'remark'=>'required']);
        $careers=new CareerMod([
            'careerDesc'=>$request->get('careerDesc'),
            'active'=>$request->get('active'),
            'remark'=>$request->get('remark')
         ]);//$varname=new modelname
        $careers->save();
         return redirect('/careerCN')->with('success','Successfully Inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $careers=CareerMod::find($id);//$variname=modelname
        return view('careerEdit',compact('careers'));//compact('variable')
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
         $request->validate(['careerDesc'=>'required',
                             'active'=>'required',
                             'remark'=>'required']);
         $careers=CareerMod::find($id);
         $careers->careerDesc=$request->get('careerDesc');
         $careers->active=$request->get('active');
         $careers->remark=$request->get('remark');//->dbColname
         $careers->save();
         return redirect('/careerCN')->with('success','Successfully Updated!'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $careers=CareerMod::find($id);
         $careers->delete();
         return redirect('/careerCN')->with('delete','Successfully Deleted!'); 
    }
}
