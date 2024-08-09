<div class="featured-post-item border border-2 rounded-4 d-flex flex-column flex-md-row align-items-center p-3 py-5">
    <div>
        <div class="d-flex flex-column justify-content-between">
            <span class="b-red fs-7 text-danger position-relative hover-fillip-item" data-text="{{ $post->subcategory->name }}">{{ $post->subcategory->name }}</span>
            <a href="{{ route('post.detail', ['post' => $post->slug]) }}" class="text-link text-line-3 text-black text-decoration-none fw-semibold fs-5">{{ $post->title }}</a>
            <div class="d-flex g-10 align-items-center mt-4">
                <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="{{ $post->user->avatar }}" alt="">
                <div class="d-flex flex-column">
                    <span class="fs-7 fw-semibold author hover-fillip-item" data-text="Nguyễn Thành Đường">{{ $post->user->user_name }}</span>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="box-cricle-img overflow-hidden rounded-circle">
            <img class="w-100 object-fit-cover" src="{{ $post->image }}" alt="">
        </div>
    </div>
</div>