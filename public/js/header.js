import axios_ins from "/js/axios.js";

const layoutSearchs = ({slug, image, title, subcategory, category}) => {
    return (`
        <li>
            <a href="/bai-viet/${slug}" class="text-decoration-none d-flex g-10">
                <img class="rounded-3 object-fit-cover" width="60px" height="60px" src="${image}" alt="">
                <div>
                    <span class="b-red fs-7 position-relative hover-fillip-item" data-text=" ${category.name} - ${subcategory.name}"> ${category.name} - ${subcategory.name}</span>
                    <h6 class="ct-title text-black text-midgray fs-6">
                        ${title}
                    </h6>
                </div>
            </a>
        </li>
    `);
}

const inpSearch = document.querySelector('#inp-search');
const searchResult = document.querySelector('.search-result');
const searchResults = document.querySelector('#search-results');

inpSearch.onfocus = () => {
    searchResult.classList.add('active');
}

inpSearch.onblur = () => {
    setTimeout(() => {
        searchResult.classList.remove('active');
    }, 150);
}

const debounce = (func, delay) => {
    let timeout;
    return function(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
    };
};

const handleSearch = async (e) => {
    const response = await axios_ins.get(`/posts?limit=5&q=${e.target.value}`);
    const data = response.data.data;
    const htmls = data.map(item => layoutSearchs(item)).join('');
    searchResults.innerHTML = htmls ? htmls : '<div class="text-center fs-7 p-2">Không tìm thấy bài viết 👀</div>';
};

inpSearch.oninput = debounce(handleSearch, 200);

const headerMain = document.querySelector('#header');
const goToTop = document.querySelector('.go-to-top');
window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
        headerMain.classList.add('header-fixed');
        goToTop.style.display = 'flex';
        headerMain.style.top = '0';
    } else if (window.scrollY < 200) {
        headerMain.classList.remove('header-fixed');
        goToTop.style.display = 'none';
        headerMain.style.top = '-100px';
    }
});

// -----------------------------
document.addEventListener("DOMContentLoaded", () => {
    const dot = document.querySelector(".mouse-trail");
  
    document.addEventListener("mousemove", (e) => {
      dot.style.transform = `translate(${e.clientX}px, ${e.clientY}px) scale(1)`;
    });
});
