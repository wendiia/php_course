<?php

class GuestBookRecord
{
    protected string $message;
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    function getMessage(): string
    {
        return $this->message;
    }
}