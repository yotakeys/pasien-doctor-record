<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($errors->all() as $error)
                <div class="w-full px-4 py-2 text-red-600">{{ $error }}</div>
            @endforeach
            <form method="post" action="{{ route('form-record.add') }}" class="mt-6 space-y-6" enctype="multipart/form-data">>
                @csrf

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Add') }}</x-primary-button>

                    @if (session('status') === 'record-added')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Added.') }}</p>
                    @endif
                </div>

                <div>
                    <x-input-label for="pasien_id" :value="__('pasien')" />
                    <select id="pasien_id" name="pasien_id" class="mt-1 block w-full" required autofocus>
                        @foreach($pasien as $p)
                            <option value="{{$p->id}}">{{$p->nama}}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('pasien_id')" />
                </div>

                <div>
                    <x-input-label for="doctor_id" :value="__('doctor')" />
                    <select id="doctor_id" name="doctor_id" class="mt-1 block w-full" required autofocus>
                        @foreach($doctor as $d)
                            <option value="{{$d->id}}">{{$d->nama}}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('doctor_id')" />
                </div>

                <div>
                    <x-input-label for="kondisi" :value="__('Kondisi')" />
                    <x-text-input id="kondisi" name="kondisi" type="text" class="mt-1 block w-full"  required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('kondisi')" />
                </div>

                <div>
                    <x-input-label for="suhu" :value="__('Suhu')" />
                    <x-text-input id="suhu" name="suhu" type="number" step="0.1" class="mt-1 block w-full"  required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('suhu')" />
                </div>

                <div>
                    <x-input-label for="resep" :value="__('Resep')" />
                    <x-text-input id="resep" name="resep" type="file" class="mt-1 block w-full"  required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('resep')" />
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
