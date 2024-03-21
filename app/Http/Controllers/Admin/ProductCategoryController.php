<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Services\ProductCategoryService;
use App\Http\Requests\Admin\ProductCategoryRequest;

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

    public function store(ProductCategoryRequest $request)
    {
        if (!Gate::allows('product_category.create')) {
            abort(403);
        }

        (new ProductCategoryService())
            ->withRequest($request)
            ->store($request);

        return redirect()->route('admin.product-categories.index');
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

        (new ProductCategoryService())
            ->withModel($productCategory)
            ->destroy();

        return redirect()->route('admin.product-categories.index')->with('success','Delete Product Categories Successfully');
    }
}
