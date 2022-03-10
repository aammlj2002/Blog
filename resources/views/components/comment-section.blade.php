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
            {{-- comment --}}
            @foreach ($comments as $comment)
            <x-comment :comment="$comment" :blog="$blog" />
            @endforeach
        </div>
    </section>
</div>