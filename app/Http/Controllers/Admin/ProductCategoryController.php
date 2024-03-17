<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        if (!Gate::allows('product_category.read')) {
            abort(403);
        }

        $product_categories = ProductCategory::query()
            ->when($request->has('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('status', 'like', '%' . $request->search . '%');
            })
            ->paginate($perPage = 10, $columns = ['*'], $pageName = 'product_categories');

        return view('admin.product_categories.index', compact('request', 'product_categories'));
    }

    public function create()
    {
        if (!Gate::allows('product_category.create')) {
            abort(403);
        }

        return view('admin.product_categories.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('product_category.create')) {
            abort(403);
        }
    }

    public function show(ProductCategory $productCategory)
    {
        if (!Gate::allows('product_category.read')) {
            abort(403);
        }
    }

    public function edit(ProductCategory $productCategory)
    {
        if (!Gate::allows('product_category.update')) {
            abort(403);
        }
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        if (!Gate::allows('product_category.update')) {
            abort(403);
        }
    }

    public function destroy(ProductCategory $productCategory)
    {
        if (!Gate::allows('product_category.delete')) {
            abort(403);
        }
    }
}
