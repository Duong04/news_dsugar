<a href="{{ route('post.detail', ['post' => $post->slug]) }}" class="post-item border-bottom border-1 border-dark-subtle py-4 d-flex align-items-center g-10 text-decoration-none">
    <div class="post-img rounded-4">
        <img class="h-100 w-100 rounded-4 object-fit-cover" src="{{ $post->image }}" alt="">
    </div>
    <div class="post-text">
        <span class="text-danger position-relative hover-fillip-item" data-text="{{ $post->category->name }}">{{ $post->category->name }}</span>
        <h5 class="post-title text-black fw-semibold">{{ $post->title }}</h5>
    </div>
</a>