<div class="col-12 col-lg-5">
    @foreach ($posts as $item)
    <x-posts.top-post-item :post="$item" />
    @endforeach
</div>