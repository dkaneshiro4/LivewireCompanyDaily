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
    public CompanyForm $form;

    public Collection $countries;

    public Collection $cities;

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
        if($property == 'country') {
            $this->cities = City::where('country_id', $this->country)->get();
            $this->form->city = $this->cities->first()->id;
        }
    }

    public function save(): void
    {
        $this->validate();

        Company::create(
            $this->form->all()
        );

        $this->savedName = $this->name;

        $this->reset('name', 'country', 'city', 'cities');
        $this->cities = collect([]);
    }
}
