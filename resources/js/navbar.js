const btn = document.querySelector('.mobile-menu-button');
const menu = document.querySelector('.mobile-menu')
if (btn) {
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden')
    })
}
