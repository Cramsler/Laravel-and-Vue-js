<?php

namespace App\Interfaces;

interface CrudInterface
{
    public function getAll();

    public function getOne();

    public function create();

    public function update();

    public function delete();
}
