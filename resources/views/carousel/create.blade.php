@extends('layouts.sidebar-edit')

@section('title', 'Create ')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Create Carousel</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Carousel</a></li>
                                <li class="breadcrumb-item active">Create Carousel</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- end row -->
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="/carousels/save-crate" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" required placeholder="Type something"
                                    name="title" />
                            </div>

                            <div>
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Submit
                                    </button>
                                    <a class="btn btn-secondary waves-effect" href="/carousels">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
