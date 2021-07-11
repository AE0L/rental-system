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

// category

const search_category = el('search-category')

// desktop filters
const prop_filter = el('prop-filter')
const vehicle_filter = el('vehicle-filter')
const furniture_filter = el('furniture-filter')
const w_cloth_filter = el('w-cloth-filter')
const m_cloth_filter = el('m-cloth-filter')
const appliances_filter = el('app-filter')

const show = (e) => {
    e.style.display = 'grid'
}
const hide = (e) => {
    e.style.display = 'none'
}

const hide_all_filter = () => {
    [prop_filter, vehicle_filter, furniture_filter, w_cloth_filter, m_cloth_filter, appliances_filter].forEach(hide)
}

// desktop filter change
search_category.onchange = (e) => {
    let value = e.target.value

    hide_all_filter()

    switch (value) {
        case 'any':
            hide_all_filter()
            break
        case 'property':
            show(prop_filter)
            break
        case 'vehicle':
            show(vehicle_filter)
            break
        case 'furniture':
            show(furniture_filter)
            break
        case 'm-cloth':
            show(m_cloth_filter)
            break
        case 'w-cloth':
            show(w_cloth_filter)
            break
        case 'appliances':
            show(appliances_filter)
            break
        case 'others':
            // TODO
            break
    }
}

// mobile filter change

// mobile filters
const mobile_prop_filter = el('mobile-prop-filter')
const mobile_vehicle_filter = el('mobile-vehicle-filter')
const mobile_furniture_filter = el('mobile-furniture-filter')
const mobile_w_cloth_filter = el('mobile-w-cloth-filter')
const mobile_m_cloth_filter = el('mobile-m-cloth-filter')
const mobile_appliances_filter = el('mobile-app-filter')

const mobile_category_cont = el('mobile-category-cont')
const mobile_categories = Array.from(mobile_category_cont.children)

const hide_all_mobile_filter = () => {
    [mobile_prop_filter, mobile_vehicle_filter, mobile_furniture_filter, mobile_w_cloth_filter, mobile_m_cloth_filter, mobile_appliances_filter].forEach(hide)
}

mobile_categories.forEach(c => {
    c.onclick = () => {
        hide_all_mobile_filter()
        toggle_display(mobile_category_modal, false)
        category_modal_shown = false

        switch (c.innerText) {
            case 'Any':
                hide_all_mobile_filter()
                break
            case 'Property/Estate':
                show(mobile_prop_filter)
                break
            case 'Vehicle':
                show(mobile_vehicle_filter)
                break
            case 'Furniture':
                show(mobile_furniture_filter)
                break
            case 'TV & Home Appliances':
                show(mobile_appliances_filter)
                break
            case "Women's Wear":
                show(mobile_w_cloth_filter)
                break
            case "Men's Wear":
                show(mobile_m_cloth_filter)
                break
            case 'Others':
                // TODO
                break
        }
    }
})

function change_category(category) {
    search_category.value = category
    search_category.dispatchEvent(new Event('change'));
}