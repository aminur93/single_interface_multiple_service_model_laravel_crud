<?php

namespace App\Repository\Crud;

interface CrudInterface
{
    public function index();
    public function create($request);
    public function edit($id);
    public function update($request, $id);
    public function destroy($id);
}