<div class="position-relative">
    <form class="d-flex search-custom" action="{{ route('search') }}" role="search">
        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        <input autocomplete="off" type="text" name="q" id="inp-search" placeholder="Tìm kiếm..."
            aria-label="Search">
    </form>
    <div class="position-absolute search-result p-2">
        <ul class="nav g-10" id="search-results">
            <li>
                <div class="text-center fs-7 p-2">Nhập từ khóa bạn muốn tìm 👀</div>
            </li>
        </ul>
    </div>
</div>