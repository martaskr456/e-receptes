<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Paldies par reģistrāciju! Pirms sākat, lūdzu, apstipriniet savu e-pasta adresi, noklikšķinot uz saites, ko mēs jums tikko nosūtījām. Ja nesaņēmāt e-pastu, mēs priecāsimies jums nosūtīt vēl vienu.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Jauna apstiprinājuma saite ir nosūtīta uz jūsu reģistrācijas laikā norādīto e-pasta adresi.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Nosūtīt apstiprinājuma e-pastu vēlreiz') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Izrakstīties') }}
            </button>
        </form>
    </div>
</x-guest-layout>
