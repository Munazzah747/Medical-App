@include('Admin_Dashboard.layouts.header')

<div class="container py-4">

    <h4 class="mb-3">Specializations</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<a href="{{ route('specializations.create') }}" class="btn btn-primary">
    + Add Specialization
</a>

    {{-- CREATE --}}
    <form action="{{ route('specializations.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row g-2">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control"
                       placeholder="Enter specialization name" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100">Add</button>
            </div>
        </div>
    </form>

    {{-- LIST --}}
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th width="30%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($specializations as $specialization)
            <tr>
                <td>{{ $specialization->id }}</td>

                {{-- UPDATE --}}
                <form action="{{ route('specializations.update', $specialization->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <td>
                        <input type="text" name="name"
                               value="{{ $specialization->name }}"
                               class="form-control form-control-sm" required>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-success">Update</button>
                </form>

                        {{-- DELETE --}}
                        <form action="{{ route('specializations.destroy', $specialization->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this specialization?')">
                                Delete
                            </button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
