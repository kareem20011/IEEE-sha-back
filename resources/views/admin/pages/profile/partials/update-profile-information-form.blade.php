<div class="row">
    <div class="card">
        <form method="POST" action="{{ route( 'admin.profile.update' ) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-12 m-3">
                        <div class="button-wrapper">
                            <div>
                                @if ($user->hasMedia('images'))
                                    <img class="dashboard-table-image" src="{{ $user->getFirstMediaUrl('images') }}" alt="{{ $user->name }}">
                                @else
                                    <p>No image</p>
                                @endif
                            </div>
                            <label for="auth_image" class="btn btn-primary" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input name="image" type="file" id="auth_image" class="account-file-input" hidden accept="image/png, image/jpeg" />
                            </label>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 m-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ auth()->user()->name }}" autofocus />
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 m-3">
                        <label for="email" class="form-label">email</label>
                        <input class="form-control" type="email" id="email" name="email" value="{{ auth()->user()->email }}" autofocus />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>