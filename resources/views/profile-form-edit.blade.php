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
                    <li class="list-group-item active">Edit Profile</li>
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

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Your Profile</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <h6 class="mb-3">Personal Information</h6>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="rcPhoneNumber" id="phone" class="form-control @error('rcPhoneNumber') is-invalid @enderror" value="{{ old('rcPhoneNumber', $profile->rcPhoneNumber) }}" required>
                            @error('rcPhoneNumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Full Address</label>
                            <textarea name="rcFullAddress" id="address" class="form-control @error('rcFullAddress') is-invalid @enderror" rows="3" required>{{ old('rcFullAddress', $profile->rcFullAddress) }}</textarea>
                            @error('rcFullAddress')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <h6 class="mt-4 mb-3">Skillset and Experience</h6>
                        <div class="mb-3">
                            <label for="rcSkillSetTags">Skill Set Tags (Max 10)</label>
                            <input type="text" name="rcSkillSetTags" id="rcSkillSetTags" class="form-control @error('rcSkillSetTags') is-invalid @enderror" value="{{ old('rcSkillSetTags', $profile->rcSkillSetTags) }}">
                            @error('rcSkillSetTags')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="years_of_experience" class="form-label">Years of Experience</label>
                            <input type="number" name="rcYearsOfExperience" id="years_of_experience" class="form-control @error('rcYearsOfExperience') is-invalid @enderror" value="{{ old('rcYearsOfExperience', $profile->rcYearsOfExperience) }}" required>
                            @error('rcYearsOfExperience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio (Max 500 characters)</label>
                            <textarea name="rcBio" id="bio" class="form-control @error('rcBio') is-invalid @enderror" rows="3" maxlength="500">{{ old('rcBio', $profile->rcBio) }}</textarea>
                            @error('rcBio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <h6 class="mt-4 mb-3">Portfolio</h6>
                        <div class="mb-3">
                            <label for="portfolio" class="form-label">Portfolio Links</label>
                            <input type="text" name="rcLinktoPortfolio" id="portfolio" class="form-control @error('rcLinktoPortfolio') is-invalid @enderror" value="{{ old('rcLinktoPortfolio', $profile->rcLinktoPortfolio) }}">
                            @error('rcLinktoPortfolio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <h6 class="mt-4 mb-3">Academics & CV</h6>
                        <div class="mb-3">
                            <label for="degree" class="form-label">Highest Degree</label>
                            <input type="text" name="rcHighestEdu" id="degree" class="form-control @error('rcHighestEdu') is-invalid @enderror" value="{{ old('rcHighestEdu', $profile->rcHighestEdu) }}">
                            @error('rcHighestEdu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="completion_year" class="form-label">Completed Year</label>
                            <input type="text" name="rcHighestEduCompletedDate" id="completion_year" class="form-control @error('rcHighestEduCompletedDate') is-invalid @enderror" value="{{ old('rcHighestEduCompletedDate', $profile->rcHighestEduCompletedDate) }}">
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

                        <div class="form-group">
                            <label for="rcUniqueId">Unique ID</label>
                            <input type="text" name="rcUniqueId" id="rcUniqueId" class="form-control" value="{{ $profile->rcUniqueId }}" readonly>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
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
        maxTags: 10,
        delimiters: ",",
        whitelist: [],
        dropdown: {
            enabled: 0
        }
    });
</script>
