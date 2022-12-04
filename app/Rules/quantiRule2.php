<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class quantiRule2 implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        // dd((session()->get('m') == 0 && session()->get('l') == 0 && session()->get('xl') == 00 && session()->get('xxl') == 00 && session()->get('xxxl') == 00));
        if ($value == 0) {
            if (session()->get('m') == 0 && session()->get('l') == 0 && session()->get('xl') == 00 && session()->get('xxl') == 00 && session()->get('xxxl') == 00) {
                session()->forget('m');
                session()->forget('l');
                session()->forget('xl');
                session()->forget('xxl');
                session()->forget('xxxl');

                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "All fields cant be 0.";
    }
}
