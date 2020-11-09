<?php

namespace Lewis15520\Auditeer\app\Observers;

class SelfObserver
{

    public function updating($model)
    {
        $model_changes  = request()->get('model_changes', []);
        $updated        = [];

        foreach ($model->getDirty() as $attribute => $value) {
            $original = $model->getOriginal($attribute);
            $updated[$attribute] = [
                'dirty' => $original,
                'new'  => $value
            ];
        }

        if (!empty($updated)) {
            if (!isset($model_changes[$model->getTable()]))
                $model_changes[$model->getTable()] = [];

            $model_changes[$model->getTable()][] = $updated;
            request()->merge(['model_changes' => $model_changes]);
        }
    }

}
