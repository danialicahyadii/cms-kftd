@extends('layouts.app')

@section('title', 'Edit '. ucwords($type_menu))

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            @include('components.breadcrumb-edit')


            <div class="section-body">
                <h2 class="section-title">Edit {{ ucwords($type_menu) }}</h2>
                <p class="section-lead">
                    On this page you can create a new post and fill in all fields.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Write Your {{ ucwords($type_menu) }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('branch.update', $branch->soffice) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sales Office</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" min="0"
                                                class="form-control" name="soffice" value="{{ $branch->soffice }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sales Office Desc</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                class="form-control" name="soffice_desc" value="{{ $branch->soffice_desc }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="form-control" name="alamat" style="height: 125px;">{{ $branch->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            {{-- {{ dd(url('https://kftd.co.id/assets/img/branch/'.urlencode($branch->image))) }} --}}
                                            <div id="image-preview"
                                                class="image-preview" style="background-image: url('https://kftd.co.id/assets/img/branch/{{ str_replace(' ', '%20', $branch->image) }}');
                                                background-size: cover; background-position: center center;">
                                                <label for="image-upload"
                                                    id="image-label">Choose File</label>
                                                <input type="file"
                                                    name="image"
                                                    id="image-upload" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Telpon</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                class="form-control" name="no_telp" value="{{ $branch->no_telp }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Branch Manager</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                class="form-control" name="branch_manager" value="{{ $branch->branch_manager }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                class="form-control" name="email" value="{{ $branch->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3">Longitude dan Latitude</label>
                                        <div class="col-sm-12 col-md-3">
                                            <input type="text" name="longitude" value="{{ $branch->longitude }}" class="form-control" placeholder="Longitude">
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <input type="text" name="latitude" value="{{ $branch->latitude }}" class="form-control" placeholder="Latitude">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gmaps Link</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                class="form-control" name="gmaps_link" value="{{ $branch->gmaps_link }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
@endpush
