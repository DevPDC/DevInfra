<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\FacilityImage;
use App\Facility;
use Session;

class FacilityImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'max:7'
        ]);

        if($request->hasfile('filename'))
        {
            // foreach($request->file('filename') as $image)
            //     {
                $destinationPath = public_path().'/images/FacilityImages/';
                $file = $request->file('filename');
                $newName = Facility::select('name')->where('id',$request->facility_id)->first();
                $guessFileExtension = $file->guessExtension();
                // $data = $file->move($destinationPath, $newName.'.'.$guessFileExtension);


                    // $file = $request->file('filename');
                    // $filename = $file->getClientOriginalName();
                    // $path = $file->getRealPath();
                    // $file_resize = Image::make($path)->resize(300, 300)->encode('jpg'); 
                    // $data = $filename; 
                    
                // }
        }

        $image = new FacilityImage;

        $image->facility_id = $request->facility_id;
        $image->user_id = $request->user_id;
        $image->filename = $newName.'.'.$guessFileExtension;
        
        $image->save($destinationPath, $newName.'.'.$guessFileExtension);

        Session::flash('success','Upload Successfully.');

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'max:7'
        ]);

        if($request->hasfile('filename'))
        {
            // foreach($request->file('filename') as $image)
            //     {

                    $file = $request->file('filename');
                    $filename = $file->getClientOriginalName();
                    $path = $file->getRealPath();
                    $file_resize = Image::make($path)->resize(300, 300)->encode('jpg'); 
                    $file->move(public_path().'/images/FacilityImages/', $file);
                    $data = $filename; 
                // }
        }

        $image = FacilityImage::where('facility_id',$request->facility_id)->update(array(
            'user_id' => input('user_id'),
            'filename' => $data
        ));

        Session::flash('success','Upload Successfully.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
