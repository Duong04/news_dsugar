import axios_ins from "/js/axios.js";

const btnComment = document.querySelector('#btn-comment');
const inpComment = document.querySelector('#comment');
const isAuthenticated = window.auth.isAuthenticated;
const currentUser = window.auth.user;
const user_id = isAuthenticated ? currentUser.id : null;
const inpComments = document.querySelectorAll('.comment');
const layoutComment = ({ content, user, created_at, id, comment_replys }, post_id) => {
    return (`
        <div class="mt-3 d-flex g-20 align-items-start w-100">
            <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="${user.avatar}" alt="">
            <div class="d-flex flex-column w-100">
                <span class="fs-7 fw-semibold author hover-fillip-item" data-text="${user.user_name}">${user.user_name}</span>
                <div class="d-flex justify-content-between position-relative">
                    <span class="fs-7">${content}</span>
                    ${user.id == user_id  ? `
                    <div class="dropdown three-dot">
                        <div class="text-center" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:50px;">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a data-id="${id}" data-type="comment" class="dropdown-item btn-delete">Xóa</a></li>
                            <li><a class="dropdown-item" href="#">Chỉnh sửa</a></li>
                        </ul>    
                    </div> 
                    `: ``}
                </div>
                <span class="fs-7 text-midgray">${formatCommentTime(created_at)}</span>
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
                    <div class="d-flex flex-column position-relative w-100">
                        <span class="fs-7 fw-semibold author hover-fillip-item" data-text="${reply.user.user_name}">${reply.user.user_name}</span>
                        <span class="fs-7">${reply.content}</span>
                        ${user.id == user_id  ? `
                            <div class="dropdown three-dot">
                                <div class="text-center" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:50px;">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </div>
                                <ul class="dropdown-menu">
                                    <li><a data-id="${reply.id}" data-type="comment-reply" class="dropdown-item btn-delete">Xóa</a></li>
                                    <li><a class="dropdown-item" href="#">Chỉnh sửa</a></li>
                                </ul>    
                            </div> 
                        `: ``}
                        <span class="fs-7 text-midgray">${formatCommentTime(reply.created_at)}</span>
                        <div class="d-flex g-10 align-items-center">
                            <div><span class="badge text-bg-danger">1</span> <i class="fa-regular fa-thumbs-up cursor-pointer"></i></div>
                        </div>
                    </div>
                </div>`).join('')}
            </div>
        </div>
    `);
}

const formatCommentTime = (timestamp) => {
    const commentTime = new Date(timestamp);
    const currentTime = new Date();
    
    const diffInMinutes = Math.floor((currentTime - commentTime) / 1000 / 60);
    const diffInHours = Math.floor(diffInMinutes / 60);
    const diffInDays = Math.floor(diffInHours / 24);
    
    if (diffInMinutes === 0) {
        return 'Vừa xong';
    } else if (diffInMinutes < 60) {
        return `${diffInMinutes} phút trước`;
    } else if (diffInHours < 24) {
        return `${diffInHours} giờ trước`;
    } else if (diffInDays < 30) {
        return `${diffInDays} ngày trước`;
    } else {
        return `${commentTime.getDate()} tháng ${commentTime.getMonth() + 1}, ${commentTime.getFullYear()}`;
    }
};

const getAll = async () => {
    try {
        const post_id = inpComment.getAttribute('data-post');
        const comments = document.querySelector('#comments');
        const response = await axios_ins.get(`/comments/posts/${post_id}`);
        const listComment = response.data;
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

        addEventListeners();
    } catch (error) {
        console.error(error);
    }
}

const addEventListeners = () => {
    const inpComments = document.querySelectorAll('.comment');
    const btnComments = document.querySelectorAll('.btn-comment-2');
    const btnReply = document.querySelectorAll('.btn-reply');
    const inpCommentReply = document.querySelectorAll('.comment-reply');
    const btnDeletes = document.querySelectorAll('.btn-delete');

    inpComments.forEach((item, i) => {
        item.oninput = async (e) => {
            if (e.target.value !== '') {
                btnComments[i].removeAttribute('disabled');
            } else {
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

    btnDeletes.forEach(item => {
        item.onclick = async (e) => {
            const id = item.getAttribute('data-id');
            const btnType = item.getAttribute('data-type');
            const linkUrl = btnType == 'comment' ? 'comments' : 'comment-replys'; 
            swal({
                title: "Bạn có chắc?",
                text: "Bạn có chắc muốn xóa không!",
                type: "warning",
                buttons: {
                  confirm: {
                    text: "Có, xóa nó!",
                    className: "btn btn-success",
                  },
                  cancel: {
                    'text': 'Thoát',
                    visible: true,
                    className: "btn btn-danger",
                  },
                },
            }).then(async (Delete) => {
                if (Delete) {
                    const response = await axios_ins.delete(`/${linkUrl}/${id}`);
                    await getAll();
                }
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    getAll();
});

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