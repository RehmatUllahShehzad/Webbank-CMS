@extends('layouts.master')

@section('page')
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">
                           Form Management
                        </h4>
                    </div>
                    <div class="card-content">
                        <livewire:admin.form.forms-table-component/>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
