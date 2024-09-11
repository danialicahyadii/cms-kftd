@extends('layouts.app')

@section('title', ucwords($type_menu))

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ ucwords($type_menu) }}</h1>
                <div class="section-header-button">

                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">{{ ucwords($type_menu) }}</a></div>
                    <div class="breadcrumb-item">All {{ ucwords($type_menu) }}</div>
                </div>
            </div>
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
                                    <a href="{{ route('events.create') }}"
                                    class="btn btn-primary">Add New</a>
                                </div>
                                <div class="float-right">
                                    <form>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
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
                                            <th>Title</th>
                                            <th>Time</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                        </tr>
                                        @foreach ($events as $row)
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
                                                <td>{{ $row->title }}
                                                    <div class="table-links">
                                                        <a href="{{ route('events.show', $row->id) }}">View</a>
                                                        <div class="bullet"></div>
                                                        <a href="{{ route('events.edit', $row->id) }}">Edit</a>
                                                        <div class="bullet"></div>
                                                        <a class="text-danger delete-link" style="cursor:pointer"
                                                        data-id="{{ $row->id }}">Delete</a>
                                                        <form method="POST" id="delete-form{{ $row->id }}" action="{{ route('events.delete', $row->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#">{{ \Carbon\Carbon::parse($row->start_event)->translatedFormat('l, d F Y') }}</a> s.d
                                                    <a href="#">{{ \Carbon\Carbon::parse($row->end_event)->translatedFormat('l, d F Y') }}</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $row->image_url }}" target="_blank">
                                                        <img alt="image" class="mr-3 m-2 rounded" width="100" src="{{ $row->image_url }}">
                                                    </a>
                                                </td>
                                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                            <!-- Previous Page Link -->
                                            @if ($events->onFirstPage())
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $events->previousPageUrl() }}" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                            @endif

                                            <!-- Pagination Elements -->
                                            @foreach ($events->links()->elements as $element)
                                                <!-- Make three dots -->
                                                @if (is_string($element))
                                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                                @endif

                                                <!-- Array Of Links -->
                                                @if (is_array($element))
                                                    @foreach ($element as $page => $url)
                                                        @if ($page == $events->currentPage())
                                                            <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                                                        @else
                                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                            <!-- Next Page Link -->
                                            @if ($events->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $events->nextPageUrl() }}" aria-label="Next">
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
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete-link').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var form = $('#delete-form' + id);
                form.submit();
            });
        });
    </script>
@endpush