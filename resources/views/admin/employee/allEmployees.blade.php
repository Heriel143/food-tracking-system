@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Employees</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="pb-4">

                                <a href="{{ route('add.employee') }}"
                                    class="justify-center inline-block float-right px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">
                                    <i class="fas fa-plus-circle"></i> Add
                                    Employee</a>

                                <h4 class="text-base font-semibold">All Employees Data </h4>
                            </div>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Picture</th>
                                        <th>Email</th>
                                        <th>Role</th>

                                        <th>Status</th>
                                        <th>Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($employees as $key => $employee)
                                        <tr>
                                            <td class=""> {{ $key + 1 }} </td>
                                            <td> {{ $employee->name }} </td>
                                            <td> <img src="{{ url($employee->profile_image) }}" class="w-16 h-14"
                                                    alt="Employee image"> </td>
                                            <td> {{ $employee->email }} </td>

                                            <td> {{ $employee->role->role }} </td>
                                            <td>
                                                {{-- {{$}} --}}
                                                {{-- @if ($purchase->status == '0')
                                                    <span class="btn btn-warning ">Pending</span>
                                                @elseif($purchase->status == '1')
                                                    <span class="btn btn-success ">Approved</span>
                                                @endif --}}
                                            </td>


                                            <td>
                                                <a href="{{ route('edit.employee', $employee->id) }}"
                                                    class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('delete.employee', $employee->id) }}"
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
