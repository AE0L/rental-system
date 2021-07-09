// Mobile
const body = el('body');

const filter_btn = el('filter')
const category_btn = el('category')
const sort_btn = el('sort')

const mobile_filter_modal = el('mobile-filter-modal')
const mobile_category_modal = el('mobile-category-modal')
const mobile_sort_modal = el('mobile-sort-modal')

const filter_close = el('mobile-filter-close')
const category_close = el('mobile-category-close')
const sort_close = el('mobile-sort-close')

let filter_modal_shown = false;
let category_modal_shown = false;
let sort_modal_shown = false;

function toggle_display(el, open) {
    if (open) {
        el.style.display = 'flex';
        body.style.overflow = 'hidden'
    } else {
        el.style.display = 'none';
        body.style.overflow = 'initial'
    }
}

filter_btn.onclick = () => {
    toggle_display(mobile_filter_modal, true)
    filter_modal_shown = true
}

category_btn.onclick = () => {
    toggle_display(mobile_category_modal, true)
    category_modal_shown = true
}

sort_btn.onclick = () => {
    toggle_display(mobile_sort_modal, true)
    sort_modal_shown = true
}

filter_close.onclick = () => {
    toggle_display(mobile_filter_modal, false)
    filter_modal_shown = false
}

category_close.onclick = () => {
    toggle_display(mobile_category_modal, false)
    category_modal_shown = false
}

sort_close.onclick = () => {
    toggle_display(mobile_sort_modal, false)
    sort_modal_shown = false
}