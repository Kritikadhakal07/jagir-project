<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\SkillSetTags;

class StoreRcInformationRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'rcPhoneNumber' => 'required|string', // Ensure a reasonable phone number length
            'rcFullAddress' => 'required|string', // Full address with reasonable length
           'rcSkillSetTags' => ['nullable', 'string', new SkillSetTags], 
            'rcYearsOfExperience' => 'required|integer', // Limit experience to a reasonable max
            'rcBio' => 'nullable|string',
            'rcCurrentJob' => 'nullable|string|max:255',
            'rcCurrentEmployer' => 'nullable|string|max:255',
            'rcLastJob' => 'nullable|string|max:255',
            'rcLastEmployer' => 'nullable|string|max:255',
            'rcLinktoPortfolio' => 'nullable|string|url|max:255',
            'rcCommunicationQues' => 'nullable|string|max:600',
            'rcDaytoDayQues' => 'nullable|string|max:600',
            'rcChallengeQues' => 'nullable|string|max:600',
            'rc5yrs' => 'nullable|string|max:600',
            'rcExpSalaryCurrency' => 'required|string|max:255',
            'rcExpSalary' => 'required|numeric', // Reasonable salary range
            'rcHighestEdu' => 'required|string|max:255',
            'rcHighestEduCompletedDate' => 'required|integer|between:1900,' . date('Y'), // Reasonable date range
            'rcRole' => 'required|array', // This will validate that 'rcRole' is an array
        'rcRole.*' => 'string',
            'rcCV' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'rcPhoto' => 'nullable|file|mimes:jpeg,jpg,png|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'rcPhoneNumber.required' => 'Phone Number is required.',
            'rcFullAddress.required' => 'Full Address is required.',
            'rcSkillSetTags.required' => 'Skillset Tags are required.',
            'rcExpSalaryCurrency.required' => 'Salary Currency is required.',
            'rcExpSalary.required' => 'Expected Salary is required.',
            'rcHighestEdu.required' => 'Highest Education is required.',
            'rcHighestEduCompletedDate.required' => 'Highest Education Completion Date is required.',
            'rcRole.required' => 'Role is required.',
            'rcSkillSetTags.max' => 'Skillset Tags cannot exceed 255 characters.',
        ];
    }

    public function validatedSkills()
    {
        $tags = explode(',', $this->input('rcSkillSetTags')); 
        $uniqueTags = array_unique(array_map('trim', $tags)); 
        return array_slice($uniqueTags, 0, 10);
    }
}
