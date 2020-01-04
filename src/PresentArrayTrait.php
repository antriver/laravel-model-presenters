<?php

namespace Antriver\LaravelModelPresenters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;

trait PresentArrayTrait
{
    /**
     * @param Model[]|\Iterator|Collection $models
     * @param array $args
     *
     * @return array
     */
    public function presentArray($models, ...$args): array
    {
        /** @var ModelPresenterInterface $this */
        $array = [];
        foreach ($models as $model) {
            $presented = $this->present($model, ...$args);
            if (is_array($presented)) {
                $array[] = $presented;
            }
        }

        return $array;
    }

    /**
     * @param AbstractPaginator $paginator
     * @param array $args
     */
    public function presentPaginator(AbstractPaginator $paginator, ...$args)
    {
        $paginator->getCollection()->transform(
            function ($item) use ($args) {
                return $this->present($item, ...$args);
            }
        );
    }
}
