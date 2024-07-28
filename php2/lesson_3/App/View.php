<?php

namespace App;
use Countable;

/**
 * @property $news
 */

class View implements Countable
{
    protected array $data;

    public function __set($key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        return $this->data[$key];
    }

    public function display($template): void
    {
        echo $this->render($template);
    }

    public function render($template): false|string
    {
        ob_start();
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        require $template;

        $result = ob_get_contents();
        ob_clean();

        return $result;
    }

    public function count(): int
    {
        return count($this->data);
    }
}
