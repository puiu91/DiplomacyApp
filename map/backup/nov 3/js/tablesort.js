function debug(obj)
{
    console.dir(obj)
}

function extractTableHeader(table) 
{

}

/**
 * Stores an HTML table as an array
 * 
 * @param  {HTMLTableElement} table
 * @return {array}
 */
function extractTableBody(table)
{
    var rows = table.tBodies[0].rows
    var tableBody = []

    // iterate through table body rows
    for (var i = 0; i < rows.length; i++) {
        // create an array index position for each row
        tableBody[i] = []
        
        // iterate through cells
        for (var j = 0; j < rows[i].cells.length; j++) {
            tableBody[i][j] = rows[i].cells[j].innerText
        }
    }

    return tableBody
}


document.addEventListener('DOMContentLoaded', function() {

    var table = document.getElementById('dataTable')
    var TheadRows = table.tHead.rows[0].cells
    var TheadRowsData = []

    // loop through thead row cells and store to array
    for (var i = 0; i < TheadRows.length; i++) {
        TheadRowsData[i] = TheadRows[i].innerText
    }; 

    // store table body
    var tableBody = extractTableBody(table)

    /**
     * alphabetical sorting
     */
    var columns = []

    for (var i = 0; i < tableBody.length; i++) {
        columns[i] = tableBody[i][1]
    };

    // debug(tableBody)
    // debug(columns)
    // debug(columns.sort())

    // map the column array in order to add the row index that each cell belongs to
    var mapped = columns.map(function(el, i) {
        return {
            rowId: i, 
            value: el.toLowerCase() 
        };
    })

    // organize the column array by sorting on the cell value
    mapped.sort(function(a, b) { 
        return (a.value > b.value) || (a.value === b.value) - 1 
    })

    // output columns with sorted order
    for (var i = 0; i < mapped.length; i++) {
        debug(tableBody[mapped[i].rowId])
    };

    // debug(mapped)


    // create new tbody object
    // add rows, cell data, and inner text
    
    // replace tbody node in table with newly created tbody object
    
    
    
    

    var tableBodyHTML = table.tBodies[0]

    debug(tableBodyHTML)
    debug(table)
    
    // remove table rows
    var new_tbody = document.createElement('tbody')

    table.tBodies[0].children

    // tableBodyHTML.insertRow()
    // tableBodyHTML.insertRow()
    // tableBodyHTML.insertRow()


    /** loop through rows stored in array and add them to new tbody node*/
    for (var i = 0; i < mapped.length; i++) {

        // loop through columns
        // for (var j = 0; j < tableBody[mapped[i].rowId]; i++) {
        //     debug(1)
        // }
        

    // insert row in new tbody at row index 0
    var newRow = new_tbody.insertRow(0);
    // insert cell in new row at cell index 0
    var newCell = newRow.insertCell(0);
    // append a text node to the cell
    var newText = document.createTextNode(mapped[0]);
        newCell.appendChild(newText);

        debug(tableBody[mapped[i].rowId])

    };


    // insert row in new tbody at row index 0
    var newRow = new_tbody.insertRow(0);
    // insert cell in new row at cell index 0
    var newCell = newRow.insertCell(0);
    // append a text node to the cell
    var newText = document.createTextNode('New top row');
        newCell.appendChild(newText);

    debug(new_tbody)

    debug(newText)


    function populateNewRows(dataSource, targetElement) {

    }




    // debug(new_tbody)
    // populateNewRows(new_tbody);
    // old_tbody.parentNode.replaceChild(new_tbody, old_tbody)

    // replace existing tbody with new tbody
    // table.replaceChild(new_tbody, table.tBodies[0])











    button = document.getElementById('clear-table')
    button.addEventListener('click', function(event) {

        // remove table rows
        tableBodyHTML.remove()

        /**
         * function to re-create columns
         */
        
        // debug(tableBodyHTML)
        // tableBodyHTML.remove()

        // remove table
        // alert('clicked on me')

        // delete all rows

    })




}, false);



function addRow(tableID) {
  // Get a reference to the table
  var tableRef = document.getElementById(tableID);

  // Insert a row in the table at row index 0
  var newRow   = tableRef.insertRow(0);

  // Insert a cell in the row at index 0
  var newCell  = newRow.insertCell(0);

  // Append a text node to the cell
  var newText  = document.createTextNode('New top row');
  newCell.appendChild(newText);
}