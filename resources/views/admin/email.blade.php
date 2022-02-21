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
                    <div class="display-5 fw-bold text-center">Add Doctor.</div>

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
                            <form action="{{ route('send_email', $appointment->id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="greeting">Greetings</label>
                                    <input type="text" class="form-control form-control-lg bg-white text-dark"
                                        name="greeting" value="Hello, {{ $appointment->name }}">

                                </div>

                                <div class="form-group">
                                    <label for="body">Body</label>
                                    <textarea class="form-control form-control-lg bg-white text-dark" name="body"
                                        cols="9" rows="10"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 btn-lg">Send</button>
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
