<x-admin-layout>
    <p class="fs-4">Create Blog</p>
    <form class="mb-4" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" value="{{old('title')?? $blog->title}}">
        </div>
        @error("title")
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <input name="thumbnail" type="file" class="form-control" value="{{old('thumbnail')}}">
        </div>
        @error("thumbnail")
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input name="slug" type="text" class="form-control" value="{{old('slug')?? $blog->slug}}">
        </div>
        @error("slug")
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label class="form-label">Intro</label>
            <textarea name="intro" type="text" class="form-control">{{old("intro")?? $blog->intro}}</textarea>
        </div>
        @error("intro")
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" type="text" class="form-control">{{old("body")?? $blog->body}}</textarea>
        </div>
        @error("body")
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select">
                @foreach (App\Models\Category::all() as $category)
                <option value="{{$category->id}}" {{old("category_id")==$category->id||$blog->category_id==$category->id
                    ? "selected" : ""}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        @error("category_id")
        <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</x-admin-layout>