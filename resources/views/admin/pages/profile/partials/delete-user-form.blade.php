
<div class="card">
    <h5 class="card-header">Delete Account</h5>
    <div class="card-body">
        <div class="mb-3 col-12 mb-0">
            <div class="alert alert-warning">
                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
        </div>
        <form method="post" action="{{ route('profile.destroy') }}" enctype="multipart/form-data">
            @csrf
            @method('delete')
            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Delete accoutn
            </button> -->
            <button id="remove-btn" type="button" class="btn btn-danger deactivate-account">remove Account</button>
            <div id="delete-user-password" style="display: none;" class="mb-3">
                <label>Your password</label>
                <input type="password" name="password" class="form-control">
                <button type="button" class="btn btn-danger deactivate-account">Delete</button>
            </div>
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            @if(Session::has("passwrodError"))
            <p class="text-danger">{{ Session::get("passwrodError") }}</p>
            @endif
        </form>
    </div>
</div>
<script>
    let removeBtn = document.getElementById("remove-btn");
    let deleteUserPassword = document.getElementById("delete-user-password");
    removeBtn.addEventListener("click", function(){
        deleteUserPassword.style.display = "block"
    })
</script>