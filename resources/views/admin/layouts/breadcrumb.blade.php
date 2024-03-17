<nav class="flex mb-5" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-1 text-sm font-medium md:space-x-2">
        <li class="flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                <i class="fa-solid fa-house w-4 mr-2.5"></i>
                Home
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <i class="w-4 text-gray-400 fa-solid fa-angle-right"></i>
                <span class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">{{ $title }}</span>
            </div>
        </li>
        @if (($action))
        <li>
            <div class="flex items-center">
                <i class="w-4 text-gray-400 fa-solid fa-angle-right"></i>
                <span class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">{{ $action }}</span>
            </div>
        </li>
        @endif


    </ol>
</nav>