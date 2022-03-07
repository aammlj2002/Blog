<x-admin-layout>
    <p class="fs-4 pl-4">Admin dashbord</p>
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
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
</x-admin-layout>