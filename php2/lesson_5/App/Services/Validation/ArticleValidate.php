<?php

namespace App\Services\Validation;

use App\Exceptions\ModelErrors;
use App\Exceptions\ModelException;

class ArticleValidate
{
    protected ModelErrors $errors;

    /**
     * @throws ModelErrors
     * @throws ModelException
     */
    public function validate(array $data): void
    {
        $this->errors = new ModelErrors();

        try {
            $this->checkTitle($data['title']);
            $this->checkLead($data['lead']);
        } catch (\TypeError  $e) {
            throw new ModelException('Таких свойств модели не существует!');
        }

        if (!empty($this->errors->getErrors())) {
            throw $this->errors;
        }
    }

    protected function checkTitle(string $title): void
    {
        if (!empty($title)) {
            if (strlen($title) > 20) {
                $this->errors->addError(
                    'title',
                    new ModelException('Название должно быть менее 20 символов')
                );
            }
            if (str_contains($title, '!')) {
                $this->errors->addError(
                    'title',
                    new ModelException('Название не должно иметь символ "!"')
                );
            }
            return;
        }

        $this->errors->addError('title', new ModelException('Название статьи не может быть пустым'));
    }

    protected function checkLead(string $lead): void
    {
        if (!empty($lead)) {
            if (strlen($lead) < 10) {
                $this->errors->addError(
                    'lead',
                    new ModelException('Описание должно быть не менее 10 символов')
                );
            }
            if (str_contains($lead, '*')) {
                $this->errors->addError(
                    'lead',
                    new ModelException('Описание не должно иметь символ "*"')
                );
            }
            return;
        }

        $this->errors->addError('lead', new ModelException('Описание статьи не может быть пустым'));
    }
}
