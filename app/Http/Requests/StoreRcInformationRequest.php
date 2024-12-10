<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRcInformationRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'rcPhoneNumber' => 'required|',
            'rcFullAddress' => 'required|',
            'rcSkillSetTags' => 'nullable|string',
            'rcYearsOfExperience' => 'required|integer|min:1',
            'rcBio' => 'nullable|string|max:500',
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
            'rcExpSalary' => 'required|numeric',
            'rcHighestEdu' => 'required|string|max:255',
            'rcHighestEduCompletedDate' => 'required|integer',
            'rcRole' => 'required',
            
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
           
        ];
    }
    

}
