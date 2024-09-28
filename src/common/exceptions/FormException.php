<?php

namespace common\exceptions;

use DomainException;
final class FormException extends DomainException
{
    private array $errors = [];

    public function __construct() {
        parent::__construct('Form Exception', 400);
    }

    public function addError(string $attribute, array $data = []): void
    {
        $this->errors[$attribute] = $data;
    }

    public function addErrorMessage(string $attribute, string $message): void
    {
        $this->errors[$attribute] = [
            'message' => $message,
        ];
    }
}
