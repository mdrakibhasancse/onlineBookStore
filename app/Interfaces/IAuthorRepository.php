<?php

namespace App\Interfaces;

interface IAuthorRepository extends IBaseRepository
{
    public function storeAuthor($request);
    public function updateAuthor($request,$id);
}
