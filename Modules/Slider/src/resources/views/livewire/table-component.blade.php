<div class="pt-1 position-relative">
    <table class="table table-responsive-md mb-0" aria-describedby="main table">
        <thead>
        <tr>
            <th scope="row">
                <input class="form-control" placeholder="Search By title" type="search" wire:model.debounce.500ms="title">
            </th>
            <th scope="row"></th>
            <th scope="row"></th>
            <th scope="row"></th>
            <th scope="row"></th>
        </tr>
        <tr>
            <th scope="row">Image</th>
            <th scope="row">
                <a href="javascript:void(0);" wire:click="sort('title')">
                    Title
                </a>
                @if ($orderBy == 'title')
                    {!! $sortArrow !!}
                @endif
            </th>
            <th scope="row">Slug</th>
            <th class="text-center" scope="row">
                <a href="javascript:void(0);" wire:click="sort('is_active')">
                    Active
                </a>
                @if ($orderBy == 'is_active')
                    {!! $sortArrow !!}
                @endif
            </th>
            <th scope="row">
                <a href="javascript:void(0);" wire:click="sort('created_at')">
                    Created At
                </a>
                @if ($orderBy == 'created_at')
                    {!! $sortArrow !!}
                @endif
            </th>
            <th scope="row">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sliders as $slider)
            <tr>
                <td style="width: 12%" >
                    @if ($slider->image)
                        <img src="{{ $slider->image }}" style="width: 100%" alt="{{ $slider->image }}">
                    @endif
                </td>
                <td>
                    {{ $slider->title }}
                </td>
                <td>
                    {{ $slider->slug }}
                </td>
                <td class="text-center" style="width: 12%">
                    <div>
                        <livewire:status-toggle-component :key="$slider->getUniqueKey('status')" :model="$slider" />
                    </div>
                </td>
                <td>
                    {{ $slider->created_at->format('m-d-Y g:i:s a') }}
                </td>
                <td>
                    <div class="btn-group">
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-success dropdown-toggle waves-effect waves-light">
                                Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropright">

                                <a href="{{ route(config('slider.routeNamePrefix').'slider.edit',$slider) }}" title="Edit Page" class="dropdown-item w-100">
                                    <em class="fa fa-edit"></em> Edit
                                </a>

                                <button class="dropdown-item w-100 text-danger position-relative" wire:click="$emit('confirmDelete','{{$slider->id}}')">
                                    <em class="feather icon-trash-2"></em> Delete
                                    @include('layouts.livewire.button-loading')
                                </button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end px-2 mx-2 my-2">
        {{--{{ $sliders->links() }}--}}
    </div>
    @include('layouts.livewire.loading')
</div>
