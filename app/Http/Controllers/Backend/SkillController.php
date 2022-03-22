<?php

namespace App\Http\Controllers\Backend;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SkillController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills=Skill::all();
        return view('backend.skill.create',compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'persen'=>'required',
        ]);
        Skill::insert([
            'title'=>$request->title,
            'persen'=>$request->persen,
            'created_at'=>Carbon::now(),
        ]);
        Alert::success('Congrats', 'You\'ve Successfully Added');
        return back();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Skill::where('id',$id)->first();
        $data-> forceDelete();
             Alert::success('Congrats', 'You\'ve Successfully Delete banner');
             return back();
    }
    public function status($id){
        $down=Skill::where('id',$id)->first();
        if($down->status==1){
            $down->status=2;
            $down->save();
            return back();
        }else{
            $down->status=1;
            $down->save();
            return back();
        }
    }
}
