<x-layout>
    <article>
        <h2>{{$blog->title}}</h2>
        <p>Author- <a href="/">{{$blog->author->name}}</a></p>
        <p>Created at- {{$blog->created_at->diffForHumans()}}</p>
        <p>Category- <a href="/">{{$blog->category->name}}</a></p>
        <p>{{$blog->body}}</p>
        <a href="/">back</a>
    </article>
    <hr>
</x-layout>