@if (session('model_log') === 'active')
<button type="submit" class="btn btn-primary" wire:click='disable()'>Tắt
    Logging</button>
@else
<button type="submit" class="btn btn-warning" wire:click='enable()'>Bật
    Logging</button>
@endif