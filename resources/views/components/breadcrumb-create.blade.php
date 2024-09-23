<div class="section-header">
    <div class="section-header-back">
        <a href="{{ url()->previous() }}"
            class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Create New {{ ucwords($type_menu) }}</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ url($type_menu) }}">{{ ucwords($type_menu) }}</a></div>
        <div class="breadcrumb-item">Create New {{ ucwords($type_menu) }}</div>
    </div>
</div>
