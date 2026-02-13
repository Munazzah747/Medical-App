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
                <div class="col-lg-10 col-md-12 col-sm-12">
                    <div class="card mb-4 mt-5 position-relative">
                        <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                            <img src="{{ asset('Admin/assets/images/logo-abbr.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="card-body">
                            
<div class="d-flex justify-content-between mb-3">
    <h2>Patients</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Patient</a>
</div>

<form method="GET" action="{{ route('patients.index') }}" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Search by name, phone, email" value="{{ request('search') }}">
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Full Name</th>
              <th>Last Name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($patients as $patient)
            <tr>
                <td>{{ $patient->first_name }} </td>
                <td>{{ $patient->last_name }}</td>
                <td>{{ $patient->date_of_birth }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->phone_number }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{$patient->status}}</td>
                <td>
                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this patient?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No patients found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $patients->withQueryString()->links() }}

<!-- JS Files -->
    <script src="{{ asset('Admin/assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/theme-customizer-init.min.js') }}"></script>

</body>
</html>