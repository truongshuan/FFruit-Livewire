<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class GlobalObserver
{
    private mixed $enableModelLog;
    public function __construct()
    {
        $this->enableModelLog = session('model_log');
        if ($this->enableModelLog === 'disable') {
            return;
        }
    }

    public function created(Model $model): void
    {
        if ($this->enableModelLog === 'active') {
            Log::channel('model')->info('Created ' . get_class($model) . ' with ID ' . $model->id . ': ' . $model->toJson());
        }
    }

    public function updated(Model $model): void
    {
        if ($this->enableModelLog === 'active') {
            Log::channel('model')->info('Updated ' . get_class($model) . ' with ID ' . $model->id . ': ' . $model->toJson());
        }
    }

    public function deleted(Model $model): void
    {
        if ($this->enableModelLog === 'active') {
            Log::channel('model')->info('Deleted ' . get_class($model) . ' with ID ' . $model->id . ': ' . $model->toJson());
        }
    }

    public function forceDeleted(Model $model)
    {
        // ...
    }
}
