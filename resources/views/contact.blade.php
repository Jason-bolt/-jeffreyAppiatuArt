@extends('app_layout.layout')


@section('content')

    <!-- Contact Form -->
    <section class="p-sm-5 pt-5">
        <div class="container">
            <p class="display-4 pb-5">Contact Us</p>
            <div class="row">
                <div class="col-md-10 col-lg-8 m-auto">
                    <form action="{{ route('contact.send') }}" class="form" method="POST"
                          onsubmit="return validateForm()">
                    @csrf
                    @method('post')
                    <!-- Name -->
                        <div>
                            <label class="text-secondary text-start py-2">Name*</label>
                            <div
                                class="
                                  d-sm-flex
                                  align-items-center
                                  justify-content-between
                                  mb-2
                                "
                            >

                                <input
                                    type="text"
                                    class="form-control me-sm-2 mb-3 mb-sm-0"
                                    name="first_name"
                                    id="first_name"
                                    placeholder="First Name"
                                    required
                                />

                                <input
                                    type="text"
                                    class="form-control ms-sm-2"
                                    name="last_name"
                                    id="last_name"
                                    placeholder="Last Name"
                                    required
                                />
                            </div>
                            @error('first_name')
                                <small class="text-danger me-5">{{ $message }}</small>
                            @enderror
                            @error('last_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div>
                            <label class="text-secondary text-start py-2">Email*</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control mb-2"
                                placeholder="example@email.com"
                                required
                            />
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Subject -->
                        <div>
                            <label class="text-secondary text-start py-2">Subject*</label>
                            <input
                                type="text"
                                name="subject"
                                id="subject"
                                class="form-control mb-2"
                                placeholder="Subject"
                                required
                            />
                            @error('subject')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Message -->
                        <div>
                            <label class="text-secondary text-start py-2">Message*</label>
                            <textarea
                                name="message"
                                id="message"
                                rows="4"
                                class="form-control mb-3"
                            ></textarea>
                            @error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-dark mt-4 py-2 px-5">SUBMIT</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

<script>
    function validateForm() {
        let first_name = document.getElementById('first_name').value.trim();
        let last_name = document.getElementById('last_name').value.trim();
        let subject = document.getElementById('subject').value.trim();
        let message = document.getElementById('message').value.trim();

        if (first_name == '' || last_name == '' || subject == '' || message == '') {
            iziToast.error({
                title: 'Error',
                message: 'Please fill all fields before submitting!',
                position: 'bottomRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                // progressBarColor: 'rgb(0, 255, 184)',
            });
            return false;
        }
    }
</script>
