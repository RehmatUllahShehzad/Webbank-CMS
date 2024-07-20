<div class="pt-1 position-relative">

        
    <table class="table table-responsive-md mb-0" aria-describedby="form-table">
        <thead>
            <tr>
                <th scope="row">
                    <input class="form-control" placeholder="Search By email" type="search"
                        wire:model.debounce.500ms="email">
                        
                </th>
                <th scope="row">
                    <select class="form-control" wire:model.debounce.500ms="type">
                        <option value="all">All</option>
                        <option value="contact_us">Contact Us</option>
                        <option value="become_partner">Become Partner</option>
                    </select>
                </th>
                <th scope="row"></th>
                <th scope="row"></th>
                <th scope="row"></th>
                <th scope="row"></th>
                <th scope="row"></th>
                <th scope="row"></th>
            </tr>
            <tr>
                <th scope="row"> First name </th>
                <th scope="row"> Last name </th>
                <th scope="row"> Email </th>
                <th scope="row"> Type</th>
                <th scope="row"> Created At</th>
                <th scope="row"> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($forms as $form)
                <tr>
                    <td>
                        {{ $form->first_name }}

                    </td>
                    <td>
                        {{ $form->last_name }}

                    </td>
                    <td>
                        {{ $form->email }}
                    </td>
                    <td>
                        {{ $form->type }}
                    </td>
                    <td>
                        {{ $form->created_at->format('m-d-Y g:i:s a')}}
                    </td>
                    <td>
                        <div class="btn-group">
                            <div class="dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    class="btn btn-success dropdown-toggle waves-effect waves-light">
                                    Action
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropright">
                                    <a href="{{ route('admin.forms.show', $form) }}" title="show Page"
                                        class="dropdown-item w-100">
                                        <em class="fa fa-eye"></em> Show
                                    </a>
                                    <button class="dropdown-item w-100 text-danger position-relative"
                                        wire:click="$emit('confirmDelete','{{ $form ->id }}')">
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
        {{ $forms->links() }}
    </div>
    @include('layouts.livewire.loading')
</div>
