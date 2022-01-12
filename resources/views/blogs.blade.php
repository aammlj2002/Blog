<x-layout>
    <h1>Blogs</h1>
    <form action="">
        <input name="search" type="text" placeholder="Search.." value="{{request('search')}}">
        <button type="submit">Submit</button>
    </form>

    @foreach ($blogs as $blog)
    <article>
        <h2>{{$blog->title}}</h2>
        <p>Author- <a href="/?username={{$blog->author->username}}">{{$blog->author->name}}</a></p>
        <p>Created at- {{$blog->created_at->diffForHumans()}}</p>
        <p>Category- <a href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a></p>
        <p>{{$blog->intro}}</p>
        <a href="/blogs/{{$blog->slug}}">see more</a>
    </article>
    <hr>
    @endforeach
</x-layout>