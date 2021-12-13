@extends('app_layout.layout')


@section('content')

<!-- About Artist -->
<section class="p-sm-5 pt-5">
    <div class="container text-center">
      <p class="display-4 pb-5">About Artist</p>
      <img
        src="{{ asset('images/' . $artist->artist_image) }}"
        alt="Artist"
        class="float-start w-50 me-5 mb-3 shadow rounded"
      />
      <p class="text-start text-secondary" style="white-space: pre-wrap">{{ $artist->artist_about }}</p>
    </div>
  </section>

  <div style="clear: both"></div>

@endsection
