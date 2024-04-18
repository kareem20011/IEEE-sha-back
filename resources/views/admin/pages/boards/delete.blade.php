@extends("admin.layouts.layout")
@section("admin_content")
<div class="jumbotron">
    <h1 class="display-6 text-danger">Confirm deletion</h1>
    <p class="lead">Are you sure you want to delete this board?</p>
    <hr class="my-4">
    @if ($board->hasMedia('images'))
        <img style="width: 200px;" class="mb-3 d-block" src="{{ $board->getFirstMediaUrl('images') }}" alt="{{ $board->name }}">
    @else
        <p>No image</p>
    @endif
    <label for="title">board Title</label>
    <input id="title" type="text" class="form-control" value="{{ $board->title }}" disabled>
    <p class="lead">
    <form method="post" action="{{ route( 'admin.boards.destroy', $board->id ) }}">
        @csrf
        @method('DELETE')
        <label for="password">Password</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password to confirm deletion">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button  class="btn btn-danger" href="#" type="submit">Delete</button>
        <a  class="btn btn-secondary mt-2" href="{{ route('admin.boards.index') }}" type="button">Cancel</a>
    </form>
    </p>
</div>
@endsection