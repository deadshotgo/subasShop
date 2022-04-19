<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = System::all();
        return view('admin.systems.system',[
            'systems' => $systems,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.systems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $newSystem = new System();
            $newSystem->title = $request->title;

            if($request->title_m){
                $newSystem->title_m = $request->title_m;
            }else {
                $newSystem->title_m = $request->title;
            }if($request->description_m){
                $newSystem->description_m = $request->description_m;
            }else{
                $newSystem->description_m = $request->title;
            }

            $newSystem->save();

            return redirect()->back()->with('message', 'ОС було успішно добавлено');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Не вірно введені данні');
        }
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
        $system = System::query()->where('id',$id)->first();
        return view('admin.systems.edit',[
            'system' => $system,
        ]);
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
        $system = System::query()->where('id',$id)->first();
        $system->title = $request->title;
        $system->title_m = $request->title_m;
        $system->description_m = $request->description_m;
        $system->save();
        return redirect()->back()->with('message', 'ОС було успішно редаговано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = System::where('id',$id)->first();
        $delete->delete();
        return redirect()->back()->with('message', 'ОС було успішно видалено');
    }
}
