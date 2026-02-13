
@include('Admin_Dashboard.layouts.header')

<h3>Doctors</h3>

<a href="{{ route('doctor.create') }}" class="btn btn-primary">
    Add Doctor
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Specializations</th>
            <th>Status</th>
            <th width="260">Actions</th>
        </tr>
    </thead>

    <tbody>
    @foreach($doctors as $doctor)
        <tr>
            <td>{{ $loop->iteration }}</td>

            {{-- INLINE EDIT FORM --}}
            <form method="POST"
                  action="{{ route('doctors.update',$doctor->id) }}">
                @csrf
                @method('PUT')

                <td>
                    <input class="form-control"
                           name="name"
                           value="{{ $doctor->name }}">
                </td>

                <td>
                    <input class="form-control"
                           name="email"
                           value="{{ $doctor->email }}">
                </td>

                <td>
                    @foreach($specializations as $spec)
                        <label class="me-2">
                            <input type="checkbox"
                                   name="specializations[]"
                                   value="{{ $spec->id }}"
                                   {{ $doctor->specializations->contains($spec->id) ? 'checked' : '' }}>
                            {{ $spec->name }}
                        </label>
                    @endforeach
                </td>

                <td>
                    {{ $doctor->is_active ? 'Active' : 'Inactive' }}
                </td>

                <td>
                    {{-- UPDATE --}}
                    <button class="btn btn-sm btn-success">
                        Update
                    </button>
            </form>

                    {{-- STATUS --}}
                    <form method="POST" action="{{ route('doctors.update', $doctor->id) }}" class="d-inline">

                          
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-sm btn-secondary">
                            Toggle
                        </button>
                    </form>

                    {{-- DELETE --}}
                    <form method="POST"
                          action="{{ route('doctors.destroy',$doctor->id) }}"
                          class="d-inline"
                          onsubmit="return confirm('Delete doctor?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
        </tr>
    @endforeach
    </tbody>
</table>

