import '@simonwep/pickr/dist/themes/monolith.min.css';
import Pickr from '@simonwep/pickr';

// Simple example, see optional options for more configuration.

const pickrObj = {
    el: '.pikr',
    theme: 'monolith', // or 'monolith', or 'nano'
    lockOpacity: true,
    defaultRepresentation: 'HEX',
    comparison: false,
    position: 'top-end',

    swatches: [
        'rgb(244, 67, 54)',
        'rgb(233, 30, 99)',
        'rgb(156, 39, 176)',
        'rgb(103, 58, 183)',
        'rgb(63, 81, 181)',
        'rgb(33, 150, 243)',
        'rgb(3, 169, 244)',
        'rgb(0, 188, 212)',
        'rgb(0, 150, 136)',
        'rgb(76, 175, 80)',
        'rgb(139, 195, 74)',
        'rgb(205, 220, 57)',
        'rgb(255, 235, 59)',
        'rgb(255, 193, 7)'
    ],

    components: {

        // Main components
        preview: true,
        hue: true,

        // Input / output Options
        interaction: {
            hex: false,
            input: true,
            clear: true
        }
    }
}

const pickr = Pickr.create(pickrObj);

pickr.on('init', ()=>{
    pickr.setColor(document.querySelector('#color-hex').value)
    
})

pickr.on('change', (color, source) => {
    if(source == "slider" || source == "input") {
        document.querySelector('#color-hex').value = color.toHEXA().toString()
    }
})

pickr.on('swatchselect', (color, source) => {
    document.querySelector('#color-hex').value = color.toHEXA().toString()
})

document.querySelector('#color-hex').addEventListener('click', (e) => {
    pickr.show()
})

document.querySelector('#color-hex').addEventListener('keyup', (e) => {
    pickr.setColor(e.target.value)
    //pickr.applyColor()
})

document.querySelector('#color-hex').addEventListener('blur', (e) => {
    e.target.value = pickr.getColor().toHEXA().toString()
})


/* Pickr Page */

if(document.querySelector('.palette-page')){

    let pikrObj = {
        default: '#42445A',
        theme: 'monolith',
        lockOpacity: true,
        defaultRepresentation: 'HEX',
        comparison: false,
        position: 'top-end',
        swatches: null,
    
        components: {
    
            // Main components
            preview: true,
            hue: true,
    
            // Input / output Options
            interaction: {
                hex: false,
                input: true,
                clear: true
            }
        }
    }

    const pickr1 = new Pickr({
        el: '.c-1',
        ...pikrObj
    })

    const pickr2 = new Pickr({
        el: '.c-2',
        ...pikrObj
    })

    const pickr3 = new Pickr({
        el: '.c-3',
        ...pikrObj
    })

    const pickr4 = new Pickr({
        el: '.c-4',
        ...pikrObj
    })

    const pickr5 = new Pickr({
        el: '.c-5',
        ...pikrObj
    })

    let fields = [
        {
            pickr: pickr1,
            class: "#color1",
            big: ".color-big-1",
        },
        {
            pickr: pickr2,
            class: "#color2",
            big: ".color-big-2",
        },
        {
            pickr: pickr3,
            class: "#color3",
            big: ".color-big-3",
        },
        {
            pickr: pickr4,
            class: "#color4",
            big: ".color-big-4",
        },
        {
            pickr: pickr5,
            class: "#color5",
            big: ".color-big-5",
        },
    ]

    fields.forEach((field) => {

        field.pickr.on('change', (color, source) => {
            if(source == "slider" || source == "input") {
                document.querySelector(field.class).value = color.toHEXA().toString()
                document.querySelector(field.big).style.backgroundColor = color.toHEXA().toString()
            }
            if(source == "swatch") {
                document.querySelector(field.big).style.backgroundColor = color.toHEXA().toString()
            }
        })
        
        document.querySelector(field.class).addEventListener('click', (e) => {
            field.pickr.show()
        })
        
        document.querySelector(field.class).addEventListener('keyup', (e) => {
            field.pickr.setColor(e.target.value)
        })

    })

}