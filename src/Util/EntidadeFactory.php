<?php

namespace App\Util;

interface EntidadeFactory
{
    public function criarEntidade(string $json);
}