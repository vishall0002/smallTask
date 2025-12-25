@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1>Custom Fields</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form id="customFieldForm">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Label</label>
                                <input class="form-control" placeholder="Field Label">
                            </div>

                            <div class="col-md-4">
                                <label>Input Type</label>
                                <select class="form-control">
                                    <option>text</option>
                                    <option>number</option>
                                    <option>email</option>
                                    <option>date</option>
                                    <option>file</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label>Placeholder</label>
                                <input class="form-control" placeholder="Placeholder text">
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mt-3" onclick="addPreview()">
                            Add Field
                        </button>
                    </form>

                    <hr>

                    <h5>Preview</h5>
                    <div id="previewArea"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function addPreview() {
    const preview = document.getElementById('previewArea');
    preview.innerHTML += `
        <div class="mt-2">
            <input class="form-control" placeholder="Custom field preview">
        </div>
    `;
}
</script>
@endsection
