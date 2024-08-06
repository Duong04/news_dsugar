const axios_ins = axios.create({
    baseURL: "http://127.0.0.1:8000/api/v1",
});


const btnComment = document.querySelector('#btn-comment');
const inpComment = document.querySelector('#comment');
const isAuthenticated = window.auth.isAuthenticated;
const currentUser = window.auth.user;
const user_id = currentUser.id;
const inpComments = document.querySelectorAll('.comment');

const layoutComment = ({ content, user, created_at, id, comment_replys }, post_id) => {
    return (`
        <div class="mt-3 d-flex g-20 align-items-start w-100">
            <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="${user.avatar}" alt="">
            <div class="d-flex flex-column w-100">
                <span class="fs-7 fw-semibold author hover-fillip-item" data-text="${user.user_name}">${user.user_name}</span>
                <span class="fs-7">${content}</span>
                <span class="fs-7 text-midgray">${created_at}</span>
                <div class="d-flex g-10 align-items-center">
                    <div><span class="badge text-bg-danger">10</span> <i class="fa-regular fa-thumbs-up cursor-pointer"></i></div>
                    <div data-bs-toggle="collapse" href="#collapseModal-${id}" role="button" aria-expanded="false" aria-controls="collapseModal-${id}"><i class="fa-regular fa-comment cursor-pointer"></i></div>
                </div>
                <div class="collapse py-2" id="collapseModal-${id}">
                    <div class="position-relative form-comment">
                        <textarea data-comment="${id}" class="form-control comment comment-reply" name="comment" placeholder="Chia sẻ ý kiến của bạn tại đây"></textarea>
                        <div class="emoji-button">
                            <i class="fa-regular fa-face-smile"></i>
                            <div class="emoji-picker">
                                <emoji-picker></emoji-picker>
                            </div>
                        </div>
                        ${isAuthenticated ? `
                        <button disabled class="btn-comment-2 btn-reply"><i class="fa-regular fa-paper-plane"></i></button>
                        ` : `
                        <button disabled><i class="fa-regular fa-paper-plane"></i></button>
                        `}
                    </div>
                </div>
                ${comment_replys.map(reply => `
                <div class="mt-3 d-flex g-20 align-items-start">
                    <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="${reply.user.avatar}" alt="">
                    <div class="d-flex flex-column">
                        <span class="fs-7 fw-semibold author hover-fillip-item" data-text="${reply.user.user_name}">${reply.user.user_name}</span>
                        <span class="fs-7">${reply.content}</span>
                        <span class="fs-7 text-midgray">${reply.created_at}</span>
                        <div class="d-flex g-10 align-items-center">
                            <div><span class="badge text-bg-danger">1</span> <i class="fa-regular fa-thumbs-up cursor-pointer"></i></div>
                        </div>
                    </div>
                </div>`).join('')}
            </div>
        </div>
    `);
}


const getAll = async () => {
    try {
        const post_id = inpComment.getAttribute('data-post');
        const comments = document.querySelector('#comments');
        const response = await axios_ins.get(`/comments/posts/${post_id}`);
        const listComment = response.data;
        console.log(listComment);
        const htmls = listComment.data.map((comment) =>{
            return layoutComment(comment, post_id);
        }).join('');
        comments.innerHTML = htmls;
        document.querySelectorAll('.emoji-picker').forEach(item => {
            item.addEventListener('emoji-click', function (event) {
                const textarea = item.closest('.form-comment').querySelector('.comment');
                if (textarea) {
                    textarea.value += event.detail.unicode;
                    item.style.display = 'none';
                }
            });
        });
    } catch (error) {
        console.error(error);
    }
}

getAll();
document.addEventListener('DOMContentLoaded', function () {
    const inpComments = document.querySelectorAll('.comment');
    const btnComments = document.querySelectorAll('.btn-comment-2');
    const btnReply = document.querySelectorAll('.btn-reply');
    const inpCommentReply = document.querySelectorAll('.comment-reply');

    inpComments.forEach((item, i) => {
        item.oninput = async (e) => {
            if (e.target.value !== '') {
                btnComments[i].removeAttribute('disabled');
            }else {
                btnComments[i].setAttribute('disabled', 'disabled');
            }
        }
    });

    btnReply.forEach((item, i) => {
        item.onclick = async () => {
            const content = inpCommentReply[i].value;
            const comment_id = inpCommentReply[i].getAttribute('data-comment');
            try {
                const response = await axios_ins.post('/comment-replys', {content, comment_id, user_id});
                inpCommentReply[i].value = '';
                await getAll();
            } catch (error) {
                console.error(error);
            }
        }
    });
})

btnComment.onclick = async (e) => {
    try {
        const content = inpComment.value;
        const post_id = inpComment.getAttribute('data-post');
        const response = await axios_ins.post('/comments', {content, user_id, post_id});
        inpComment.value = '';
        await getAll();
    } catch (error) {
        console.error(error);
    }
}

export default getAll;