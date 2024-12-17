<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SkillSetTags implements Rule
{
    public function passes($attribute, $value)
    {
        $tags = array_map('trim', explode(',', $value)); 
        return count($tags) <= 10 && count(array_unique($tags)) === count($tags); 
    }

    public function message()
    {
        return 'You can only have up to 10 unique skillset tags.';
    }
}
