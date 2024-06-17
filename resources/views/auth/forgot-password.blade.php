<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Aizmirsāt paroli? Nav problēmu. Vienkārši paziņojiet mums savu e-pasta adresi, un mēs jums nosūtīsim saiti, lai atiestatītu paroli.') }}
    </div>

    <!-- Sesijas status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- E-pasta adrese -->
        <div>
            <x-input-label for="email" :value="__('E-pasts')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Nosūtīt paroles atiestatīšanas saiti') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
