<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Record List') }}
        </h2>
    </x-slot>
    @foreach($records as $record)
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Kondisi : {{$record->kondisi}}
                    <br>
                    Suhu : {{$record->suhu}}
                    <br>
                    Pasien : {{$record->pasien->nama}}
                    <br>
                    Doctor : {{$record->doctor->nama}}
                    <br>
                    Resep :
                    <br>
                    <img src="{{$record->resep_url}}">
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>
