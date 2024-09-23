@extends('layouts.app')

@section('title', 'Create New ' . $type_menu)

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            @include('components.breadcrumb-create')


            <div class="section-body">
                <h2 class="section-title">Create New {{ $type_menu }}</h2>
                <p class="section-lead">
                    On this page you can create a new {{ strtolower($type_menu) }} and fill in all fields.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Write Your {{ $type_menu }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('award.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Award</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="nama_award" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Award English</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="nama_award_en" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Award</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview"
                                                class="image-preview">
                                                <label for="image-upload"
                                                    id="image-label">Choose File</label>
                                                <input type="file" name="image_award"
                                                    id="image-upload" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Award Show</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview-award-show"
                                                class="image-preview">
                                                <label for="image-upload"
                                                    id="image-label-award-show">Choose File</label>
                                                <input type="file" name="image_award_show"
                                                    id="image-upload-award-show" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date Award</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="date_award"
                                            class="form-control datepicker">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary" type="submit">Create {{ $type_menu }}</button>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
@endpush
