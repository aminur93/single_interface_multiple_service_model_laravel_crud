<?php

namespace App\Service\category;

use App\Models\Category;
use App\Repository\Crud\CrudRepository;

class CategoryService extends CrudRepository
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
    
}