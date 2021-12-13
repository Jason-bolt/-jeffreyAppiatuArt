@extends('control.cms.app.layout')

@section('content')
    <!-- Edit form -->
    <section class="p-sm-5">
        <div class="container">
          <form action="bio/{{ $artist->id }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
            <!-- Artist image -->
            <div class="form-group">
              <label for="artist_image" class="lead pb-2"> Artist image </label>
              <input
                type="file"
                name="artist_image"
                id="artist_image"
                class="form-control"
              />
            </div>
            <!-- About artist -->
            <div class="form-group mt-3">
              <label for="about_artist" class="lead pb-2"> About artist </label>
              <textarea
                name="about_artist"
                id="about_artist"
                rows="10"
                class="form-control"
              >{{ $artist->artist_about }}</textarea
              >
            </div>
            <button type="submit" class="btn btn-dark mt-3 px-3">Save changes</button>
          </form>
        </div>
      </section>

      <!-- About Artist -->
      <section class="p-sm-5 pt-5">
        <div class="container text-center">
          <p class="display-4 pb-5">About Artist</p>
          <img
            src="{{ asset('images/' . $artist->artist_image) }}"
            alt="Artist"
            class="float-start w-50 me-5 mb-3 shadow rounded"
          />
          <p class="text-start text-secondary" style="white-space: pre-wrap;">{{ $artist->artist_about }}</p>
        </div>
      </section>

      <div style="clear: both"></div>
@endsection
