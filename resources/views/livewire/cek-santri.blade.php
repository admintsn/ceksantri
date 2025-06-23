<div class="w-full justify-center flex text-center">
    <div class="flex px-3 py-3 w-fit justify-center justify-self-center">
        <div class="grid grid-cols-1 card lg:card-side bg-white shadow-xl px-4 py-4 rounded-xl">
            <div class="card-body">
                <div class="text-lg text-center"><strong>Cek Status Santri</strong>
                </div>
            </div>
            <div>
                <div>
                    <form wire:submit="ceknismsantri">
                        <!--Username -->
                        <div class="pt-4">
                            <x-input-label for="ceknism" :value="__('Masukkan nomor NISM (6 digit)')" />
                            <x-text-input id="ceknism" class="block mt-1 w-full" type="text" name="ceknism"
                                minlength="6" maxlength="6" :value="old('ceknism')" required autocomplete="ceknism"
                                wire:model="ceknism" />
                            <x-input-error :messages="$errors->get('ceknism')" class="mt-2" />
                            {{--
                            <x-input-error :messages="$errors->get('username')" class="mt-2" /> --}}
                        </div>


                        <div class="flex items-center justify-center mt-4">
                            <x-primary-button>
                                {{ __('Cek') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                </br>
                <div>
                    <div>
                        {{ $this->table }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>