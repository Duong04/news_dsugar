<div class="post-list-view d-flex flex-column flex-sm-row justify-content-between">
    <div class="col-12 col-sm-4 post-list-img rounded-top-sm-4 rounded-4 overflow-hidden">
        <img class="h-100 w-100 object-fit-cover" src="{{ $post->image }}" alt="">
    </div>
    <div class="col-12 col-sm-8 p-0 ps-sm-3 post-list-text">
        <div class="rounded-bottom-sm-4 h-100 rounded-4 border border-2 px-3 pt-5 px-md-4 pb-4 p-lg-5 d-flex flex-column g-10 justify-content-center">
            <span class="b-red position-relative hover-fillip-item" data-text="{{ $post->subcategory->name }}"></span>
            <a href="{{ route('post.detail', ['post' => $post->slug]) }}" class="text-black fw-semibold text-decoration-none fs-5 post-title">{{ $post->title }}</a>
            <div class="w-100 d-flex flex-column flex-xl-row align-items-xl-center justify-content-between g-5">
                <div class="d-flex g-10 align-items-center">
                        <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="{{ $post->user->avatar }}" alt="">
                        <div class="d-flex flex-column">
                            <span class="fs-7 fw-semibold author hover-fillip-item" data-text="{{ $post->user->user_name }}">{{ $post->user->user_name }}</span>
                            <span class="fs-7 text-midgray">{{ $formatTime($post->created_at) }}</span>
                        </div>
                </div>
                <div class="d-flex g-10 social-share">
                    <a class="text-black" href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a class="text-black" href=""><i class="fa-brands fa-twitter"></i></a>
                    <a class="text-black" href=""><i class="fa-brands fa-linkedin-in"></i></a>
                    <a class="text-black" href=""><i class="fa-solid fa-link"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>