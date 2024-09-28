<?php

namespace api\forms;

use common\components\AbstractForm;
use common\repositories\UserRepository;

final class CreateOrderForm extends AbstractForm
{
    public $user_id;
    public $amount;
    public $term;

    public function rules(): array
    {
        return [
            [
                ['user_id', 'amount', 'term'],
                'required',
            ],
            [
                ['user_id', 'amount', 'term'],
                'integer',
            ],
            [
                'user_id',
                'validateOrder',
            ]
        ];
    }

    public function validateOrder(): void
    {
        $repositoryUser = new UserRepository();

        $existsUsers = $repositoryUser->existsByIdAndIsApproved($this->user_id);
        if ($existsUsers) {
            $this->addError('user_id', 'У пользователя есть минимум одна одобренная заявка!');
        }
    }
}
