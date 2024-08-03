<a href="{{ route('post.detail', ['post' => $post->slug]) }}" class="h-sm-300 d-flex overflow-hidden position-relative rounded-4 shadow-img post-hv">
    <img class="w-100 h-100 object-fit-cover rounded-4" src="{{ $post->image }}" alt="">
    <div class="ct-text text-white" style="bottom: 15px">
        <span class="ct-topic fs-7 position-relative hover-fillip-item" data-text="{{ $post->subcategory->name }}">{{ $post->subcategory->name }}</span>
        <h3 class="ct-title mt-2 fw-semibold fs-5">{{ $post->title }}</h3>
    </div>
</a>