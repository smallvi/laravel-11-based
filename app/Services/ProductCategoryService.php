<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryService
{
    public $model;
    public $request;

    public function __construct()
    {
        $this->model = new ProductCategory();
    }

    public function withModel(Model $model)
    {
        $this->model = $model;
        return $this;
    }

    public function withRequest(Request $request)
    {
        $this->request = $request;
        return $this;
    }

    public function store()
    {
        $this->model->create([
            'name' => $this->request->get('name'),
            'status' => $this->request->get('status'),
            'sku' => $this->request->get('sku'),
            'description' => $this->request->get('description')
        ]);

        return $this;
    }

    public function destroy()
    {
        $this->model->delete();

        return $this;
    }
}
