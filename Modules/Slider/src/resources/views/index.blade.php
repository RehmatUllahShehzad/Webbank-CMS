@extends('layouts.master')

@section('page')
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            Manage Sliders
                        </h4>
                        <a href="{{ route(config('slider.routeNamePrefix').'slider.create')  }}" class="btn btn-primary">Create Slider</a>
                    </div>
                    <div class="card-content">
                        <livewire:slider::table-component/>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
