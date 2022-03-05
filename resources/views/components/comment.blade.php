@props(['comment'])
<div class="d-flex mb-3">
    <div class="flex-shrink-0"><img class="rounded-circle" src="{{$comment->author->avatar}}" alt="..." /></div>
    <div class="ms-3">
        <div class="fw-bold">{{$comment->author->name}}</div>{{$comment->body}}
    </div>
</div>