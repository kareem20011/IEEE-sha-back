@extends("admin.layouts.layout")
@section("admin_content")
<div class="jumbotron">
    <h1 class="display-6 text-danger">Confirm deletion</h1>
    <p class="lead">When you delete this category, you will delete all the elements associated with it, such as the board and workshops.</p>
    <hr class="my-4">
    <label for="title">Category Title</label>
    <input id="title" type="text" class="form-control" value="{{ $category->title }}" disabled>
    <p class="lead">
    <form method="post" action="{{ route( 'admin.categories.destroy', $category->id ) }}">
        @csrf
        @method('DELETE')
        <label for="password">Password</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password to confirm deletion">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button  class="btn btn-danger" href="#" type="submit">Delete</button>
    </form>
    </p>
</div>
@endsection