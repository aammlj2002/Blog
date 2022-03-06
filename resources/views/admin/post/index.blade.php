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
            @foreach ($blogs as $blog)
            <tr>
                <th scope="row">1</th>
                <td>{{$blog->title}}</td>
                <td><a href="#" class="btn btn-warning btn-sm">Edit</a></td>
                <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>