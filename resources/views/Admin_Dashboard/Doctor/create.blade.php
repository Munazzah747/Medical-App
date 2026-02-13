<!DOCTYPE html>
<html lang="en">

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

                            <!-- <form method="POST" action="{{ route('admin.users.store') }}" class="w-100 mt-4 pt-2">
                                @csrf

                                <div class="mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                </div>

                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Doctor Email" required>
                                </div>

                                <div class="mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>

                                <div class="mb-3">
                                   <select class="form-control" name="role" required>
    <option value="" disabled selected>Select Role</option>
    @foreach($roles as $role)
        <option value="{{ $role->id}} {{ $role->name }}">{{ ucfirst($role->name) }}</option>
    @endforeach
</select>

                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-lg btn-primary w-100">Create User</button>
                                </div>
                            </form> -->
                            <form method="POST" action="{{ isset($editUser) ? route('admin.users.update', $editUser) : route('admin.users.store') }}">
    @csrf
    @if(isset($editUser))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" 
               value="{{ old('name', $editUser->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" 
               value="{{ old('email', $editUser->email ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control" required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}"
                    {{ isset($editUser) && $editUser->roles->contains('id', $role->id) ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">{{ isset($editUser) ? 'Update' : 'Create' }}</button>
</form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JS Files -->
    <script src="{{ asset('Admin/assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/theme-customizer-init.min.js') }}"></script>
</body>

</html>
