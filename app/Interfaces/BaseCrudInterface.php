<?php

namespace App\Interfaces;

interface BaseCrudInterface
{
    public function getAll();

    public function getOne(int $id);

    public function delete(int $id);
}
