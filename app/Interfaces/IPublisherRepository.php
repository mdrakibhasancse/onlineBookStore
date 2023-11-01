<?php

namespace App\Interfaces;

interface IPublisherRepository extends IBaseRepository
{
    public function storePublisher($request);

    public function updatePublisher($request,$id);
}
