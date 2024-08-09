<a href="{{ route('post.detail', ['post' => $post->slug]) }}" class="new-post h-sm-300 d-flex flex-column justify-content-between overflow-hidden position-relative rounded-4 post-hv text-decoration-none">
    <div class="new-post-img overflow-hidden rounded-4">
        <img class="w-100 h-100 object-fit-cover rounded-4" src="{{ $post->image }}" alt="">
    </div>
    <div class="text-black mt-2">
        <span class="ct-topic fs-7 position-relative hover-fillip-item" data-text="{{ $post->category->name }}">{{ $post->category->name }}</span>
        <h3 class="ct-title mt-2 fw-semibold fs-5">{{ $post->title }}</h3>
    </div>
</a>