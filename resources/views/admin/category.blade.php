<x-admin-layout>

    <p class="fs-4">Add category</p>
    <form class="mb-4" method="POST" action="/admin/categories/create">
        @csrf
        <div class="input-group mb-3">
            <input name="name" type="text" class="form-control" placeholder="category name ...">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
        @error("name")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </form>
    <h2 class="fs-4">Categories</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td>{{$category->name}}</td>
                <td><a href="/admin/categories/{{$category->slug}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                <td>
                    <form action="/admin/categories/{{$category->slug}}/delete" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
</x-admin-layout>