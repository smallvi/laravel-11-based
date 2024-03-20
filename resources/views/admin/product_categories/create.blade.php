@extends('admin.layouts.app', ['title'=> trans_choice('labels.product_category',2), 'action' => 'List'])

@section('content')

<div class="col-span-2 p-2">
    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <h3 class="mb-4 text-xl font-semibold dark:text-white">General information</h3>
        <form action="{{ route('admin.product-categories.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <x-input-label value="{{__('labels.name')}}" require="true"></x-input-label>
                    <x-text-input id="name" type="text" name="name" placeholder="Robot Vacuum Cleaner" value="{{ old('name') }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-input-label value="{{__('labels.sku')}}" require="true"></x-input-label>
                    <x-text-input id="sku" type="number" name="sku" placeholder="123456789012" value="{{ old('sku') }}" />
                    <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-input-label value="{{__('labels.status')}}" require="true"></x-input-label>
                    <x-select-input :options="$active_statuses" name="status" selected="{{ old('status') }}"></x-select-input>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
                <div class="col-span-6">
                    <x-input-label value="{{__('labels.description')}}" require="false"></x-input-label>
                    <x-text-area name="description" rows="4" placeholder="Product Desciption here..." value="{{ old('description') }}"></x-text-area>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-600">

            <h3 class="mb-4 text-xl font-semibold dark:text-white">Price information</h3>
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <x-input-label value="{{__('labels.normal_price')}}" require="true"></x-input-label>
                    <x-text-input id="normal_price" type="number" name="normal_price" value="{{ old('normal_price',0) }}" />
                    <x-input-error :messages="$errors->get('normal_price')" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-input-label value="{{__('labels.discount_type')}}" require="true"></x-input-label>
                    <x-select-input :options="$discount_types" name="discount_type" selected="{{ old('discount_type') }}"></x-select-input>
                    <x-input-error :messages="$errors->get('discount_type')" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-input-label value="{{__('labels.discount')}}" require="true"></x-input-label>
                    <x-text-input id="discount" type="number" name="discount" placeholder="10.50" value="{{ old('discount',0) }}" />
                    <x-input-error :messages="$errors->get('discount')" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-input-label value="{{__('labels.discounted_price')}}" require="true"></x-input-label>
                    <x-text-input disabled id="discounted_price" type="number" name="discounted_price" placeholder="10.50" value="{{ old('discounted_price',0) }}" />
                    <x-input-error :messages="$errors->get('discounted_price')" class="mt-2" />
                </div>

            </div>

            <div class="col-span-6 pt-6 sm:col-full">
                <button class="focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center  text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800  " type="submit">Save all</button>
            </div>
        </form>
    </div>


</div>

@endsection

@push('scripts')

@endpush