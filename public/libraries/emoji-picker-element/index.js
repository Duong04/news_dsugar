import Picker from './picker.js'
import Database from './database.js'
export { Picker, Database }


const emojiButton = document.querySelector('#emoji-button');
const emojiPickerContainer = document.getElementById('emoji-picker');
const picker = document.querySelector('emoji-picker');
const textarea = document.getElementById('comment');

emojiButton.addEventListener('click', function () {
    const displayStatus = emojiPickerContainer.style.display;
    emojiPickerContainer.style.display = displayStatus === 'none' || displayStatus === '' ? 'block' : 'none';
});

picker.addEventListener('emoji-click', event => {
    textarea.value += event.detail.unicode;
    emojiPickerContainer.style.display = 'none';
});

document.addEventListener('click', function(event) {
    if (!emojiPickerContainer.contains(event.target) && !emojiButton.contains(event.target)) {
        emojiPickerContainer.style.display = 'none';
    }
});

document.addEventListener('DOMContentLoaded', function () {

    const emojiButtons = document.querySelectorAll('.emoji-button');

    // Xóa sự kiện cũ trước khi thêm sự kiện mới
    emojiButtons.forEach(item => {
        item.removeEventListener('click', handleEmojiButtonClick); // Xóa sự kiện nếu có
        item.addEventListener('click', handleEmojiButtonClick);
    });

    function handleEmojiButtonClick(event) {
        const emojiButton = event.currentTarget;
        const emojiPickerContainer = emojiButton.querySelector('.emoji-picker');
        const displayStatus = emojiPickerContainer.style.display;
        emojiPickerContainer.style.display = displayStatus === 'none' || displayStatus === '' ? 'block' : 'none';
        
        // Ẩn emoji-picker khi nhấp ra ngoài
        if (!emojiPickerContainer.contains(event.target) && !emojiButton.contains(event.target)) {
            emojiPickerContainer.style.display = 'none';
        }
    }

    document.addEventListener('click', function (event) {
        const emojiButton = event.target.closest('.emoji-button');
        if (!emojiButton) {
            emojiButtons.forEach(item => {
                const emojiPickerContainer = item.querySelector('.emoji-picker');
                emojiPickerContainer.style.display = 'none';
            });
        }
    });

    // Sự kiện emoji-click chỉ được xử lý sau khi emoji-picker đã được tạo
    document.addEventListener('emoji-click', event => {
        const emojiPicker = event.target.closest('.emoji-picker');
        if (emojiPicker) {
            const textarea = emojiPicker.closest('.form-comment').querySelector('.comment');
            textarea.value += event.detail.unicode;
            emojiPicker.style.display = 'none';
        }
    });
});