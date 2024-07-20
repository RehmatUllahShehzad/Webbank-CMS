<div>
    <div class="position-relative overflow-hidden">
        @if ($model->isActive())
            <button class="btn btn-sm btn-success w-100"  wire:click="markDisable()">
                <em class="fa fa-check"></em>
                Active
            </button>
        @else
            <button class="btn btn-sm btn-danger w-100" wire:click="markActive()">
                <em class="fa fa-times"></em>
                Disabled
            </button>
        @endif
        @include('layouts.livewire.button-loading')
    </div>
</div>
