<?php

namespace App;

use Countable;
use Iterator;
use App\Traits\PropertiesStorageTrait;

/**
 * @property $data
 * @property $news
 * @property $article
 */

class View implements Countable, Iterator
{
    use PropertiesStorageTrait;

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

    public function current(): mixed
    {
        return current($this->data);
    }

    public function next(): void
    {
        next($this->data);
    }

    public function key(): mixed
    {
        return key($this->data);
    }

    public function valid(): bool
    {
        return null !== key($this->data);
    }

    public function rewind(): void
    {
        reset($this->data);
    }
}
