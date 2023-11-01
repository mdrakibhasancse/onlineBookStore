<?php

namespace App\Interfaces;

interface ICategoryRepository extends IBaseRepository
{
    public function storeCategory($request);
    public function updateCategory($request,$id);
    public function updateStatus($id);
}
