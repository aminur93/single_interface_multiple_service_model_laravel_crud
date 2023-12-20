<?php

namespace App\Service\product;

use App\Models\Product;
use App\Repository\Crud\CrudRepository;

class ProductService extends CrudRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
    
}