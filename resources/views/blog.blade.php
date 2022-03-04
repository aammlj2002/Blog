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
            <figure class="mb-4"><img class="img-fluid rounded" src="{{asset('/images/marco.jpg')}}" alt="..." />
            </figure>
            <section class="mb-5">
                {{$blog->body}}
            </section>
        </article>
        <!-- Comments section-->
        <section class="mb-5">
            <div class="card bg-light">
                <div class="card-body">
                    <!-- Comment form-->
                    <form class="mb-4"><textarea class="form-control" rows="3"
                            placeholder="Join the discussion and leave a comment!"></textarea></form>
                    <!-- Single comment-->
                    @foreach (range(1,5) as $item)

                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0"><img class="rounded-circle"
                                src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                        <div class="ms-3">
                            <div class="fw-bold">Commenter Name</div>
                            When I look at the universe and all the ways the universe wants to kill us, I find
                            it
                            hard to reconcile that with statements of beneficence.
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-layout>