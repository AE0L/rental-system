const prop_type = el('prop-type')

// Appliances 
const min_floor_label = el('prop-min-floor-label')
const max_floor_label = el('prop-max-floor-label')
const min_lot_label = el('prop-min-lot-label')
const max_lot_label = el('prop-max-lot-label')
const bed_label = el('prop-bedroom-label')
const bath_label = el('prop-bathroom-label')
const park_label = el('prop-park-label')
const pet_label = el('prop-pet-label')

const min_floor = el('prop-min-floor-area')
const max_floor = el('prop-max-floor-area')
const min_lot = el('prop-min-lot-area')
const max_lot = el('prop-max-lot-area')
const bed = el('prop-bedrooms')
const bath = el('prop-bathrooms')
const park = el('prop-parking')
const pet = el('prop-allow-pet')

function hide(elements) {
    elements.forEach(e => {
        if (e.id === 'prop-allow-pet') {
            return
        }

        e.style.display = 'none'
        if (e.tagName === 'INPUT' || e.tagName === 'SELECT') {
            e.required = false
        }
    })
}

function show(elements) {
    elements.forEach(e => {
        if (e.id === 'prop-allow-pet') {
            return
        }

        e.style.display = 'unset'
        if (e.tagName === 'INPUT' || e.tagName === 'SELECT') {
            e.required = true
        }
    })
}

hide([min_floor_label, max_floor_label, min_lot_label, max_lot_label, bed_label, bath_label, park_label, pet_label, min_floor, max_floor, min_lot, max_lot, bed, bath, park, pet])

prop_type.onchange = (e) => {
    let type = e.target.value;

    show([
        min_floor,
        max_floor,
        min_lot,
        max_lot,
        bed,
        bath,
        park,
        pet,
        min_floor_label,
        max_floor_label,
        min_lot_label,
        max_lot_label,
        bed_label,
        bath_label,
        park_label,
        pet_label
    ])

    if (type === 'Apartment & Condo') {
        hide([
            min_lot_label,
            max_lot_label,
            min_lot,
            max_lot
        ])
    } else if (type === 'Lot') {
        hide([
            bed,
            bath,
            park,
            pet,
            bed_label,
            bath_label,
            park_label,
            pet_label
        ])
    } else if (type === 'Commercial') {
        hide([pet, pet_label])
    }
}


// Furnitures
const furn_type = el('furn-type')
const furn_cond = el('furn-cond')


// Feature Containers
const category = el('category')

const temp_feat = el('temp-features-cont')
const all_feat = Array.from(document.getElementsByClassName('features-cont'))
const app_feat = el('app-features')
const furniture_feat = el('furniture-features')
const property_feat = el('property-features')
const vehicle_feat = el('vehicle-features')
const m_clothing_feat = el('m-clothing-features')
const w_clothing_feat = el('w-clothing-features')
const other_feat = el('other-features')

const toggle_inputs = (e, req) => {
    let inputs = Array.from(e.getElementsByTagName('input'))

    Array.from(e.getElementsByTagName('SELECT')).forEach(select => inputs.push(select))

    inputs.forEach(input => {
        if (input.id === 'prop-allow-pet') {
            return
        }

        input.required = req
        input.disabled = !req;
    })
}

const show_feat = (e) => {
    e.style.display = 'grid '
}
const hide_feat = (e) => {
    e.style.display = 'none '
}

category.onchange = (e) => {
    let value = e.target.value

    hide_feat(temp_feat)

    all_feat.forEach(feat => {
        hide_feat(feat)
        toggle_inputs(feat, false);
    })

    switch (value) {
        case 'property':
            show_feat(property_feat)
            toggle_inputs(property_feat, true)
            break
        case 'vehicle':
            show_feat(vehicle_feat)
            toggle_inputs(vehicle_feat, true)
            break
        case 'furniture':
            show_feat(furniture_feat)
            toggle_inputs(furniture_feat, true)
            break
        case 'm-cloth':
            show_feat(m_clothing_feat)
            toggle_inputs(m_clothing_feat, true)
            break
        case 'w-cloth':
            show_feat(w_clothing_feat)
            toggle_inputs(w_clothing_feat, true)
            break
        case 'appliances':
            show_feat(app_feat)
            toggle_inputs(app_feat, true)
            break
        case 'other':
            show_feat(other_feat)
            toggle_inputs(other_feat, true)
            break;
    }
}

// Clear
const clear_btn = el('clear')

clear_btn.onclick = () => {
    show_feat(temp_feat);

    all_feat.forEach(feat => {
        hide_feat(feat)
        toggle_inputs(feat, false);
    })
}