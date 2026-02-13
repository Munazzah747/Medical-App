<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="theme_ocean">

    <title>Create User</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Admin/assets/images/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/assets/css/bootstrap.min.css') }}">

    <!-- Vendors CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/assets/vendors/css/vendors.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/assets/css/theme.min.css') }}">
</head>

<body>
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="card mb-4 mt-5 position-relative">
                        <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                            <img src="{{ asset('Admin/assets/images/logo-abbr.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h2 class="fs-20 fw-bolder mb-4 text-center">Create User</h2>
<h2 class="text-center mb-4">{{ isset($patient) ? 'Edit Patient' : 'Register Patient' }}</h2>

<form action="{{ isset($patient) ? route('patients.update', $patient->id) : route('patients.store') }}" method="POST">
    @csrf
    @if(isset($patient))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="first_name" placeholder="Enter Your First Name"   class="form-control" value="{{ old('first_name', $patient->first_name ?? '') }}">
        @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="last_name" placeholder="Enter Your Last Name"  class="form-control" value="{{ old('last_name', $patient->last_name ?? '') }}">
        @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>DOB</label>
        <input type="date" name="date_of_birth"  placeholder="Enter Your Date Of Birth"    class="form-control" value="{{ old('date_of_birth', $patient->date_of_birth ?? '') }}">
        @error('date_of_birth') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Select Your Gender</label>
        <select name="gender" class="form-control">
            <option value="">Select Gender</option>
            <option value="Male" {{ (old('gender', $patient->gender ?? '')=='Male')?'selected':'' }}>Male</option>
            <option value="Female" {{ (old('gender', $patient->gender ?? '')=='Female')?'selected':'' }}>Female</option>
        </select>
        @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone_number" placeholder="Enter Your Phone Number" class="form-control" value="{{ old('phone_number', $patient->phone_number ?? '') }}">
        @error('phone_number') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email"  placeholder="Enter Your Email"  class="form-control" value="{{ old('email', $patient->email ?? '') }}">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" placeholder="Enter Your Address"  class="form-control">{{ old('address', $patient->address ?? '') }}</textarea>
        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
    <label>Select Status</label>
    <select name="status" class="form-control">
        <option value="">Select Status</option>
        <option value="active" {{ (old('status', $patient->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ (old('status', $patient->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
</div>


    <button type="submit" class="btn btn-success btn-lg w-100">{{ isset($patient) ? 'Update' : 'Save' }}</button>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back</a>
</form>

                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col -->
        </div> <!-- row -->
    </div> <!-- auth-minimal-inner -->
</main>
  <!-- JS Files -->
    <script src="{{ asset('Admin/assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/theme-customizer-init.min.js') }}"></script>

</body>
</html>