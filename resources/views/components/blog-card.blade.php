@props(['blog'])
<div class="card mb-4">
    <a href="#!"><img class="card-img-top" src="{{$blog->thumbnail}}" alt="..." /></a>
    <div class="card-body">
        <h2 class="card-title h4">{{$blog->title}}</h2>
        <div>
            <span><a class="text-decoration-none"
                    href="/?username={{$blog->author->username}}">{{$blog->author->name}}</a></span>
            <span class="small text-muted">{{$blog->created_at->diffForHumans()}}</span>
        </div>
        @if ($blog->category)
        <a class="badge bg-primary text-decoration-none link-light"
            href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a>
        @endif
        <p class="card-text mt-2">{{$blog->intro}}</p>
        <a class="btn btn-primary" href="/blogs/{{$blog->slug}}">Read more →</a>
    </div>
</div>