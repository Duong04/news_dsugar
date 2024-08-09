<a href="{{ route('post.detail', ['post' => $post->slug]) }}" class="h-sm-300 d-flex overflow-hidden position-relative rounded-4 h-600 shadow-img post-hv">
    <img class="w-100 h-100 object-fit-cover rounded-4" src="{{ $post->image }}" alt="">
    <div class="ct-text text-white">
        <span class="ct-topic fs-7 hover-fillip-item position-relative" data-text="{{ $post->subcategory->name }}">{{ $post->subcategory->name }}</span>
        <h3 class="ct-title mt-2 fw-semibold">{{ $post->title }}</h3>
    </div>
</a>