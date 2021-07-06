const el = (e) => document.getElementById(e)


const ham_menu_btn = el('ham-menu-btn')
const ham_menu_cont = el('ham-menu-cont')
const ham_menu_close = el('ham-menu-close-btn')
const back_dim = el('back-dim')

const open_menu = (e) => {
    ham_menu_cont.style.width = `${screen.width}px`
}

const close_menu = (e) => {
    ham_menu_cont.style.width = '0';
}

ham_menu_btn.onclick = open_menu
ham_menu_close.onclick = close_menu
back_dim.onclick = close_menu