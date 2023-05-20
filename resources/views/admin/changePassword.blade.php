@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">

                            <h1 class="text-xl font-bold card-title">Change Password Page</h1>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('update.password') }}" method="post" class="mt-4">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="password" name="oldpassword" id="oldpassword">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="password" name="newpassword" id="newpassword">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="-ml-16 col-sm-8">
                                        <input class="form-control" type="password" name="confirmpassword"
                                            id="confirmpassword">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">Change
                                        Password</button>
                                </div>
                                <!-- end row -->
                            </form>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
