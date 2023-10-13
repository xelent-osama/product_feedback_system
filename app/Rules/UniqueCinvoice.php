<?php

namespace App\Rules;

use App\Models\Adjuster;
use App\Models\SaleTaxes\PurchaseTax;
use App\Models\Supervisor;
use Illuminate\Contracts\Validation\Rule;

class UniqueCinvoice implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $company_id;
    private $sub_company_id;

    public function __construct($company_id, $sub_company_id)
    {
        $this->company_id = $company_id;
        $this->sub_company_id = $sub_company_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (PurchaseTax::where('company_id', $this->company_id)->where('sub_comp_id', $this->sub_company_id)->where('c_inv', $value)->exists()) {
            return 0;
        }
        return 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'C Invoice already Exists!';
    }
}