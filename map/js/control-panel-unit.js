// add click listeners on all modify unit order buttons
var createUnitButton = document.querySelectorAll('[data-button = createUnit]')

// method
function createUnit () {
    // get unit type
    var type = this.textContent

    debug(this)
    debug(type)

    // append item to table 
    var tbody = document.getElementById('orderTable').getElementsByTagName('tbody')[0];
    var row = tbody.insertRow(tbody.rows.length)

    // insert cells
    row.insertCell(0).appendChild(document.createTextNode(type))
    row.insertCell(1)
    row.insertCell(2)

    // create button element
    var newButton = document.createElement('button')
    newButton.className = 'pure-button'

    // todo - add click event listener to new button
    newButton.onclick = createUnit

    // create item
    var iTag = document.createElement('i')
    iTag.className = 'fa fa-cog'

    // append item to newly created button
    newButton.appendChild(iTag)


    // insert cell with new button appended
    row.insertCell(3).appendChild(newButton)

    debug(newButton)


    // todo - create dialog
    
    // todo - limit options of deployment only to owned supply depots
}

createUnitButton[0].addEventListener('click', createUnit, false);



// http://toddmotto.com/attaching-event-handlers-to-dynamically-created-javascript-elements/
// http://toddmotto.com/avoiding-anonymous-javascript-functions/