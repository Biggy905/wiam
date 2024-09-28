<?php

namespace api\forms;

use common\components\AbstractForm;

final class CreateOrderDelayForm extends AbstractForm
{
    public $delay;

    public function rules(): array
    {
        return [
            [
                'delay',
                'required',
            ],
            [
                'delay',
                'integer',
            ],
        ];
    }
}
