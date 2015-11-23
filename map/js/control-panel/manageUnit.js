var manageUnit = (function() {

    'use strict'

    // references to DOM elements
    var modals = {
      manageUnit: document.getElementById('manageUnitModal')
    }

    var unitButtons = {
      manage: document.querySelectorAll('[ui-role = manageUnit]'),
      update: document.querySelectorAll('[ui-role = updateUnit]')[0],
      delete: document.querySelectorAll('[ui-role = deleteUnit]')[0]      
    }

    var tables = {
      unitOrders: document.getElementById('orderTable')
    }

    /**
     * Store UI components
     */
    var manageUnitButtons = document.querySelectorAll('[ui-role = manageUnit]')
    var manageUnitModal   = document.getElementById('manageUnitModal')
    var updateUnitButton  = document.querySelectorAll('[ui-role = updateUnit]')[0]
    var deleteUnitButton  = document.querySelectorAll('[ui-role = deleteUnit]')[0]

    /**
     * Store select dropdowns
     */
    var updateUnitOrder       = document.querySelectorAll('[unit-update = unitOrder]')[0]
    var updateCurrentProvince = document.querySelectorAll('[unit-update = unitProvince]')[0]
    var updateTargetProvince  = document.querySelectorAll('[unit-update = unitTargetProvince]')[0]

    /**
     * Store parent row of unit being managed
     */
    var rowIndex
    var row

    /**
     * Handles extraction of unit information to populate the manage unit modal
     */
    function manageUnit(e, rowIndex) {

        // extract cells in the row that the clicked button belongs to
        row = tables.unitOrders.rows[rowIndex].cells

        var unitInfo = 
        {
            gameDataIndex: 
            {
               type           : row[0].attributes['gameDataIndex'].textContent,
               order          : row[1].attributes['gameDataIndex'].textContent,
               province       : row[2].attributes['gameDataIndex'].textContent,
               targetProvince : row[3].attributes['gameDataIndex'].textContent
            },     
            values: 
            {
                type           : row[0].textContent,
                order          : row[1].textContent,
                province       : row[2].textContent,
                targetProvince : row[3].textContent
            }
        }

        // todo | block out rest of window to prevent clicking  
        // todo | checking if unit type allows a change in province

        // display modal
        modals.manageUnit.classList.add('visible')

        // set select fields with unit info attributes as selected elements
        updateUnitOrder.options.selectedIndex       = unitInfo.gameDataIndex.order
        updateCurrentProvince.options.selectedIndex = unitInfo.gameDataIndex.province
        updateTargetProvince.options.selectedIndex  = unitInfo.gameDataIndex.targetProvince
    }

    /**
     * Update unit and its respective row in the Unit and Orders table
     */
    function updateUnit () {

        // get unit updates
        var unitUpdates = {

            gameDataIndex: {
                order: updateUnitOrder.options.selectedIndex,
                province: updateCurrentProvince.options.selectedIndex,
                targetProvince: updateTargetProvince.options.selectedIndex
            },     

            values: {
                order: updateUnitOrder.options[updateUnitOrder.selectedIndex].value,
                province: updateCurrentProvince.options[updateCurrentProvince.selectedIndex].value,
                targetProvince: updateTargetProvince.options[updateTargetProvince.selectedIndex].value
            }

        }

        // update original row with new unit values 
        row[1].textContent = unitUpdates.values.order
        row[2].textContent = unitUpdates.values.province
        row[3].textContent = unitUpdates.values.targetProvince

        // update original row with new game data index
        row[1].attributes['gameDataIndex'].textContent = unitUpdates.gameDataIndex.order
        row[2].attributes['gameDataIndex'].textContent = unitUpdates.gameDataIndex.province
        row[3].attributes['gameDataIndex'].textContent = unitUpdates.gameDataIndex.targetProvince

        // hide modal
        modals.manageUnit.classList.remove('visible')
    }    

    /**
    * Deletes unit specified by user (represented as a table row)
    */
    function deleteUnit() {

        // remove selected row from unit table
        document.getElementById('orderTable').deleteRow(rowIndex)

        /**
         * Inform the server that the specified unit has been deleted
         * @return {[type]} [description]
         */
        function communicateServerDeleteUnit() {}
        
        // hide modal
        manageUnitModal.classList.remove('visible')   
    }

    /**
     * Searches a up the node tree of an element until it finds the requested tag
     * @param  {obj} el     Element to start search from
     * @param  {string} tag The tag to search for
     * @return {obj}        HTMLElement once found
     */
    function searchParentNodeForElement(el, tag) {
      while (el.parentNode) {
        el = el.parentNode

        if (el.tagName === tag) {
          return el;
        }
      }
      return null;
    }

    /**
     * Assign a click event handler on the parent element (units table). Use event delegation
     * to detect when a button is clicked. Compare the click event target to the element that 
     * should react.
     * 
     * This avoids looping through all buttons that exist in the table rows in order to assign
     * them event listener click handlers. 
     */
    tables.unitOrders.addEventListener('click', function() {

      var nodeName = event.target.nodeName
      
      // determine element clicked and extract row index
      if (nodeName === 'BUTTON' || nodeName === 'I') {
        rowIndex = searchParentNodeForElement(event.target, 'TR').rowIndex
        
        // send information to manage unit handler
        manageUnit(event, rowIndex)        
      };
    }, false)

    // add event listener to update unit button
    unitButtons.update.addEventListener('click', function() {
        updateUnit()
    }, false)

    // add event listener to the delete unit button
    unitButtons.delete.addEventListener('click', function() {
        deleteUnit()
    }, false)

})();