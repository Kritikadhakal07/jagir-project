<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RcInformation extends Model
{
    use HasFactory;

    
    protected $table = 'rc_information'; 

    
    protected $fillable = [
        'rcFirstName',
        'rcLastName',
        'rcDOB',
        'rcGender',
        'rcCountry',
        'rcEmail',
        'rcPhoneNumber',
        'rcFullAddress',
        'rcSkillSetTags',
        'rcYearsOfExperience',
        'rcBio',
        'rcCurrentJob',
        'rcCurrentEmployer',
        'rcLastJob',
        'rcLastEmployer',
        'rcLinktoPortofoliio',
        'rcCommunicationQues',
        'rcDaytoDayQues',
        'rcChallengeQues',
        'rc5yrs',
        'rcExpSalaryCurrency',
        'rcExpSalary',
        'rcHighestEdu',
        'rcHighestEduCompletedDate',
        'rcRole',
        'rcUniqueId',
        'rcCV',
        'rcPhoto',
        'rcCreated',
        'rcUpdated',
    ];


    protected $casts = [
      'rcSkillSetTags' => 'array',
        'rcDOB' => 'datetime',  
        'rcCreated' => 'datetime',
        'rcUpdated' => 'datetime',
    ];

   
    public $timestamps = true; 
}
