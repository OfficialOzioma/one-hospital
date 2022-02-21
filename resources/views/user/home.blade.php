@include('user.partials.header')

<div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="hero-section">
        <div class="container text-center wow zoomIn">
            <span class="subhead">Let's make your life happier</span>
            <h1 class="display-4">Healthy Living</h1>
            <a href="#" class="btn btn-primary">Let's Consult</a>
        </div>
    </div>
</div>


<div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card-service wow fadeInUp">
                        <div class="circle-shape bg-secondary text-white">
                            <span class="mai-chatbubbles-outline"></span>
                        </div>
                        <p><span>Chat</span> with a doctors</p>
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card-service wow fadeInUp">
                        <div class="circle-shape bg-primary text-white">
                            <span class="mai-shield-checkmark"></span>
                        </div>
                        <p><span>One</span>-Health Protection</p>
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card-service wow fadeInUp">
                        <div class="circle-shape bg-accent text-white">
                            <span class="mai-basket"></span>
                        </div>
                        <p><span>One</span>-Health Pharmacy</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .page-section -->

    <div class="page-section pb-0" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <h1>Welcome to Your Health <br> Center</h1>
                    <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                        vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius,
                        inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi
                        accusantium! Placeat voluptates esse ut optio facilis!</p>
                    <a href="about.html" class="btn btn-primary">Learn More</a>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                    <div class="img-place custom-img-1">
                        <img src="../assets/img/bg-doctor.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .bg-light -->
</div> <!-- .bg-light -->

<div class="page-section" id="doctors">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @foreach ($doctors as $doctor)
                <div class="item">
                    <div class="card-doctor">
                        <div class="header">
                            <img src="{{ asset('uploads/doctors/' . $doctor->image) }}" alt="" class="doctor_img">
                            <div class="meta">
                                <a href="#"><span class="mai-call"></span></a>
                                <a href="#"><span class="mai-logo-whatsapp"></span></a>
                            </div>
                        </div>
                        <div class="body">
                            <p class="text-xl mb-0">{{ $doctor->name }}</p>
                            <span class="text-sm text-grey">{{ $doctor->speciality }}</span>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</div>


<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        <form class="main-form" method="POST" action="{{ route('book_appointment') }}">
            @csrf
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" class="form-control" placeholder="Full name" name="name">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" class="form-control" placeholder="Email address.." name="email">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="doctor_name" id="doctor_name" class="custom-select">
                        <option disabled selected>--- Select a Doctor ---</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->name }}">
                                {{ $doctor->name }} -- speciality -- {{ $doctor->speciality }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."
                        name="message"></textarea>
                </div>
            </div>

            {{-- <button type="submit" class="btn btn-primary mt-3 wow zoomIn ">Submit Request</button> --}}
            <button type="submit" class="btn btn-outline-primary btn-lg w-100">Submit Request</button>
        </form>
    </div>
</div> <!-- .page-section -->


@include('user.partials.footer')
