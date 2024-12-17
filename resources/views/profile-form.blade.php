@extends('layouts.app')


@section('content')
<div class="container mt-5">
    <div class="row">
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Navigation</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item active">Personal Information</li>
                    <li class="list-group-item">Skillset & Experience</li>
                    <li class="list-group-item">Remote Colleague Partner</li>
                    <li class="list-group-item">Academics & CV</li>
                </ul>
            </div>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


       
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Complete Your Profile</h5>
                </div>
                @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        
                <div class="card-body">
                    <form action="{{ route('profile.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        
                        <h6 class="mb-3">Personal Information</h6>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="rcPhoneNumber" id="phone" class="form-control @error('rcPhoneNumber') is-invalid @enderror" placeholder="Enter your phone number" value="{{ old('rcPhoneNumber') }}" required>
                            @error('rcPhoneNumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Full Address</label>
                            <textarea name="rcFullAddress" id="address" class="form-control @error('rcFullAddress') is-invalid @enderror" rows="3" placeholder="Enter your full address" required>{{ old('rcFulladdress') }}</textarea>
                            @error('rcFulladdress')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        

                        <h6 class="mt-4 mb-3">Skillset and Experience</h6>
                        <div class="mb-3">
                            <label for="rcSkillSetTags">Skill Set Tags (Max 10)</label>
                            <input type="text" 
                                   name="rcSkillSetTags" 
                                   id="rcSkillSetTags" 
                                   class="form-control @error('rcSkillSetTags') is-invalid @enderror" 
                                   value="{{ old('rcSkillSetTags') }}" 
                                   placeholder="e.g., PHP, Laravel, JavaScript">
                            @error('rcSkillSetTags')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="years_of_experience" class="form-label">Years of Experience</label>
                            <input type="number" name="rcYearsOfExperience" id="years_of_experience" class="form-control @error('rcYearsOfExperience') is-invalid @enderror" placeholder="e.g., 2" value="{{ old('rcYearsOfExperience') }}" required>
                            @error('rcYearsOfExperience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio (Max 500 characters)</label>
                            <textarea name="rcBio" id="bio" class="form-control @error('bio') is-invalid @enderror" rows="3" maxlength="500" placeholder="Write a short bio about yourself">{{ old('rcbio') }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="current_job" class="form-label">Current Job</label>
                            <input type="text" name="rcCurrentJob" id="current_job" class="form-control @error('rcCurrentJob') is-invalid @enderror" placeholder="e.g., Developer" value="{{ old('rcCurrentJob') }}">
                            @error('rcCurrentJob')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="current_employer" class="form-label">Current Employer</label>
                            <input type="text" name="rcCurrentEmployer" id="current_employer" class="form-control @error('rcCurrentEmployer') is-invalid @enderror" placeholder="e.g., ABC Corp" value="{{ old('rcCurrentEmployer') }}">
                            @error('rcCurrentEmployer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_job" class="form-label">Last Job</label>
                            <input type="text" name="rcLastJob" id="last_job" class="form-control @error('last_job') is-invalid @enderror" placeholder="e.g., Junior Developer" value="{{ old('last_job') }}">
                            @error('last_job')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_employer" class="form-label">Last Employer</label>
                            <input type="text" name="rcLastEmployer" id="last_employer" class="form-control @error('rcLastEmployer') is-invalid @enderror" placeholder="e.g., XYZ Inc" value="{{ old('rcLastEmployer') }}">
                            @error('rcLastEmployer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <h6 class="mt-4 mb-3">Portfolio</h6>
                        <div class="mb-3">
                            <label for="portfolio" class="form-label">Portfolio Links</label>
                            <input type="text" name="rcLinktoPortfolio" id="portfolio" class="form-control @error('rcLinktoPortofolio') is-invalid @enderror" placeholder="e.g., https://yourportfolio.com" value="{{ old('rcLinktoPortofoliio') }}">
                            @error('rcLinktoPortfolio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <h6 class="mt-4 mb-3">Interest in Roles</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rcRole[]" value="Full-time RC" id="full_time" @if(in_array('Full-time RC', old('rcRole', []))) checked @endif>
                            <label class="form-check-label" for="full_time">Full-time RC</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rcRole[]" value="Part-time RC" id="part_time" @if(in_array('Part-time RC', old('rcRole', []))) checked @endif>
                            <label class="form-check-label" for="part_time">Part-time RC</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rcRole[]" value="Intern RC" id="intern" @if(in_array('Intern RC', old('rcRole', []))) checked @endif>
                            <label class="form-check-label" for="intern">Intern RC</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rcRole[]" value="All of the above" id="all_roles" @if(in_array('All of the above', old('rcRole', []))) checked @endif>
                            <label class="form-check-label" for="all_roles">All of the above</label>
                        </div>
                        
                          <h6 class="mt-4 mb-3">Remote Colleague Partner</h6>
                <div class="mb-3">
                    <label for="communication" class="form-label">Communication with Colleagues (Max 600 characters)</label>
                    <textarea name="rcCommunicationQues" id="communication" class="form-control @error('rcCommunicationQues') is-invalid @enderror" rows="3" maxlength="600" placeholder="Describe how you communicated with colleagues in your last job">{{ old('rcCommunicationQues') }}</textarea>
                    @error('rcCommunicationQues')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="daily_routine" class="form-label">Daily Routine in Last Job (Max 600 characters)</label>
                    <textarea name="rcDaytoDayQues" id="rcDaytoDayQues" class="form-control @error('rcDailyRoutineQues') is-invalid @enderror" rows="3" maxlength="600" placeholder="Describe how you started and ended your day in your last job">{{ old('rcDailyRoutineQues') }}</textarea>
                    @error('rcDailyRoutineQues')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        

                    
                    

                      
                <div class="mb-3">
                    <label for="challenges" class="form-label">Challenges in Last Job (Max 600 characters)</label>
                    <textarea name="rcChallengeQues" id="challenges" class="form-control @error('rcChallengeQues') is-invalid @enderror" rows="3" maxlength="600" placeholder="Mention one challenge you faced, who you collaborated with, and how you solved it">{{ old('rcChallengeQues') }}</textarea>
                    @error('rcChallengeQues')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="future_goals" class="form-label">Future Goals (Max 600 characters)</label>
                    <textarea name="rc5yrs" id="future_goals" class="form-control @error('rc5yrs') is-invalid @enderror" rows="3" maxlength="600" placeholder="Share where you see yourself in the next 2 and 5 years">{{ old('rc5yrs') }}</textarea>
                    @error('rc5yrs')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="expected_salary" class="form-label">Expected Salary</label>
                    <input type="text" name="rcExpSalary" id="expected_salary" class="form-control @error('rcExpSalary') is-invalid @enderror" placeholder="e.g., 3000 USD" value="{{ old('rcExpSalary') }}">
                    @error('rcExpSalary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="rcExpSalaryCurrency">Expected Salary Currency</label>
                    <input type="text" name="rcExpSalaryCurrency" id="rcExpSalaryCurrency" class="form-control @error('rcExpSalaryCurrency') is-invalid @enderror" value="{{ old('rcExpSalaryCurrency') }}" required>
                    @error('rcExpSalaryCurrency')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <h6 class="mt-4 mb-3">Academics & CV</h6>
                
                <div class="mb-3">
                    <label for="degree" class="form-label">Highest Degree</label>
                    <input type="text" name="rcHighestEdu" id="degree" class="form-control @error('rcHighestEdu') is-invalid @enderror" placeholder="e.g., Bachelor's, Master's" value="{{ old('rcHighestEdu') }}">
                    @error('rcHighestEdu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="completion_year" class="form-label">Completed Year</label>
                    <input type="text" name="rcHighestEduCompletedDate" id="completion_year" class="form-control @error('rcHighestEduCompletedDate') is-invalid @enderror" placeholder="e.g., 2020" value="{{ old('rcHighestEduCompletedDate') }}">
                    @error('rcHighestEduCompletedDate')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="cv" class="form-label">Attach CV</label>
                    <input type="file" name="rcCV" id="cv" class="form-control @error('rcCV') is-invalid @enderror">
                    @error('rcCV')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="photo" class="form-label">Professional Photo</label>
                    <input type="file" name="rcPhoto" id="photo" class="form-control @error('rcPhoto') is-invalid @enderror">
                    @error('rcPhoto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="profile_created" class="form-label">Profile Created Date</label>
                    <input type="text" class="form-control" value="{{ now()->format('Y-m-d H:i') }}" disabled>
                </div>
                
                <div class="mb-3">
                    <label for="profile_updated" class="form-label">Last Updated Date</label>
                    <input type="text" class="form-control" value="{{ now()->format('Y-m-d H:i') }}" disabled>
                </div>
                
                <div class="form-group">
                    <label for="rcUniqueId">Unique ID</label>
                    <input type="text" name="rcUniqueId" id="rcUniqueId" class="form-control @error('rcUniqueId') is-invalid @enderror" value="{{ old('rcUniqueId', 'RC-'.sprintf('%02d', \App\Models\RcInformation::count() + 1)) }}" required readonly>
                    @error('rcUniqueId')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                
                
                        
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Save Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Include Tagify CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

<script>
    // Initialize Tagify on the rcSkillSetTags input field
    var input = document.querySelector('#rcSkillSetTags');
    var tagify = new Tagify(input, {
        maxTags: 10, // Maximum of 10 tags
        delimiters: ",", // Separate tags by commas
        whitelist: [], // Optional: Add predefined suggestions
        dropdown: {
            enabled: 0 // Disable suggestions dropdown
        }
    });
</script>

