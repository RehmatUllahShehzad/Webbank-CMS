<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\NewsCreateRequest;
use App\Repositories\NewsRepository;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request, NewsRepository $newsRepository)
    {
        try {
            $newsRepository->store($request);
            session()->flash('alert-success','News Created Successfully.');
            return redirect()->route(config('cms.routeNamePrefix').'news.index');
        }catch (Exception $exception){
            session()->flash('alert-danger',$exception->getMessage());
            return back()->withInput();
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
    public function edit(News $news)
    {
        return view('admin.dashboard.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsCreateRequest $request, News $news, NewsRepository $newsRepository)
    {
        try {
            $newsRepository->update($request,$news);
            session()->flash('alert-success','News Updated Successfully.');
            return redirect()->route(config('cms.routeNamePrefix').'news.index');
        }catch (Exception $exception){
            session()->flash('alert-danger',$exception->getMessage());
            return back()->withInput();
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
        //
    }

  
}
