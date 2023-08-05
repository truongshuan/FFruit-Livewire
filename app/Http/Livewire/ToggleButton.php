<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{
    public Model $model;
    public string $statusField;
    public bool $isActive;

    /**
     * @param Model $model
     * @param string $statusField
     *
     * @return [type]
     */
    public function mount(Model $model, $statusField = 'status')
    {
        $this->model = $model;
        $this->statusField = $statusField;
        $this->isActive = (bool) (!$this->model->{$this->statusField});
    }

    /**
     * Listener event , change status in database
     * @param mixed $value
     *
     * @return [type]
     */
    public function updatedIsActive($value)
    {
        $this->model->{$this->statusField} = $value ? (string) 0 : (string) 1;
        $this->model->save();
        $this->emit('modelUpdated', $this->model->id);
    }

    /**
     * @return [type]
     */
    public function render()
    {
        return view('livewire.toggle-button');
    }
}
