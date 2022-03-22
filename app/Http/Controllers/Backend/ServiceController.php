<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        return view('backend.sevice.create',compact('services'));
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
                'name' => 'required',
                'discription'=>'required|max:1000',
                'photo'=>'required|mimes:png,jpg,jpeg,gif,web,svg|max:1024'
            ]);
        $photo=$request->file('photo');
        $photo_name=$request->name.'-'.time().'.'.$photo->getClientOriginalExtension();
        $upload=$photo->move(public_path('storage/service/'),$photo_name);
        if($upload){
            Service::insert([
                'name'=>$request->name,
                'discription'=>$request->discription,
                'photo'=>$photo_name,
                'created_at'=>Carbon::now(),
            ]);
        }
            Alert::success('Congrats', 'You\'ve Successfully Added');
            return back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service=Service::find($id);
        return view('backend.sevice.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $photo=$request->file('photo');
        if($request->hasFile('photo')){
            $old_pic=Service::find($request->id);
            if( $old_pic->photo != ''){
            unlink(public_path('storage/service/'.$old_pic->photo));
            }
            $photo=$request->file('photo');
            $photo_name=$request->name.'-'.time().'.'.$photo->getClientOriginalExtension();
            $upload=$photo->move(public_path('storage/service/'),$photo_name);
            if($upload){
            Service::find($request->id)->update([
                'name'=>$request->name,
                'discription'=>$request->discription,
                'photo'=>$photo_name,
                'created_at'=>Carbon::now(),
            ]);
            return back();
        }
    }else{
            Service::find($request->id)->update([
                'name'=>$request->name,
                'discription'=>$request->discription,
                'created_at'=>Carbon::now(),
                ]);
                return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Service::where('id',$id)->first();
        $destation=public_path('storage/service/').$data->photo;
        if(file_exists($destation)){
           unlink($destation);
        }
        $data->forceDelete();
         Alert::success('Congrats', 'You\'ve Successfully Delete banner');
         return back();
    }
    public function status($id){
        $service=Service::where('id',$id)->first();
        if($service->status==1){
            $service->status=2;
            $service->save();
            return back();
        }else{
            $service->status=1;
            $service->save();
            return back();
        }
    }
}
