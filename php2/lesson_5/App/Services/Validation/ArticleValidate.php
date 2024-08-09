<?php

namespace App\Services\Validation;

use App\Exceptions\ModelErrors;
use App\Exceptions\ModelException;

class ArticleValidate
{
    protected ModelErrors $errors;

    /**
     * @throws ModelErrors
     */
    public function validate(string $title, string $lead): void
    {
        $this->errors = new ModelErrors();

        $this->checkTitle($title);
        $this->checkLead($lead);

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
        } else {
            $this->errors->addError(
                'title',
                new ModelException('Название статьи не может быть пустым')
            );
        }
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
        } else {
            $this->errors->addError(
                'lead',
                new ModelException('Описание не может быть пустым')
            );
        }
    }
}
