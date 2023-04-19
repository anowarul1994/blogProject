<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.pages.modules.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.modules.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $slider_data = $request->all();

        if ($request->file('photo')){
            $photo = $request->file('photo');
            $width = 1920;
            $height = 720;
           
            $path = 'image/uploads/slider/';
            
            $name = Str::slug($request->input('title').'-'.Carbon::now()->toDayDateTimeString()).'.webp';
            $slider_data['photo'] = $name;

            imageUploadController::imageUpload($photo, $width, $height, $path, $name);
        }

        Slider::create($slider_data);

        session()->flash('msg', 'Slider Create Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('sliders.index');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('backend.pages.modules.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('backend.pages.modules.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $slider_data = $request->all();

        if ($request->file('photo')){
            $photo = $request->file('photo');
            $width = 1920;
            $height = 720;
           
            $path = 'image/uploads/slider/';
            
            $name = Str::slug($request->input('title').'-'.Carbon::now()->toDayDateTimeString()).'.webp';
            $slider_data['photo'] = imageUploadController::imageUpload($photo, $width, $height, $path, $name);

            if( $slider->photo!= null){
                ImageUploadController::unlinkImage($path, $slider->photo);
               
            }


        }else{
            $slider_data['photo'] = $slider->photo;
        }

        $slider->update($slider_data);

        session()->flash('msg', 'Slider Update Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        
        if( $slider->photo!= null){
            $path = 'image/uploads/slider/';
            ImageUploadController::unlinkImage($path, $slider->photo);
        }
        $slider->delete();
        session()->flash('msg', 'Slider Deleted Successfully');
        session()->flash('cls', 'warning');
        return redirect()->route('sliders.index');


    }
        
}
