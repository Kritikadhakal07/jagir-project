@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Country</th>
                <th>Email</th> --}}
                <th>Phone Number</th>
                <th>Full Address</th>
                <th>Skill Set Tags</th>
                <th>Skill Set Years</th>
                <th>Bio</th>
                <th>Current Job</th>
                <th>Current Employer</th>
                <th>Last Job</th>
                <th>Last Employer</th>
                <th>Link to Portfolio</th>
                <th>Communication Questions</th>
                <th>Day-to-Day Questions</th>
                <th>Challenge Questions</th>
                <th>5 Years Goal</th>
                <th>Expected Salary Currency</th>
                <th>Expected Salary</th>
                <th>Highest Education</th>
                <th>Highest Education Completed Date</th>
                <th>CV</th>
                <th>Photo</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Role</th>
                <th>RC Unique ID</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($rcInformations as $rcInformation)
                <tr>
                    {{-- <td>{{ $rcInformation->rcFirstName }}</td>
                    <td>{{ $rcInformation->rcLastName }}</td>
                    {{-- <td>{{ $rcInformation->rcDOB->format('Y-m-d') }}</td> <!-- Formats date to 'YYYY-MM-DD' --> --}}
                    {{-- <td>{{ $rcInformation->rcGender }}</td>
                    <td>{{ $rcInformation->rcCountry }}</td>
                    <td>{{ $rcInformation->rcEmail }}</td> --}} 
                    <td>{{ $rcInformation->rcPhoneNumber }}</td>
                    <td>{{ $rcInformation->rcFullAddress }}</td>
                    <td>{{ $rcInformation->rcSkillSetTags }}</td>
                    <td>{{ $rcInformation->rcYearsOfExperience }}</td>
                    <td>{{ $rcInformation->rcBio }}</td>
                    <td>{{ $rcInformation->rcCurrentJob }}</td>
                    <td>{{ $rcInformation->rcCurrentEmployer }}</td>
                    <td>{{ $rcInformation->rcLastJob }}</td>
                    <td>{{ $rcInformation->rcLastEmployer }}</td>
                    <td>{{ $rcInformation->rcLinktoPortfolio }}</td>
                    <td>{{ $rcInformation->rcCommunicationQues }}</td>
                    <td>{{ $rcInformation->rcDaytoDayQues }}</td>
                    <td>{{ $rcInformation->rcChallengeQues }}</td>
                    <td>{{ $rcInformation->rc5yrs }}</td>
                    <td>{{ $rcInformation->rcExpSalaryCurrency }}</td>
                    <td>{{ $rcInformation->rcExpSalary }}</td>
                    <td>{{ $rcInformation->rcHighestEdu }}</td>
                    <td>{{ $rcInformation->rcHighestEduCompletedDate }}</td>
                    <td>{{ $rcInformation->rcCV }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $rcInformation->rcPhoto) }}" alt="User Photo" class="img-fluid" width="100">
                    </td>
                    <td>{{ $rcInformation->created_at }}</td>
                    <td>{{ $rcInformation->updated_at}}</td>
                    <td>{{ $rcInformation->rcRole }}</td>
                    <td>{{ $rcInformation->rcUniqueId }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.editUser', $rcInformation->id) }}" class="btn btn-sm btn-primary">Edit</a> --}}
                        {{-- <form action="{{ route('admin.deleteUser', $rcInformation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
