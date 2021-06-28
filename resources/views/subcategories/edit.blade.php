@extends('layouts.sidebar-edit')

@section('title', 'Edit Sub Category')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Categories</a></li>
                                <li class="breadcrumb-item active">Edit Category</li>
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
                        <form enctype="multipart/form-data" action="{{ url('/subcategories/save-edit', $category->id) }}"
                            method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" required placeholder="Type something" name="name"
                                    value="{{ $category->name }}" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select id="my-select" class="form-control" name="category_name">
                                    <option>Pilih Category ({{ $category->category->name }})</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">
                                            {{ $categorie->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Submit
                                    </button>
                                    <a class="btn btn-secondary waves-effect" href="/subcategories">
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
