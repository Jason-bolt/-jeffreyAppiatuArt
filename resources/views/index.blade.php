@extends('app_layout.layout')


@section('content')


    <!-- Gallery -->
    <section class="p-sm-5 pt-5">
        <div class="container text-center">
            <p class="display-4 pb-5">Gallery</p>
            <div class="row g-4">

                @forelse ($artworks as $artwork)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <button
                            data-bs-toggle="modal"
                            data-bs-target="#artModal{{ $artwork->id }}"
                            class="w-100 p-0 border-0"
                        >
                            <div
                                class="card"
                                style="
                                    height: 300px;
                                    background-image: url('{{ asset('images/' . $artwork->artwork_image) }}');
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                    background-position: center;
                                    "
                            ></div>
                            <p class="mb-0 p-2 lead text-capitalize">{{ $artwork->artwork_name }}</p>
                        </button>
                    </div>
                @empty
                    <div class="text-center display-3 text-secondary py-5">
                        No artwork added yet.
                    </div>
                @endforelse

            </div>
        </div>
    </section>

@endsection

@forelse($artworks as $artwork)
    <!-- Modal for image -->
    <div class="modal fade m-0" id="artModal{{ $artwork->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="card-title text-capitalize">{{ $artwork->artwork_name }}</h5>
                    <button
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="close"
                    ></button>
                </div>
                <div class="modal-body p-0">
                    <img src="{{ asset('images/' . $artwork->artwork_image) }}"
                         alt="{{ $artwork->artwork_name }}" class="img-fluid"/>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#artModalFull{{ $artwork->id }}"
                        class="btn btn-dark"
                        data-bs-dismiss="modal"
                    >
                        Full screen
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="artModalFull{{ $artwork->id }}">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="card-title text-capitalize">{{ $artwork->artwork_name }}</h5>
                    <button
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="close"
                    ></button>
                </div>
                <div class="modal-body p-0 text-center">
                    <img src="{{ asset('images/' . $artwork->artwork_image) }}"
                         alt="{{ $artwork->artwork_name }}" class="img-fluid"/>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#artModal{{ $artwork->id }}"
                        class="btn btn-dark"
                        data-bs-dismiss="modal"
                    >
                        Small screen
                    </button>
                </div>
            </div>
        </div>
    </div>
@empty
    ...
@endforelse
