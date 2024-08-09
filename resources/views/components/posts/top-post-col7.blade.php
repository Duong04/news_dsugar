<div class="col-12 col-lg-7 p-lg-3">
    <a href="{{ route('post.detail', ['post' => $post->slug]) }}" class="post-large-item d-flex justify-content-end position-relative">
        <div class="post-large-img rounded-4 my-lg-0">
            <img class="w-100 h-100 object-fit-cover rounded-4" src="{{ $post->image }}" alt="">
        </div>
        <div class="ct-text text-white my-lg-3 my-lg-0">
             <span class="ct-topic fs-7 position-relative hover-fillip-item" data-text="{{ $post->subcategory->name }}">{{ $post->subcategory->name }}</span>
             <h3 class="ct-title mt-2 fw-semibold">{{ $post->title }}</h3>
         </div>
    </a>
 </div>