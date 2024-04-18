@extends("admin.layouts.layout")
@section("admin_content")
<div class="row">
    <div class="col-12">
        <div class="card">
        <form method="POST" action="{{ route( 'admin.categories.store' ) }}" enctype="multipart/form-data">
            @csrf
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-header">
                <h4>Add category</h4>
            </div>
            <div class="card-body">



                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old( 'title' ) }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Status:</label>
                    <div class="form-check">
                        <input class="form-check-input" value="1" type="radio" name="status" id="status1">
                        <label class="form-check-label" for="status1">Active</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="0" type="radio" name="status" id="status2">
                        <label class="form-check-label" for="status2">Disable</label>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>




            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <div class="container">
        <a href="{{ route( 'admin.categories.index' ) }}" class="btn btn-info ms-0 mt-3 col-12">Show all</a>
    </div>
</div>
@endsection
