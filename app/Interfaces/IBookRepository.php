<?php

namespace App\Interfaces;

interface IBookRepository extends IBaseRepository
{
    public function storeBook($request);
    public function updateBook($request, $id);
    public function updateStatus($id);
    public function featuredBooks();
    public function latestBooks();
    public function specialBooks();
    public function newRelease();
    public function relatedBooks($id);
    public function bookSearch($request);
    public function bookSearchAjax($request);
}
