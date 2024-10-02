@extends('layouts.app')

@section('title', ucwords($type_menu))

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            @include('components.breadcrumb-index')
            <div class="section-body">
                <h2 class="section-title">{{ ucwords($type_menu) }}</h2>
                <p class="section-lead">
                    You can manage all posts, such as editing, deleting and more.
                </p>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All {{ ucwords($type_menu) }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <a href="{{ route('product.create') }}"
                                        class="btn btn-primary">Add New</a>
                                        <button class="btn btn-primary"
                                    data-toggle="modal"
                                    data-target="#importExcel">Import Excel</button>
                                </div>
                                <div class="float-right">
                                    <form action="{{ url('search', request()->path()) }}" method="GET" enctype="multipart/form-data">
                                        @csrf
                                        @method('GET')
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th class="pt-2 text-center">
                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                    <input type="checkbox"
                                                        data-checkboxes="mygroup"
                                                        data-checkbox-role="dad"
                                                        class="custom-control-input"
                                                        id="checkbox-all">
                                                    <label for="checkbox-all"
                                                        class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Kode Material</th>
                                            <th>Material</th>
                                            <th>Base UOM</th>
                                            <th>Prinsipal</th>
                                        </tr>
                                        @foreach ($product as $row)
                                            <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox"
                                                            data-checkboxes="mygroup"
                                                            class="custom-control-input"
                                                            id="checkbox-2">
                                                        <label for="checkbox-2"
                                                            class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>{{ $row->material }}</td>
                                                <td>{{ $row->text_material }}
                                                    <div class="table-links">
                                                        <a href="{{ route('product.edit', $row->material) }}">Edit</a>
                                                        <div class="bullet"></div>
                                                        <a href="{{ route('product.destroy', $row->material) }}"
                                                            class="text-danger" data-confirm-delete="true">Trash</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        {{ $row->baseuom }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#">{{ $row->prinsipal }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                            <!-- Previous Page Link -->
                                            @if ($product->onFirstPage())
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $product->previousPageUrl() }}" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                            @endif

                                            <!-- Pagination Elements -->
                                            @foreach ($product->links()->elements as $element)
                                                <!-- Make three dots -->
                                                @if (is_string($element))
                                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                                @endif

                                                <!-- Array Of Links -->
                                                @if (is_array($element))
                                                    @foreach ($element as $page => $url)
                                                        @if ($page == $product->currentPage())
                                                            <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                                                        @else
                                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                            <!-- Next Page Link -->
                                            @if ($product->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $product->nextPageUrl() }}" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade"
        tabindex="-1"
        role="dialog"
        id="importExcel">
        <div class="modal-dialog"
            role="document">
            <form action="{{ route('product.export') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Excel</h5>
                        <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Upload Date</label>
                            <input type="date" name="upload_date" class="form-control selector" readonly>
                        </div>
                        <div class="form-group">
                            <label>Upload File (Template File untuk <a href="">Upload</a>)</label>
                            <input type="file" name="fileImport" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit"
                            class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        var date = $(".selector").flatpickr({
            enableTime: false,
            altFormat: "F j, Y",
            altInput: true,
            dateFormat: "Y-m-d",
            defaultDate: 'today',
            minDate: 'today',
            maxDate: 'today',
            allowInput: false
        });
    </script>

@endpush
