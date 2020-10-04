<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <a href="{{ route('recipe.create') }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            {{ __('New Recipe') }}
        </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- {{ $recipes }} -->
                <div>
                    @forelse($recipes as $recipe)
                        <!-- item card -->
                        <div class="md:flex shadow-lg  m-6  max-w-lg md:max-w-2xl max-h-96">
                            <img class="h-96 w-full md:w-1/3  object-cover rounded-lg rounded-r-none "
                                src="https://dftb1l2nr3p7v.cloudfront.net//media/recipe/Vinschgauer-Brot-Beitrag.jpg"
                                alt="bag">
                            <div class="w-full md:w-2/3 px-4 py-4 bg-white rounded-lg h-96">
                                <div class="flex items-center">
                                    <h2 class="text-xl text-gray-800 font-medium mr-auto">{{ $recipe->name }}</h2>
                                </div>
                                <p class="text-sm text-gray-700 mt-4">
                                    <div class="flex flex-col justify-between">
                                        <div>
                                            {{ __('Ingredients') }}
                                            <ul>
                                                @foreach($recipe->ingredients as $ingredient)
                                                    <li>{{ $ingredient->pivot->quantity }}
                                                        {{ $ingredient->pivot->quantity_type }}
                                                        {{ $ingredient->name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="">
                                            <div class="flex items-center">
                                                <img class="w-10 h-10 rounded-full mr-4"
                                                    src="{{ $recipe->author->profile_photo_url }}"
                                                    alt="Avatar of  {{ $recipe->author->name }}">
                                                <div class="text-sm">
                                                    <p class="text-gray-900 leading-none">
                                                        {{ $recipe->author->name }}</p>
                                                    <p class="text-gray-600">
                                                        {{ $recipe->created_at->format('d.m.Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>


                        {{ __('Zubereitung') }}
                        <ul>
                            @foreach($recipe->steps as $step)
                                <li>{{ $step->order }}. {{ $step->description }}</li>
                            @endforeach
                        </ul>


                    @empty
                        <h2>No recipes found</h2>

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
