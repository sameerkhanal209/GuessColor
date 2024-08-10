@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@enderror

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@enderror

@if(session()->has('primary'))
    <div class="alert alert-primary" role="alert">
        {{ session('primary') }}
    </div>
@enderror

@if(session()->has('error-dismiss'))
    <div class="alert alert-danger alert-closeable" role="alert">
        {{ session('error-dismiss') }}

        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@enderror

@if(session()->has('success-dismiss'))
    <div class="alert alert-success alert-closeable" role="alert">
        {{ session('success-dismiss') }}

        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@enderror

@if(session()->has('primary-dismiss'))
    <div class="alert alert-primary alert-closeable" role="alert">
        {{ session('primary-dismiss') }}

        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@enderror
