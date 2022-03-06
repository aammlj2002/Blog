<x-layout>
    <!--not show hero section in Single Blog view -->
    <x-slot name="hero"></x-slot>
    <div class="col-lg-8 mt-5">
        <!-- Post content-->
        <article>
            <header class="mb-4">
                <h1 class="fw-bolder mb-1">{{$blog->title}}</h1>
                <div class="text-muted fst-italic mb-2">Posted on {{$blog->created_at->diffForHumans()}}</div>
                <a class="badge bg-primary text-decoration-none link-light"
                    href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a>
            </header>
            <figure class="mb-4"><img class="img-fluid rounded" src="{{$blog->thumbnail}}" alt="..." />
            </figure>
            <section class="mb-5">
                {{$blog->body}}
            </section>
        </article>
        <!-- Comments section-->
        <x-comment-section :comments="$blog->comments" :blog="$blog->slug" />
        </section>
    </div>
    <x-right-side-widgets />
</x-layout>