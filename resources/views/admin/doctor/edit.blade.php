<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials.css')
    <base href="/public">
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.partials.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.partials.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="display-5 fw-bold text-center">Edit Doctor.</div>

                    <div class="container" align="center">
                        <div class="w-50 m-3">

                            @if (session()->has('message'))
                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                        role="img" aria-label="Warning:">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                    <button type="button" class="close" data-dismiss="alert"></button>
                                    <div class="text-center">
                                        {{ session()->get('message') }}
                                    </div>
                                </div>
                            @endif
                            <form action="{{ route('doctor.update', $doctor->id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-floating mb-3">
                                    <input type="Doctor's name"
                                        class="form-control form-control-lg {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        name="name" placeholder="Enter the Name" value="{{ $doctor->name }}"
                                        style="color: white">
                                    <label for="name">Doctor's name</label>
                                    @if ($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <br />
                                <div class="form-floating mb-3">
                                    <input type="Doctor's name"
                                        class="form-control form-control-lg {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        name="phone" placeholder="Enter Phone number" value="{{ $doctor->phone }}"
                                        style="color: white">
                                    <label for=" name">Doctor's phone</label>
                                    @if ($errors->has('phone'))
                                        <div class="error">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                                <br />
                                <div class="form-floating">
                                    <select
                                        class="form-control form-control-lg {{ $errors->has('speciality') ? 'is-invalid' : '' }}"
                                        name="speciality" style="color: white"
                                        aria-label="Floating label select example">
                                        <option selected value="{{ $doctor->speciality }}" disabled>
                                            {{ $doctor->speciality }}
                                        </option>
                                        <option value="skin">Skin</option>
                                        <option value="eye">Eye</option>
                                        <option value="heart">Heart</option>
                                        <option value="teeth">Teeth</option>
                                    </select>
                                    <label for="speciality">Doctor's speciality</label>
                                    @if ($errors->has('speciality'))
                                        <div class="error">{{ $errors->first('speciality') }}</div>
                                    @endif
                                </div>
                                <br />
                                <div class="input-group mb-3">
                                    <label class="input-text">Doctor's image</label> <br />
                                    <img src="{{ asset('uploads/doctors/' . $doctor->image) }}"
                                        class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}">
                                </div>
                                <br />
                                <div class="input-group mb-3">
                                    <input type="file"
                                        class="form-control form-control-lg {{ $errors->has('speciality') ? 'is-invalid' : '' }}"
                                        name="image">
                                    <label class="input-group-text" for="image">Change Doctor's image</label>
                                    @if ($errors->has('image'))
                                        <div class="error">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <h1>Update Doctor</h1>
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.partials.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.partials.script')
</body>

</html>
