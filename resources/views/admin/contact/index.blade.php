@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h1>Contacts</h1>

            <div>
                <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary btn-sm">
                    ➕ Add Contact
                </a>
                <a href="{{ route('admin.contacts.custom-fields') }}" class="btn btn-secondary btn-sm">
                    ⚙️ Add Custom Fields
                </a>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Additional File</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Static data for now --}}
                            <tr>
                                <td>1</td>
                                <td><img src="https://via.placeholder.com/40" class="rounded-circle"></td>
                                <td>Vishal Singh</td>
                                <td>vishal@test.com</td>
                                <td>9876543210</td>
                                <td>Male</td>
                                <td><a href="#">View</a></td>
                                <td>2025-01-01</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
