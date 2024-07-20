@extends('layouts.master')
@section('page')
<section id="vue-non-standard-pages">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Create News</h4>
                    <a href="{{ route(config('cms.routeNamePrefix').'news.index') }}" class="btn btn-primary">Back to List</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route(config('cms.routeNamePrefix').'news.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            {{-- <input type="hidden" name="type" value="{{\Topdot\Cms\Models\Page::NEWS}}"> --}}

                            {{-- <livewire:slug-generator /> --}}
                            <livewire:slug-generator />

{{-- 
                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right">title</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="News title" />
                                    @error('title')
                                    <div class="help-block text-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div> --}}
                          
                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right">Description</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="mytextarea" name="description"  rows="4" cols="50">{{{old('description') }}}</textarea>
                                    @error('description')
                                    <div class="help-block text-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right">Status</label>
                                <div class="col-md-8">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>In-Active</option>
                                    </select>
                                    @error('status')
                                    <div class="help-block text-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right">Featured</label>
                                <div class="col-md-8">
                                    <select name="is_featured" class="form-control">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('is_featured')
                                    <div class="help-block text-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right">Date</label>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" name="date" value="{{ old('date') }}" placeholder="News title" />
                                    @error('title')
                                    <div class="help-block text-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right">Feature Image</label>
                                <div class="col-md-8">
                                    <input type="file" onchange="loadFile(event)" accept="image/*" class="form-control" value="{{ old('feature') }}" name="feature" placeholder="Feature Image">
                                    @error('feature')
                                    <div class="help-block text-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-2"></div>
                                <div class="col-md-10">
                                    <img alt="news feature image" id="output" style="max-height: 200px;"/>
                                </div>
                            </div>
                            <div class="row mt-1 justify-content-center">
                                <div class="col-8 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

