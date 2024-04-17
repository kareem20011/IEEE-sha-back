@extends("admin.layouts.layout")
@section("admin_content")


<div class="row">
    <div class="card">
        @if(Session::has('status'))
        <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
        @endif
        <form method="POST" action="{{ route( 'admin.settings.update' ) }}" enctype="multipart/form-data">
            @csrf
            <div class="catd-title">
                <h1>Settings</h1>
                <span class="text-secondary">Note: Click on label to active editing field.</span>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center justify-content-evenly ">
                    <div class="button-wrapper">
                        <label for="logo" class="btn btn-primary me-2 mb-4" tabindex="0">
                            @if($setting->hasMedia('logo'))
                                <img src="{{ $setting->getFirstMediaUrl('logo') }}" class="m-1 dashboard-table-image">
                            @else
                                <img src="" class="card-img-top" alt="...">
                            @endif
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input name="logo" type="file" id="logo" class="account-file-input" hidden accept="image/png, image/jpeg" />
                            Logo
                        </label>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="button-wrapper">
                        <label for="favicon" class="btn btn-primary me-2 mb-4" tabindex="0">
                            @if($setting->hasMedia('favicon'))
                                <img src="{{ $setting->getFirstMediaUrl('favicon') }}" class="m-1 dashboard-table-image">
                            @else
                                <img src="" class="card-img-top" alt="...">
                            @endif
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input name="favicon" type="file" id="favicon" class="account-file-input" hidden accept="image/png, image/jpeg" />
                            Favicon
                        </label>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <!-- <span class="text-secondary text-center">Note: Click on label to edit.</span> -->
                    <div class="col-12 m-3">
                        <label for="phone_number" class="disabled_labels form-label">Phone number</label>
                        <input class="form-control" type="text" id="phone_number" name="phone_number" value="{{ $setting->phone_number }}" autofocus />
                        @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 m-3">
                        <label for="whatsapp" class="form-label disabled_labels">Whatsapp</label>
                        <input class="form-control" type="number" id="whatsapp" name="whatsapp" value="{{ $setting->whatsapp }}" autofocus />
                        @error('whatsapp')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 m-3">
                        <label for="email" class="form-label disabled_labels">email</label>
                        <input class="form-control" type="email" id="email" name="email" value="{{ $setting->email }}" autofocus />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>



            <div class="card-body">
                <div class="row">
                    <div class="col-12 m-3">
                        <label for="facebook" class="form-label disabled_labels">Facebook</label>
                        <input class="form-control" type="text" id="facebook" name="facebook" value="{{ $setting->facebook }}" autofocus />
                        @error('facebook')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 m-3">
                        <label for="instagram" class="form-label disabled_labels">Instagram</label>
                        <input class="form-control" type="text" id="instagram" name="instagram" value="{{ $setting->instagram }}" autofocus />
                        @error('instagram')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 m-3">
                        <label id="test" for="tiktok" class="disabled_labels form-label">Tiktok</label>
                        <input class="form-control" type="text" id="tiktok" name="tiktok" value="{{ $setting->tiktok }}" autofocus />
                        @error('tiktok')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>



            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
            </div>
        </form>
    </div>
</div>

@endsection
