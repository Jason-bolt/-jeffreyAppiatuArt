@extends('control.cms.app.layout')

@section('content')

    <!-- Artworks -->
    <section class="p-sm-5 pt-5">
        <div class="container text-center">
            <p class="display-4 pb-5">Artworks</p>

            <!-- Add new artwork button -->
        <button type="button" data-bs-toggle="modal" data-bs-target="#addArtwork" class="btn btn-dark mt-3 mb-5">
            Add New Artwork <i class="bi bi-plus"></i>
        </button>

          <!-- Add new artwork modal -->
          <div class="modal fade" id="addArtwork">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="card-title">Add new artwork</h5>
                  <button
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="close"
                  ></button>
                </div>
                <div class="modal-body p-0">
                  <form class="form p-2 p-sm-4" action="artworks" method="post" onsubmit="return validateArtwork()" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                    <!-- Artwork image -->
                    <div class="form-group">
                      <label for="artwork_image" class="lead pb-2"> Artwork image </label>
                      <input
                        type="file"
                        name="artwork_image"
                        id="artwork_image"
                        class="form-control"
                        required
                      />
                        <span class="text-danger">@error('artwork_image'){{ $message }}@enderror</span>
                    </div>
                    <!-- Artwork name -->
                    <div class="form-group mt-3 mb-4">
                      <label for="artwork_name" class="lead pb-2"> Artwork name </label>
                      <input
                        type="text"
                        name="artwork_name"
                        id="artwork_name"
                        class="form-control"
                        required
                      />
                        <span class="text-danger">@error('artwork_name'){{ $message }}@enderror</span>
                    </div>
                    <button class="btn btn-dark" type="submit px-3">Add Artwork</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

            <div class="row g-4">
                @forelse($artworks as $artwork)
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

                    <!-- Modal for image -->
                    <div class="modal fade" id="artModal{{ $artwork->id }}">
                        <div class="modal-dialog">
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
                                    <img src="{{ asset('images/' . $artwork->artwork_image) }}" alt="{{ $artwork->artwork_name }}" class="img-fluid"/>
                                </div>
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editArtwork{{ $artwork->id }}"
                                        class="btn btn-success"
                                        data-bs-dismiss="modal"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="artworks/{{ $artwork->id }}" method="post" onclick="return confirm('Delete artwork...');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
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
                                    <img src="{{ asset('images/' . $artwork->artwork_image) }}" alt="{{ $artwork->artwork_name }}" class="img-fluid"/>
                                </div>
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editArtwork{{ $artwork->id }}"
                                        class="btn btn-success"
                                        data-bs-dismiss="modal"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form
                                        action="artworks/{{ $artwork->id }}"
                                        method="post"
                                        onclick="return confirm('Delete artwork...');"
                                    >
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
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

                    <!-- Modal for editing image -->
                    <div class="modal fade" id="editArtwork{{ $artwork->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="card-title text-capitalize">Edit Form ({{ $artwork->artwork_name }})</h5>
                                    <button
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="close"
                                    ></button>
                                </div>
                                <div class="modal-body">
                                    <form action="artworks/{{ $artwork->id }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        @method('put')
                                        <!-- Artwork image -->
                                        <div class="form-group">
                                            <label for="artwork_image" class="lead pb-2 text-capitalize"> {{ $artwork->artwork_name }} </label>
                                            <input
                                                type="file"
                                                name="artwork_image"
                                                id="artwork_image"
                                                class="form-control"
                                            />
                                        </div>
                                        <!-- Artwork name -->
                                        <div class="form-group mt-3">
                                            <label for="artwork_name" class="lead pb-2"> Artwork name </label>
                                            <input
                                                type="text"
                                                name="artwork_name"
                                                id="artwork_name"
                                                class="form-control"
                                                value="{{ $artwork->artwork_name }}"
                                            />
                                        </div>
                                        <input
                                            type="submit"
                                            class="btn btn-dark mt-3 px-3"
                                            name="editFormSubmit"
                                            value="Edit"
                                        />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <p class="display-3 text-secondary my-5">
                        No artworks added yet.
                    </p>
                @endforelse
            </div>
        </div>

    </section>

@endsection

<script>
    function validateArtwork(){
        let artwork_name = document.getElementById('artwork_name').value;
        if (artwork_name.trim() == ''){
            alert('Artwok fields can not be left empty!');
            return false;
        }
    }

</script>

