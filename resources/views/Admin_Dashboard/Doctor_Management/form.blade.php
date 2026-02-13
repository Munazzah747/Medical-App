@include('Admin_Dashboard.layouts.header')

<main class="auth-minimal-wrapper">
    <div class="auth-minimal-inner">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card mb-4 mt-5 position-relative">
                    <div class="card-body">
                        <h2 class="fs-20 fw-bolder mb-4 text-center">Add Doctor</h2>

                        <form action="{{ route('doctor.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Name</label>
                                <input class="form-control" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email" required>
                            </div>

                            <div class="mb-3">
                                <label>Phone</label>
                                <input class="form-control" name="phone">
                            </div>

                            <div class="mb-3">
                                <label>Specializations</label><br>
                                @foreach($specializations as $spec)
                                    <label class="me-3">
                                        <input type="checkbox" name="specializations[]" value="{{ $spec->id }}">
                                        {{ $spec->name }}
                                    </label>
                                @endforeach
                            </div>

                            <button class="btn btn-success">Save</button>
                            <a href="{{ route('doctor.index') }}" class="btn btn-secondary">Back</a>
                        </form>

                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col -->
        </div> <!-- row -->
    </div> <!-- auth-minimal-inner -->
</main>
