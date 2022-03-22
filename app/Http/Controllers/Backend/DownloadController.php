<?php

namespace App\Http\Controllers\Backend;

use App\Models\Downloadarea;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DownloadController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $download=Downloadarea::all();
        return view('backend.downloadarea.create',compact('download'));
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
            'discription'=>'required',
            'file'=> 'required',
        ]);
        $file=$request->file('file');
        $file_name=$request->title.'-'.time().'.'.$file->getClientOriginalExtension();
        $upload=$file->move(public_path('storage/file/'),$file_name);
       if($upload){
       Downloadarea::insert([
            'title'=>$request->title,
            'discription'=>$request->discription,
            'file'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        Alert::success('Congrats', 'You\'ve Successfully Added');
        return back();
    }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $down_info=Downloadarea::find($id);
        return view('backend.downloadarea.edit',compact('down_info'));
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
        $request->validate([
            'title' => 'required',
            'discription'=>'required',
        ]);
        $photo=$request->file('file');
        if($request->hasFile('file')){
            $old_file=Downloadarea::find($request->id);
            if( $old_file->file != ''){
            unlink(public_path('storage/file/'.$old_file->file));
            }
            $file=$request->file('file');
            $file_name=$request->title.'-'.time().'.'.$file->getClientOriginalExtension();
            $upload=$file->move(public_path('storage/file/'),$file_name);
            if($upload){
                Downloadarea::find($request->id)->update([
                    'file'=>$file_name,
                ]);
            }
            Downloadarea::find($request->id)->update([
                'title'=>$request->title,
                'discription'=>$request->discription,
                'file'=>$file_name,
                'created_at'=>Carbon::now(),
            ]);
            return back();
        }else{
            Downloadarea::find($request->id)->update([
                'title'=>$request->title,
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
            $data=Downloadarea::where('id',$id)->first();
            $destation=public_path('storage/file/').$data->file;
            if(file_exists($destation)){
               unlink($destation);
            }
            $data->delete();
             Alert::success('Congrats', 'You\'ve Successfully Delete banner');
             return back();
    }
    public function status($id){
        $down=Downloadarea::where('id',$id)->first();
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
