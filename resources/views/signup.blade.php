<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Signup Form</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('addUser') }}" method="POST">
          @csrf

        
          <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" id="firstName" name="first_name" placeholder="Enter your first name" required>
            @error('first_name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" id="lastName" name="last_name" placeholder="Enter your last name" required>
            @error('last_name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" value="{{ old('date_of_birth') }}" class="form-control @error('date_of_birth') is-invalid @enderror" id="dob" name="date_of_birth" required>
            @error('date_of_birth')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

         
          <div class="mb-3">
            <label class="form-label">Gender</label>
            <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" required>
              <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Choose your gender</option>
              <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
              <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
              <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="country" class="form-label">Country of Residence</label>
            <select class="form-select @error('country') is-invalid @enderror" id="country" name="country" required>
              @forelse ($countries as $country)
                  <option value="{{ $country->id }}">{{ $country->name }} - {{ $country->code }}</option>
              @empty
                  <option disabled>No countries available</option>
              @endforelse
          </select>
          
            @error('country')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        
        
        

         
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" required>
            @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

        
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter a strong password" required>
            @error('password')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
          <label for="privacy-consent" class="form-label"></label>
          <div class="form-check">
              <input class="form-check-input @error('privacy_consent') is-invalid @enderror" type="checkbox" value="1" id="privacy-consent" name="privacy_consent" required>
              <label class="form-check-label" for="privacy-consent">
                  I agree to the <a href="{{ route('privacy-policy') }}" target="_blank">Privacy Policy and terms and condition</a>.
              </label>
          </div>
          @error('privacy_consent')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
      
      
        

         
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </div>
        </form>
      </div>
      <div class="mt-3 text-center">
        <a href="{{ route('login') }}">Already have an account? Login </a>
    </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
