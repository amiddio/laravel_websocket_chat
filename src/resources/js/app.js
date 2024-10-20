import './bootstrap';

document.querySelector('#send-button').addEventListener(
    'click',
    function () {
        const name = document.querySelector('#name-input');
        const message = document.querySelector('#message-area');
        window.axios.post('/channel', {
            name: name.value,
            message: message.value
        });
        message.value = '';
    }
);

Echo.channel('general').listen('.new-message', (e) => {
    const div = document.createElement('div');
    div.innerHTML = '<b>' + e.name + '</b> (' + e.dt + ')<br/>' + e.message;

    document.querySelector('#channel-general-content').prepend(div);
});
