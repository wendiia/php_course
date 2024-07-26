<?php

namespace App;

class View
{
    protected string $template;
    protected array $data;

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function assign($name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function display(): void
    {
        echo $this->render();
    }

    public function render(): false|string
    {
        ob_start();
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        require $this->template;

        $result = ob_get_contents();
        ob_clean();

        return $result;
    }
}
