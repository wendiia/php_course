<?php

namespace App;

class View
{
    protected array $data;

    public function assign(string $name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function display(string $template): void
    {
        echo $this->render($template);
    }

    public function render(string $template): string
    {
        ob_start();

        if (!empty($this->data)) {
            foreach ($this->data as $key => $item) {
                $$key = $item;
            }
        }

        include $template;
        $view = ob_get_contents();
        ob_end_clean();
        return $view;
    }
}
