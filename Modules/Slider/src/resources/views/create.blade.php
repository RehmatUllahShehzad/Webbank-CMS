@extends('layouts.master')
@section('page')
<section id="vue-non-standard-pages">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Create Page</h4>
                    <a href="{{ route(config('slider.routeNamePrefix').'slider.index') }}" class="btn btn-primary">Back to List</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route(config('slider.routeNamePrefix').'slider.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <livewire:slug-generator />

                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right">Slider Image</label>
                                <div class="col-md-8">
                                    <input type="file" onchange="loadFile(event)" accept="image/*" class="form-control" value="{{ old('image') }}" name="image" placeholder="Slider Image">
                                    @error('image')
                                    <div class="help-block text-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-2"></div>
                                <div class="col-md-10">
                                    <img id="output" alt="image" style="max-height: 200px;"/>
                                </div>
                            </div>

                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right">Description</label>
                                <div class="col-md-8">
                                    <textarea class="form-control editor" name="description" placeholder="Slider Description">{{ old('description') }}</textarea>
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
