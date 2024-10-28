@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('status') }}
    </div>
@endif

@if (session('logFilePath'))
    <div class="alert alert-success" role="alert">
        Import completed! 
    </div>
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('message') }}
        <a href="{{ Storage::url(session('logFilePath')) }}" class="badge bg-label-primary rounded-pill" download>Download <i class="ti ti-download" style="font-size: 15px;"></i></a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('delete'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('delete') }}
    </div>
@endif
