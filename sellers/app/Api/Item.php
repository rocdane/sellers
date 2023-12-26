<?php

namespace App\Api;

interface Item
{
    public function getName(): string;
    public function getPrice(): int;
    public function getPacking(): Packing;
}