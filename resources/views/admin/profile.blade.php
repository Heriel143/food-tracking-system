@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <img class="object-fill mx-auto my-4 rounded-full h-52 w-52"
                            src="{{ !empty($adminData->profile_image) ? url($adminData->profile_image) : url('upload/no_image.jpg') }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Name: {{ $adminData->name }}</h4>
                            <hr>
                            <h4 class="card-title">Email: {{ $adminData->email }}</h4>
                            <hr>
                            <h4 class="card-title">Username: {{ $adminData->username }}</h4>
                            <hr>
                            <a href="{{ route('edit.profile') }}"
                                class="flex justify-center px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">Edit
                                profile</a>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
