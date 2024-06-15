<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>{{ __("Welcome to your Dashboard!") }}</p>
                    <p>{{ __("You're logged in as") }} {{ Auth::user()->name }}</p>
                    <p>{{ __("Role:") }} {{ Auth::user()->role}}</p>
                    <p>{{ __("Email:") }} {{ Auth::user()->email }}</p>

                    <div class="mt-6">
                        <ul>
                            <li>{{ __("Recent Activity") }}</li>
                            <li>{{ __("You logged in.") }}</li>
                            <li>{{ __("Uploaded a new recipe.") }}</li>
                        </ul>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:text-blue-700">{{ __("Edit Profile") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



