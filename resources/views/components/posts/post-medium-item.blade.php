<a href="{{ route('post.detail', ['post' => $post->slug]) }}" class="post-medium d-flex g-10 text-decoration-none">
    <div class="post-medium-img rounded-4 overflow-hidden">
        <img class="w-100 h-100 object-fit-cover rounded-4" src="{{ $post->image }}" alt="">
    </div>
    <div class="post-medium-text">
        <h6 class="text-black">{{ $post->title }}</h6>
        <span class="text-midgray fs-7">{{ $formatTime($post->created_at) }}</span>
    </div>
</a>