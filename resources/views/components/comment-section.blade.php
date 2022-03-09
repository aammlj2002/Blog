@props(['comments',"blog"])
<div>
    @guest
    <p>Please <a href="{{route('login')}}">login</a> to participate in this discussion</p>
    @endguest
    <section class="mb-5">
        <p>Comment ({{$comments->count()}})</p>
        <div class="card bg-light">
            <div class="card-body">
                <!-- Comment form-->
                @auth
                <form method="POST" class="mb-4" action="/blogs/{{$blog}}/comment">
                    @csrf
                    <textarea class="form-control" rows="2" name="body"
                        placeholder="Join the discussion and leave a comment!"></textarea>
                    @error("body")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mt-3">Post</button>
                    </div>
                </form>
                @endauth
            </div>
            <!-- comment-->
            @foreach ($comments as $comment)
            <div class="d-flex mb-3 ml-3">
                <div class="flex-shrink-0 m-3"><img class="rounded-circle" src="{{$comment->author->avatar}}"
                        alt="..." />
                </div>
                <div class="ms-3">
                    <div class="fw-bold">{{$comment->author->name}}</div>
                    <p class="text-muted m-0">{{$comment->created_at->diffForHumans()}}</p>
                    {{$comment->body}}
                    @foreach ($comment->replies as $reply)
                    <div class="d-flex mt-4">
                        <div class="flex-shrink-0"><img class="rounded-circle" src="{{$reply->author->avatar}}"
                                alt="..." /></div>
                        <div class="ms-3">
                            <div class="fw-bold">{{$reply->author->name}}</div>
                            <p class="text-muted m-0">{{$reply->created_at->diffForHumans()}}</p>
                            {{$reply->body}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- comment reply form --}}
            @auth
            <form method="POST" class="mb-4 p-3" action="/blogs/{{$blog}}/comment/{{$comment->id}}/reply">
                @csrf
                <textarea class="form-control" rows="2" name="body"
                    placeholder="Join the discussion and leave a comment!"></textarea>
                @error("body")
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-3">Reply</button>
                </div>
            </form>
            @endauth
            <hr>
            @endforeach
        </div>
</div>
</div>