@extends("admin.layouts.layout")
@section("admin_content")

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

    <div style="overflow-x:auto;">
    <h2>All categories</h2>
    <table class="responsive-table col-12">
        
        <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
        @if(count($categories) < 1)
            <td colspan="4" class="p-5">
                <p class="text-center">No items found.</p>
            </td>
        @else
            @foreach($categories as $category)
                @if(count($categories) < 1)
                    <p>no categories</p>
                @else
                    <tr>
                    <td>#{{ ++$counter }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                    @if($category->status == 1)
                        <span class="text-success">Active</span>
                    @else
                        <span class="text-danger">Disable</span>
                    @endif
                    </td>

                    <td>
                        <a href="{{ route( 'admin.categories.edit', $category->id ) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="text-danger" href="{{ route( 'admin.categories.show', $category->id ) }}"><i class="fa-solid fa-trash"></i></a>
                    </td>
                    </tr>
                @endif
            @endforeach
        @endif
    </table>
</div>
<div class="container">
    <a href="{{ route( 'admin.categories.create' ) }}" class="btn btn-info ms-0 mt-3 col-12">Create new</a>
</div>


@endsection