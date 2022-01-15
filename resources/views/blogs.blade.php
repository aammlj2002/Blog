<x-layout>
    <!-- Blog entries-->
    <div class="col-lg-8">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-lg-6">
                <x-blog-card :blog="$blog" />
            </div>
            @endforeach
        </div>
        {{$blogs->links()}}
    </div>
</x-layout>