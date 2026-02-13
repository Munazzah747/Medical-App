@include('Admin_Dashboard.layouts.header')

<div class="container py-4">

    <h4 class="mb-3">Add Specialization</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('specializations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Specialization Name</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="e.g. Cardiologist"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('specializations.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>
