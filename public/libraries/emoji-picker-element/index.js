import Picker from './picker.js'
import Database from './database.js'
export { Picker, Database }


document.addEventListener('DOMContentLoaded', function () {
    const emojiButton = document.querySelector('.emoji-button');
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
});