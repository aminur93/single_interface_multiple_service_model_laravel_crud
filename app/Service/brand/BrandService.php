<?php

namespace App\Service\brand;

use App\Models\Brand;
use App\Repository\Crud\CrudRepository;

class BrandService extends CrudRepository
{

    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }
}