<?php

namespace Antriver\LaravelModelPresenters;

use Illuminate\Database\Eloquent\Model;

class DefaultPresenter implements ModelPresenterInterface
{
    use PresentArrayTrait;

    public function present(Model $model): ?array
    {
        return $model->toArray();
    }
}
