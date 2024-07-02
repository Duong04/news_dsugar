<aside class="col-12 col-lg-4 mt-5 mt-lg-0">
    <div class="p-0 ps-lg-5">
        <div class="bg-pale-white py-4 px-2 rounded-4">
            <h5 class="border-bottom border-dark-subtle text-center fw-semibold pb-2 mb-3">Tìm kiếm</h5>
            <x-search.search />
        </div>
        <div class="mt-5 bg-pale-white py-4 px-2 rounded-4">
            <h5 class="border-bottom border-dark-subtle text-center fw-semibold pb-2">Bài viết gần đây</h5>
            <div class="d-flex flex-column g-20 mt-3">
                <x-posts.post-medium-item />
                <x-posts.post-medium-item />
                <x-posts.post-medium-item />
                <x-posts.post-medium-item />
            </div>
        </div>
        <div class="mt-5 bg-pale-white py-4 px-2 rounded-4">
            <h5 class="border-bottom border-dark-subtle text-center fw-semibold pb-2">Tìm tôi ở đâu 👀</h5>
            <x-social.social justifyContent="center" />
        </div>
        <div class="mt-5 bg-pale-white py-4 px-2 rounded-4">
            <h5 class="border-bottom border-dark-subtle text-center fw-semibold pb-2">Trưng bày</h5>
            <div class="gallery mt-2">
                <div class="gallery-img">
                    <img class="w-100 h-100 object-fit-cover rounded-3" src="images/gallery/demo_image-6-300x300.jpg" alt="">
                </div>
                <div class="gallery-img">
                    <img class="w-100 h-100 object-fit-cover rounded-3" src="images/gallery/demo_image-26-150x150.jpg" alt="">
                </div>
                <div class="gallery-img">
                    <img class="w-100 h-100 object-fit-cover rounded-3" src="images/gallery/demo_image-38-1-150x150.jpg" alt="">
                </div>
                <div class="gallery-img">
                    <img class="w-100 h-100 object-fit-cover rounded-3" src="images/gallery/post-column-01-4-150x150.jpg" alt="">
                </div>
                <div class="gallery-img">
                    <img class="w-100 h-100 object-fit-cover rounded-3" src="images/gallery/post-column-01-6-150x150.jpg" alt="">
                </div>
                <div class="gallery-img">
                    <img class="w-100 h-100 object-fit-cover rounded-3" src="images/gallery/post-column-01-13-150x150.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</aside>