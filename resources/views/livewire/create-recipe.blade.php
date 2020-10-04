<div>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create recipe') }}
            </h2>

        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4">
                    <form action>
                    <div class="flex flex-col">
                        <label for="name">Name</label>
                        <input wire:model="name" id="name" type="text" class="p-2 border border-gray-200 rounded" placeholder="name">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
