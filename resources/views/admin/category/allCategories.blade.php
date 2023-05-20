@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Categories</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <div class="pb-4">

                                <a href="{{ route('add.category') }}"
                                    class="justify-center inline-block float-right px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800"><i
                                        class="fas fa-plus-circle"></i> Add
                                    Category</a>

                                <h4 class="text-base font-semibold">All Categories Data </h4>
                            </div>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="w-1/5">Sl</th>
                                        <th>Name</th>

                                        <th class="w-1/5">Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $category->name }} </td>


                                            <td class="flex justify-around">
                                                <a href="{{ route('edit.category', $category->id) }}"
                                                    class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('delete.category', $category->id) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                        class="fas fa-trash-alt"></i>
                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
@endsection
