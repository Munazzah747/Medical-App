

<html lang="zxx">

@include('Admin_Dashboard.layouts.header')

<body>
    <div class="container mt-5">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Users</h2>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Users Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge bg-info text-dark">{{ ucfirst($role->name) }}</span>
                            @endforeach
                        </td>
                        <td>
                            <!-- Actions -->
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                            <!-- <a href="#" class="btn btn-sm btn-danger">Delete</a> -->
                             <form action="{{ route('admin.users.destroy', $user) }}"
      method="POST"
      class="d-inline"
      onsubmit="return confirm('Are you sure you want to delete this user?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger">
        Delete
    </button>
</form>
                            
                            
                            @if($user->is_active)
 <form method="POST" action="{{ route('users.deactivate', $user) }}">
        @csrf
        @method('PATCH')
        <button class="btn btn-danger">Deactivate</button>
    </form>
@else
    <form method="POST" action="{{ route('users.activate', $user) }}">
        @csrf
        @method('PATCH')
        <button class="btn btn-success">Activate</button>
    </form>
@endif 

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

  <!--! ================================================================ !-->
    <!--! [End] Theme Customizer !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! Footer Script !-->
    <!--! ================================================================ !-->
    <!--! BEGIN: Vendors JS !-->
    <script src="{{asset('Admin/assets/vendors/js/vendors.min.js')}}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{asset('Admin/assets/js/common-init.min.js')}}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{asset('Admin/assets/js/theme-customizer-init.min.js')}}"></script>
    <!--! END: Theme Customizer !-->
</body>

</html>