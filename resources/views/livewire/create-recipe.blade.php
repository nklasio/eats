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
                    <div class="flex flex-col pb-4">
                        <label class="font-semibold text-lg text-gray-800" for="name">Name</label>
                        <input wire:model="name" id="name" type="text" class="p-2 border border-gray-200 rounded" placeholder="name">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col">
                        <label class="font-semibold text-lg text-gray-800" for="description">Description</label>
                        <textarea wire:model="description" id="description" class="form-textarea mt-1 block w-full" rows="3" placeholder="Enter a description here..."></textarea>
                        @error('description') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    </form>
                </div>

                <div class="flex flex-row ">
                    <div class="p-4 w-1/2">
                        <h2 class="pb-4 font-semibold text-lg text-gray-800 leading-tight">
                            {{ __('Ingredients') }}
                        </h2>

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                              <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                  Name
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                  Quantity
                                </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($ingredients as $sIngredient)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">
                                                    {{ $sIngredient['name'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 flex">
                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                            {{ $sIngredient['quantity'] }}
                                        </div>
                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                            {{ $sIngredient['quantity_type'] }}
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900">
                                                No ingredients yet.
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endforelse

                              <!-- More rows... -->
                            </tbody>
                          </table>


                        </form>
                    </div>

                    <div class="p-4 w-1/2" >
                        <form action>
                            <div class="flex flex-col pb-4">
                                <label for="ingredientSearch">
                                    <h2 class="pb-4 font-semibold text-lg text-gray-800 leading-tight">
                                        {{ __('Add Ingredients') }}
                                    </h2>
                                </label>
                                <input wire:model="ingredientSearchQuery" id="ingredientSearch" type="search" class="p-2 border border-gray-200 rounded" placeholder="name" autocomplete="off">
                                @error('ingredientSearchQuery') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="h-96 overflow-y-scroll">
                                <table class="min-w-full">
                                    <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Quantity
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 h-48">
                                        @forelse ($searchedIngredients as $sIngredient)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                                            {{ $sIngredient->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 flex whitespace-no-wrap items-baseline">
                                                <input class="w-16" wire:model="ingredientQuantity.{{ $sIngredient->name }}.quantity" type="text" name="quantity" id="quantity" placeholder="quantity">

                                                <select class="w-16 mr-2" wire:model="ingredientQuantity.{{ $sIngredient->name }}.quantityType" name="quan_type" id="quan_type">
                                                    <option value="gr">@lang('gr')</option>
                                                    <option value="kg">@lang('kg')</option>
                                                    <option value="ml">@lang('ml')</option>
                                                    <option value="pack">@lang('pack')</option>
                                                    <option value="l">@lang('l')</option>
                                                    <option value="ts">@lang('teaspoon')</option>
                                                    <option value="el">@lang('tablespoon')</option>
                                                </select>

                                            </td>
                                            <td>
                                                <a wire:click.prevent="addIngredient('{{ $sIngredient->name }}')" class="bg-white hover:bg-gray-100 text-gray-600 py-1 px-2 border border-gray-400 rounded shadow right-0">@lang('add')</a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                                        {{ $ingredientSearchQuery }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 flex whitespace-no-wrap items-baseline">
                                            <input class="w-16" wire:model="ingredientQuantity.{{ $ingredientSearchQuery }}.quantity" type="text" name="quantity" id="quantity" placeholder="quantity">

                                            <select class="w-16 mr-2" wire:model="ingredientQuantity.{{ $ingredientSearchQuery }}.quantityType" name="quan_type" id="quan_type">
                                                <option value="gr">@lang('gr')</option>
                                                <option value="kg">@lang('kg')</option>
                                                <option value="ml">@lang('ml')</option>
                                                <option value="pack">@lang('pack')</option>
                                                <option value="l">@lang('l')</option>
                                                <option value="ts">@lang('teaspoon')</option>
                                                <option value="el">@lang('tablespoon')</option>
                                            </select>

                                        </td>
                                        <td>
                                            <a wire:click.prevent="addIngredient('{{ $ingredientSearchQuery }}')" class="bg-white hover:bg-gray-100 text-gray-600 py-1 px-2 border border-gray-400 rounded shadow right-0">@lang('add')</a>
                                        </td>
                                    </tr>
                                    @endforelse

                                    <!-- More rows... -->
                                    </tbody>

                                </table>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="flex justify-end p-8">
                    <a wire:click.prevent="save" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                        {{ __('Save') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
