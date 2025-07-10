<?php

namespace App\Livewire;

use App\Livewire\Forms\CompanyForm;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CompanyCreate extends Component
{
    public Collection $countries;

    public Collection $cities;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('required')]
    public string $country = '';

    #[Validate('required')]
    public string $city = '';

    public $savedName = '';

    public function mount(): void
    {
        $this->countries = Country::all();
        $this->cities = collect([]);
    }

    public function render()
    {
        return view('livewire.company-create');
    }

    public function updated($property): void
    {
        if ($property == 'country') {
            $this->cities = City::where('country_id', $this->country)->get();
            $this->city = $this->cities->first()->id;
        }
    }

    public function save(): void
    {
        $this->validate();

        Company::create([
            'name' => $this->name,
            'country_id' => $this->country,
            'city_id' => $this->city,
        ]);

        $this->savedName = $this->name;

        $this->reset('name', 'country', 'city', 'cities');
        $this->cities = collect([]);
    }
}
