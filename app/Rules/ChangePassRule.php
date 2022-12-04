<?php

namespace App\Rules;

use App\Models\buyer;
use Illuminate\Contracts\Validation\Rule;

class ChangePassRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $user = buyer::where("email", session()->get("email"))->first();
        if ($user) {
            if ($user->password == $value) {
                return true;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Incorrect current password.';
    }
}
