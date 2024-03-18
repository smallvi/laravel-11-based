@extends('admin.layouts.app', ['title'=> trans_choice('labels.product_category',2), 'action' => 'List'])

@section('content')

<div class="col-span-2 p-2">
    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <h3 class="mb-4 text-xl font-semibold dark:text-white">General information</h3>
        <form action="#">
            <div class="grid grid-cols-6 gap-6">

                <div class="col-span-6 sm:col-span-3">
                    <x-input-label value="{{__('labels.name')}}"></x-input-label>
                    <x-text-input id="name" type="text" name="name" placeholder="Robot Vacuum Cleaner" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-input-label value="{{__('labels.sku')}}"></x-input-label>
                    <x-text-input id="sku" type="number" name="sku" placeholder="123456789012" required />
                    <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-input-label value="{{__('labels.status')}}"></x-input-label>
                    <x-select-input :options="$active_statuses" name="status"></x-select-input>
                    <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Descripton</label>
                    <x-text-area name="description" rows="4" placeholder="Write your thoughts here..."></x-text-area>
                </div>

                <div class="col-span-6 sm:col-full">
                    <button class="focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center  text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800  " type="submit">Save all</button>
                </div>
            </div>
        </form>
    </div>
    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <h3 class="mb-4 text-xl font-semibold dark:text-white">Price information</h3>
        <form action="#">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="current-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Normal Price</label>
                    <input type="text" name="current-password" id="current-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="••••••••" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                        password</label>
                    <input data-popover-target="popover-password" data-popover-placement="bottom" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required>
                    <div data-popover id="popover-password" role="tooltip" class="absolute z-10 invisible inline-block text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                        <div class="p-3 space-y-2">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Must have at least 6 characters</h3>
                            <div class="grid grid-cols-4 gap-2">
                                <div class="h-1 bg-orange-300 dark:bg-orange-400"></div>
                                <div class="h-1 bg-orange-300 dark:bg-orange-400"></div>
                                <div class="h-1 bg-gray-200 dark:bg-gray-600"></div>
                                <div class="h-1 bg-gray-200 dark:bg-gray-600"></div>
                            </div>
                            <p>It’s better to have:</p>
                            <ul>
                                <li class="flex items-center mb-1">
                                    <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    Upper & lower case letters
                                </li>
                                <li class="flex items-center mb-1">
                                    <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    A symbol (#$&)
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    A longer password (min. 12 chars.)
                                </li>
                            </ul>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                    <input type="text" name="confirm-password" id="confirm-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="••••••••" required>
                </div>
                <div class="col-span-6 sm:col-full">
                    <button class="focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center  text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800  " type="submit">Save all</button>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection

@push('scripts')

@endpush