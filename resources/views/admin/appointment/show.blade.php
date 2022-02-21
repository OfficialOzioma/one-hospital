<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials.css')
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
                    <div class="display-5 fw-bold text-center">Show Appointment</div>

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

                        </div>
                        <div class="container">

                            <div class="table-responsive m-5" align="center">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <td>S/N</td>
                                            <td>Name of the user</td>
                                            <td>Doctor's Name</td>
                                            <td>Date</td>
                                            <td>Message</td>
                                            <td>Status</td>
                                            <td align="center">Action</td>
                                            <td>Send Email</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $number++ }}</td>
                                                <td>{{ $appointment->name }}</td>
                                                <td>{{ $appointment->doctor_name }}</td>
                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->message }}</td>
                                                <td>
                                                    @if ($appointment->status == 'In progress')
                                                        <span class="badge rounded-pill bg-warning">
                                                            {{ $appointment->status }}
                                                        </span>
                                                    @elseif ($appointment->status == 'Cancelled')
                                                        <span class="badge rounded-pill bg-danger">
                                                            {{ $appointment->status }}
                                                        </span>
                                                    @else
                                                        <span class="badge rounded-pill bg-success">
                                                            {{ $appointment->status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td align="center">
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        @if ($appointment->status == 'Approved')
                                                            <button class="btn btn-success text-white disabled">
                                                                Approved
                                                            </button>
                                                        @else
                                                            <a href="{{ route('approve_appointment', $appointment->id) }}"
                                                                class="btn btn-outline-success"
                                                                onclick="return confirm('Are you sure you want to Approve this appointment')">Approve</a>
                                                        @endif

                                                        @if ($appointment->status == 'Cancelled')
                                                            <button class="btn btn-outline-danger disabled">
                                                                Cancelled
                                                            </button>
                                                        @else
                                                            <a href="{{ route('cancel_appointment', $appointment->id) }}"
                                                                class="btn btn-outline-danger"
                                                                onclick="return confirm('Are you sure you want to Cancel this appointment')">Cancel</a>
                                                        @endif

                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('email_view', $appointment->id) }}"
                                                        class="btn btn-outline-primary">Send Email</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
