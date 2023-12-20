<?php

namespace App\Repository\Crud;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CrudRepository implements CrudInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model->all();

        return $data;
    }

    public function create($request)
    {
        if($request->method() == 'POST') {
            
            DB::beginTransaction();

            try {
                    
                $data = $this->model->create($request->all());

                DB::commit();

                return $data;

            } catch (\Throwable $th) {
                DB::rollback();

                throw $th;
            }
        } 
    }

    public function edit($id)
    {
        $data = $this->model->find($id);

        return $data;
    }

    public function update($request, $id)
    {
        if($request->method() == 'PUT') {
            
            DB::beginTransaction();

            try {
                    
                $data = $this->model->find($id);

                $data->update($request->all());

                DB::commit();

                return $data;

            } catch (\Throwable $th) {
                DB::rollback();

                throw $th;
            }
        }
    }

    public function destroy($id)
    {
        try {
            
            $data = $this->model->find($id);

            $data->delete();

            return $data;

        } catch (\Throwable $th) {
            
            throw $th;
        }
    }
}