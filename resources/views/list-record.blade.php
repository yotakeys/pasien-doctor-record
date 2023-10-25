<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Record List') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="get" action="{{ route('list-record')}}" class="mt-6 space-y-6">
                        @csrf

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Apply') }}</x-primary-button>
                            @if (session('status') === 'filter-added')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Applied') }}</p>
                            @endif
                        </div>

                        <div>
                            <x-input-label for="pasien_id" :value="__('pasien')" />
                            <select id="pasien_id" name="pasien_id" class="mt-1 block w-full" autofocus>             
                                <option disabled selected value> -- select pasien -- </option>
                                @foreach($pasien as $p)
                                    <option value="{{$p->id}}">{{$p->nama}}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('pasien_id')" />
                        </div>

                        <div>
                            <x-input-label for="doctor_id" :value="__('doctor')" />
                            <select id="doctor_id" name="doctor_id" class="mt-1 block w-full" autofocus>
                                <option disabled selected value> -- select an doctor -- </option>
                                @foreach($doctor as $d)
                                    <option value="{{$d->id}}">{{$d->nama}}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('doctor_id')" />
                        </div>
            </form>
        </div>
    </div>

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
