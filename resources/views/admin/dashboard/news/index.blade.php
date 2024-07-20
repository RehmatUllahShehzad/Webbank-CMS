@extends('layouts.master')

@section('page')
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            Manage News
                        </h4>
                        <a href="{{ route(config('cms.routeNamePrefix').'news.create')  }}" class="btn btn-primary">Create News</a>
                    </div>
                    <div class="card-content">
                        <livewire:admin.news.news-table-component/>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
