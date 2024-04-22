@extends("admin.layouts.layout")
@section("admin_content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <form method="POST" action="{{ route( 'admin.events.store' ) }}" enctype="multipart/form-data">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-header">
                    <h4>Add event</h4>
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
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3">{{ $about->description }}</textarea>
                        @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Expiry date</label>
                        <input type="date" class="form-control" name="expiry_date">
                        @error('expiry_date')
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
                            <label class="form-check-label" for="status2">Disaple</label>
                        </div>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-start align-items-sm-center">
                            <div class="button-wrapper">
                                <p class="text-muted mb-0">Upload image JPG, PNG.</p>
                                <label for="event_image" class="btn btn-primary" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input name="image" type="file" id="event_image" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
      <a href="{{ route( 'admin.events.index' ) }}" class="btn btn-info ms-0 mt-3 col-12">Show all</a>
  </div>
</div>
@endsection
