@include('user.partials.header')
<div class="container-fluid">
    <div class="container">

        <div class="table-responsive m-5" align="center">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <td style="width:5%">S/N</td>
                        <td style="width:15%">Doctor's Name</td>
                        <td style="width:15%">Date</td>
                        <td style="width:45%">Message</td>
                        <td>Status</td>
                        <td align="center">Cancel Appointment</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getAppointment as $appointment)
                        <tr>
                            <td>{{ ++$number }}</td>
                            <td>{{ $appointment->doctor_name }}</td>
                            <td> {{ \Carbon\Carbon::parse($appointment->date)->diffForHumans() }}</td>
                            {{-- <td>{{ $appointment->date }}</td> --}}
                            <td>{{ $appointment->message }}</td>
                            <td>
                                <span class="badge rounded-pill bg-warning">{{ $appointment->status }}</span>
                            </td>
                            <td align="center">
                                <a href="{{ route('delete_appointment', $appointment->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to Delete this appointment')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@include('user.partials.footer')
