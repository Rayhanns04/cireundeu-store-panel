@extends('layouts.sidebar-edit')

@section('title', 'Edit Product')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit Product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- end row -->
            {{-- FORM --}}
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ url('/products/save-edit', $product->id) }}"
                            method="POST">
                            @csrf
                            <div class="mb-3">
                                <img src="{{ asset('assets/images/productsImage/' . $product->image) }}"
                                    class="img-responsive img-rounded" style="max-height: 500px; max-width: 500px;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image"
                                    value="{{ public_path() . '\assets\images\productsImage', $product->image }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" required placeholder="Type something" name="title"
                                    value="{{ $product->title }} " />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" required placeholder="Type something"
                                    name="description" value="{{ $product->description }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" required placeholder="Type something" name="price"
                                    value="{{ $product->price }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <select id="my-select" class="form-control" name="category_name"
                                    value="{{ $product->subCategory->name }}">
                                    <option selected>Pilih Category ( {{ $product->subCategory->name }} )
                                    </option>
                                    @foreach ($subCategories as $subCategorie)
                                        <option value="{{ $subCategorie->id }}">
                                            {{ $subCategorie->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Submit
                                    </button>
                                    <a class="btn btn-secondary waves-effect" href="/products">
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
