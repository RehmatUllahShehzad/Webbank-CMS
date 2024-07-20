@extends('layouts.master')
@section('page')
    <section id="vue-non-standard-pages">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Form Detail </h4>
                        <a href="{{ route('admin.forms.index') }}" class="btn btn-primary">Back to List</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right"><strong>First Name: </strong></label>
                                <div class="col-md-8">
                                    {{ $form->first_name }}
                                </div>
                            </div>
                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right"><strong>Last Name: </strong></label>
                                <div class="col-md-8">
                                    {{ $form->last_name }}
                                </div>
                            </div>
                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right"><strong>Email: </strong></label>
                                <div class="col-md-8">
                                    {{ $form->email }}
                                </div>
                            </div>

                            @foreach ($form->extra_data as $key => $value)
                            <div class="controls row mb-1 align-items-center">
                                <label class="col-md-2 text-md-right"><strong>{{ Str::of($key)->replace('_', ' ')->title() }}: </strong></label>
                                <div class="col-md-8">
                                    {{ $value }} 
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
