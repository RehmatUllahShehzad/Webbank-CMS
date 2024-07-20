<?php

namespace Topdot\Slider\Http\Controllers;

use Exception;
use Topdot\Slider\Models\Slider;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Topdot\Slider\Repositories\SliderRepository;
use Topdot\Slider\Http\Requests\SliderCreateRequest;
use Topdot\Slider\Http\Requests\SliderUpdateRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('slider::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('slider::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SliderCreateRequest $request
     * @param SliderRepository $sliderRepository
     * @return Response
     */
    public function store(SliderCreateRequest $request, SliderRepository $sliderRepository)
    {
        try {
            $sliderRepository->store($request);
            session()->flash('alert-success','Slider Created Successfully');
            return redirect()->route(config('slider.routeNamePrefix').'slider.index');
        }catch (Exception $exception){
            session()->flash('alert-danger',$exception->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slider $slider
     * @return Response
     */
    public function edit(Slider $slider)
    {
        return view('slider::edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SliderUpdateRequest $request
     * @param Slider $slider
     * @param SliderRepository $sliderRepository
     * @return Response
     * @throws SliderCreateException
     */
    public function update(SliderUpdateRequest $request, Slider $slider, SliderRepository $sliderRepository)
    {
        try {
            $sliderRepository->update($request,$slider);
            session()->flash('alert-success','Slider Updated Successfully');
            return redirect()->route(config('slider.routeNamePrefix').'slider.index');
        }catch (Exception $exception){
            session()->flash('alert-danger',$exception->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slider $slider
     * @return Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        session()->flash('alert-success','Slider Deleted Successfully');
        return back();
    }
}
