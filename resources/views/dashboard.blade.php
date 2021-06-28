@extends('layouts.sidebar')

@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Minible</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="total-revenue-chart"></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $productsCount }}</span>
                                </h4>
                                <p class="text-muted mb-0">Total Products</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="growth-chart"> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $categoriesCount }}</span>
                                </h4>
                                <p class="text-muted mb-0">Total Categories</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="growth-chart"> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $subCategoriesCount }}</span>
                                </h4>
                                <p class="text-muted mb-0">Total SubCategories</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="growth-chart"> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $carouselsCount }}</span>
                                </h4>
                                <p class="text-muted mb-0">Total Carousels</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- table categories -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Category</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0 ">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $categorie)
                                            <tr>
                                                <th class="col-1" scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $categorie->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>

                    <!-- table categories -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Sub Category</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subCategories as $subCategorie)
                                            <tr>
                                                <th class="col-1" scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $subCategorie->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>

                    <!-- table products -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Products</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Category Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td><a href="{{ asset('assets/images/productsImage/' . $product->image) }}"
                                                        target="_blank">View
                                                        Image</a>
                                                </td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>Rp {{ number_format($product->price) }}</td>
                                                <td><span
                                                        class="badge rounded-pill bg-soft-success font-size-12">{{ $product->subCategory->name }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                    <!-- table products -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Carousels</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carousels as $carousel)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td><a href="{{ asset('assets/images/productsImage/' . $carousel->image) }}"
                                                        target="_blank">View
                                                        Image</a>
                                                </td>
                                                <td>{{ $carousel->title }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
        @endsection
