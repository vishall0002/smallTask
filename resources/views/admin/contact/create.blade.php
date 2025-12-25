@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1>Add Contact</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input class="form-control" placeholder="Enter name">
                            </div>

                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Enter email">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label>Phone</label>
                                <input class="form-control" placeholder="Enter phone">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label>Gender</label>
                                <select class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label>Profile Image</label>
                                <input type="file" class="form-control">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label>Additional File</label>
                                <input type="file" class="form-control">
                            </div>
                        </div>

                        <button class="btn btn-success mt-4">Save Contact</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
