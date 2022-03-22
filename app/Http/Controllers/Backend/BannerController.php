<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Backtrace\File;

class BannerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banners=Banner::all();
        return view('backend.banner.create',compact('banners'));
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
            'title1'=>'required|max:100',
            'title2'=>'required|max:100',
            'btn_text'=>'required',
            'photo'=>'required|mimes:png,jpg,jpeg,gif,webp|max:1024'
        ]);
        $photo=$request->file('photo');
        $photo_name=$request->title1.'-'.time().'.'.$photo->getClientOriginalExtension();
        $upload=$photo->move(public_path('storage/banner/'),$photo_name);
    if($upload){
      Banner::insert([
            'title1'=>$request->title1,
            'title2'=>$request->title2,
            'btn_text'=>$request->btn_text,
            'photo'=>$photo_name,
            'created_at'=>Carbon::now(),
        ]);
    }
        Alert::success('Congrats', 'You\'ve Successfully add banner');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner_info=Banner::find($id);
        return view('backend.banner.edit',compact('banner_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $photo=$request->file('photo');
        if($request->hasFile('photo')){
            $old_pic=Banner::find($request->id);
            if( $old_pic->photo != ''){
            unlink(public_path('storage/banner/'.$old_pic->photo));
            }
            $photo=$request->file('photo');
            $photo_name=$request->title1.'-'.time().'.'.$photo->getClientOriginalExtension();
            $upload=$photo->move(public_path('storage/banner/'),$photo_name);
            if($upload){
                Banner::find($request->id)->update([
                    'photo'=>$photo_name,
                ]);
            }
            Banner::find($request->id)->update([
            'title1'=>$request->title1,
            'title2'=>$request->title2,
            'btn_text'=>$request->btn_text,
            'created_at'=>Carbon::now(),
            ]);
            return back();
        }else{
            Banner::find($request->id)->update([
                'title1'=>$request->title1,
                'title2'=>$request->title2,
                'btn_text'=>$request->btn_text,
                'created_at'=>Carbon::now(),
                ]);
                return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $data=Banner::where('id',$id)->first();
    $destation=public_path('storage/banner/').$data->photo;
    if(file_exists($destation)){
       unlink($destation);
    }
    $data->delete();
     Alert::success('Congrats', 'You\'ve Successfully Delete banner');
     return back();
    }
    public function status($id){
        $banner=Banner::where('id',$id)->first();
        if($banner->status==1){
            $banner->status=2;
            $banner->save();
            return back();
        }else{
            $banner->status=1;
            $banner->save();
            return back();
        }
    }
}
