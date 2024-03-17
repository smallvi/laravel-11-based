@extends('admin.layouts.app', ['title'=> trans_choice('labels.product_category',2), 'action' => 'List'])

@section('content')

<div class="items-center justify-between block px-4 pb-4 bg-white sm:flex md:divide-x dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center mb-4 sm:mb-0">
        <form class="sm:pr-3" action="{{ route('admin.product-categories.index') }}" method="GET">
            <label for="products-search" class="sr-only">Search</label>
            <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                <input type="text" name="search" id="products-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search for products" value="{{ $request->query('search') }}">
            </div>
        </form>

    </div>
    <a href="{{ route('admin.product-categories.create') }}" id="createProductButton" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-create-product-default" data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default" data-drawer-placement="right">
        {{ __('labels.add', ['module'=> trans_choice('labels.product_category',1)]) }}
    </a>
</div>

<div class="flex flex-col">

    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow">
                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                {{ __('labels.no') }}
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                {{ __('labels.name') }}
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                {{ __('labels.status') }}
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                {{ trans_choice('labels.action',2) }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @forelse ($product_categories as $product_category)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{ $loop->iteration }}
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <div class="text-base font-semibold text-gray-900 dark:text-white"> {{ $product_category->name }} </div>
                            </td>
                            <td class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">{!! $product_category->status_badge !!}</td>
                            <td class="p-4 space-x-2 text-left whitespace-nowrap">
                                @can('product_category.read')
                                <a href="{{ route('admin.product-categories.show', $product_category->id) }}" type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    <i class="w-4 h-4 mr-2 fa-solid fa-eye"></i>
                                    View
                                </a>
                                @endcan
                                @can('product_category.update')
                                <a href="{{ route('admin.product-categories.edit', $product_category->id) }}" type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <i class="w-4 h-4 mr-2 fa-solid fa-pen-to-square"></i>
                                    Edit
                                </a>
                                @endcan
                                @can('product_category.delete')
                                <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                    <i class="w-4 h-4 mr-2 fa-solid fa-trash-can"></i>
                                    Delete
                                </button>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-4 text-sm font-normal text-center text-gray-500 whitespace-nowrap dark:text-gray-400">No Data Available</td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{ $product_categories->links() }}
@endsection

@push('scripts')

@endpush