@extends("admin.layouts.layout")
@section("admin_content")



<div class="row">
    <div class="col-12">
        <div class="card">
            <form method="POST" action="{{ route( 'admin.about.update' ) }}" enctype="multipart/form-data">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-header">
                    <h4>About Us</h4>
                    <span class="text-secondary">Note: Click on label to active editing field.</span>
                </div>
                <div class="card-body">

                  <div class="mb-3">
                    <label for="about_us" class="form-label disabled_labels">Who are we?</label>
                    <textarea name="about_us" class="form-control" id="about_us" rows="3">{{ $about->about_us }}</textarea>
                    @error('about_us')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="mission" class="form-label disabled_labels">Mission</label>
                    <textarea name="mission" class="form-control" id="mission" rows="3">{{ $about->mission }}</textarea>
                    @error('mission')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="vision" class="form-label disabled_labels">Vision</label>
                    <textarea name="vision" class="form-control" id="vision" rows="3">{{ $about->vision }}</textarea>
                    @error('vision')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="value" class="form-label disabled_labels">Value</label>
                    <textarea name="value" class="form-control" id="value" rows="3">{{ $about->value }}</textarea>
                    @error('value')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection