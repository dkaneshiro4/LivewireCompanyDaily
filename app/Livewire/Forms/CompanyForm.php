<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CompanyForm extends Form
{
    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('required')]
    public string $country = '';

    #[Validate('required')]
    public string $city = '';
}
