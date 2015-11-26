'use strict'

/**
 * Selectors
 */
var createUnitButton = document.querySelectorAll('[data-button = createUnit]')[0]
var createNavyButton = document.querySelectorAll('[data-button = createNavy]')[0]

/**
 * Methods
 */
function createUnit (event) {

    debug(this)

    /**
     * Determine if there are less units than supply centers
     * @return {[boolean]}
     */    
    function unitCapReached() {

        // count how many orders exist (equivalently how many units exist)
        var manageUnitButtons = document.querySelectorAll('[ui-role = manageUnit]')

        debug(manageUnitButtons)

        
        // count how many supply centers player has
        var currentSupplyDepots = tableExtractColumn('supplyDepotsTable', 0)

        if (currentSupplyDepots.length > manageUnitButtons.length)
            return false
        else
            return true
    }

    // exit if unit cap is reached
    if (unitCapReached()) {
        alert('Unit cap reached')
        return
    };

    // selector
    var tbody = document.getElementById('orderTable').getElementsByTagName('tbody')[0]

    // get unit type
    var type = this.textContent

    // append row to end of table
    var row = tbody.insertRow(tbody.rows.length)

    // create button element
    var newButton = document.createElement('button')
    newButton.className = 'pure-button'
    newButton.setAttribute('ui-role', 'manageUnit')
    newButton.setAttribute('gameDataIndex', '0')

    // create item
    var iTag = document.createElement('i')
    iTag.className = 'fa fa-wrench'

    // append item to newly created button and add click event listener
    newButton.appendChild(iTag)

    var cell0 = row.insertCell(0)
        cell0.setAttribute('gameDataIndex', '')
        cell0.appendChild(document.createTextNode(type))

    var cell1 = row.insertCell(1).setAttribute('gameDataIndex', 'a')
    var cell2 = row.insertCell(2).setAttribute('gameDataIndex', 'a')
    var cell3 = row.insertCell(3).setAttribute('gameDataIndex', 'a')

    // insert cells
    // row.insertCell(0).appendChild(document.createTextNode(type))
    // row.insertCell(1)
    // row.insertCell(2)
    // row.insertCell(3)

    // insert cell with new button appended
    row.insertCell(4).appendChild(newButton)

    // create new SVG element for given unit
}

/**
 * Events
 */
createUnitButton.addEventListener('click', createUnit, false)
createNavyButton.addEventListener('click', createUnit, false)