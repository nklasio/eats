<?php

namespace App\Http\Livewire;

use App\Models\Ingredient;
use App\Models\Recipe;
use Auth;
use Livewire\Component;

class CreateRecipe extends Component
{
    public $name;
    public $description;

    public $ingredientSearchQuery;
    public $ingredientQuantity = array();
    public $ingredients = array();

    public function render()
    {
        return view(
            'livewire.create-recipe',
            [
                'searchedIngredients' => Ingredient::search($this->ingredientSearchQuery),
                'ingredients' => $this->ingredients
            ]
        );
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'min:6',
            'description' => 'min:6'
        ]);
    }

    public function save() {
        $recipe = Recipe::create(['name' => $this->name, 'description' => $this->description, 'user_id' => Auth::user()->id]);
        foreach ($this->ingredients as $ingredient) {
            $recipe->addIngredient($ingredient['name'], $ingredient['quantity'], $ingredient['quantity_type']);
        }

        return redirect(route('dashboard'));
    }

    public function addIngredient($ingredientName)
    {
        array_push(
            $this->ingredients, [
                'name' => $ingredientName,
                'quantity' => $this->ingredientQuantity[$ingredientName]['quantity'] ?? 1,
                'quantity_type' => $this->ingredientQuantity[$ingredientName]['quantityType'] ?? 'gr'
            ]
        );

    }
}
