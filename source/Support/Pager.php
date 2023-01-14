<?php
namespace Source\Support;

use CoffeeCode\Paginator\Paginator;

class Pager extends Paginator
{
    public function __construct(?string $link = null, ?string $title = null, ?array $first = null, ?array $last)
    {
        parent::__construct($link, $title, $first, $last);
    }
}