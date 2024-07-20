<div class="row">
    <div class="col-md-4 form-group">
        <label for="">
            Menu Item Title
        </label>
        <input type="text" class="form-control" placeholder="Enter Title" wire:model.defer="title">
        @error('title')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-4 form-group">
        <label for="">
            Menu Item Link
        </label>
        <input type="text" class="form-control" placeholder="Enter Link" wire:model.defer="link">
        @error('link')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
     <div class="controls col-md-4 form-group">
                <label class="col-md-6">Open In</label>
                <div class="col-md-6">
                    <select class="form-control" wire:model.defer="target">
                        <option value="" selected >Same Tab</option>
                        <option value="_blank">New Tab</option>
                    </select>
                    @error('target')
                    <div class="help-block text-danger"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
    <div class="col-md-12 form-group">
        <button class="btn btn-primary position-relative" wire:click="save">
            Save
            @include('layouts.livewire.button-loading')
        </button>
    </div>
</div>
