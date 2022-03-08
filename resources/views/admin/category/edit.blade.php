<x-admin-layout>
    <p class="fs-4">Edit category</p>
    <form class="mb-4" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input name="name" type="text" value="{{$category->name}}" class="form-control"
                placeholder="category name ...">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
        @error("name")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </form>
</x-admin-layout>