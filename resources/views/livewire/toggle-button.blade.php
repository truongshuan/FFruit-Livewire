<div class="form-check form-switch">
    <input type="checkbox" id="{{ $model->id }}" class="form-check-input" wire:model="isActive" data-bootstrap-switch
        data-on-color="success" data-off-color="danger">
    <label for="{{ $model->id }}" class="form-check-label">{{ $model->name }}</label>
</div>