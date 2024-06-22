<?php

class View
{
    protected array $data;
    protected string $templateLayout = __DIR__ . '/../templates/layout.php';

    public function assign($name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function display(string $template): void
    {
        ob_start();
        include $this->templateLayout;
        $view = ob_get_contents();
        ob_end_clean();
        echo $view;
    }

    public function render(string $template): string
    {
        ob_start();
        include $this->templateLayout;
        $view = ob_get_contents();
        ob_end_clean();
        return $view;
    }
}
