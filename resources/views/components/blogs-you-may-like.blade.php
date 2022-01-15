<div>
    <h3>blog you may like</h3>
    <div class="row">
        @foreach ($randomBlogs as $blog)
        <div class="col-md-12">
            <x-blog-card :blog="$blog" />
        </div>
        @endforeach
    </div>
</div>