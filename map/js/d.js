function navigateSVG() {


    

}













/**
 * Writes a JavaScript object to console for inspection
 * 
 * @param  {[object Object]} obj
 * @return {[void]}    
 */
function debug(obj)
{
    console.dir(obj)

}
/**
 * Stores an HTML table as an array of the form:
 * 
 * [tr:0]
 *     [td:0]
 *     [td:1]
 * [tr:1]
 *     [td:0]
 *     [td:1]
 * 
 * @param  {[object Object]} table an HTMLTableElement
 * @return {[Array]}
 */
function extractTableBody(table) 
{
    var rows = table.tBodies[0].rows
    var tbodyData = []

    // iterate through [tr] elements (rows)
    for (var tr = rows.length; tr--;) {
        
        // create an array index position for each row
        tbodyData[tr] = []

        // iterate through [td] elements (cells) and store their value
        for (var td = rows[tr].cells.length; td--;) {
            tbodyData[tr][td] = rows[tr].cells[td].innerText
        }
    }

    return tbodyData
}

/**
 * Populates a table body element with rows and their respective cells based on the
 * provided row order index
 *
 * rename to sortingIndexLookup
 * 
 * @param  {[Array]} data              the row and cell data in array format
 * @param  {[Array]} rowOrder          the desired order position of the rows from the provided data
 * @param  {[object Object]} tableBody an HTMLTableSectionElement (and is optional)
 * @return {[object Object]} tableBody an HTMLTableSectionElement 
 */
function populateTableBody(data, rowOrder, tableBody)
{  
    if ( ! data || ! rowOrder) 
        throw new Error('Required parameter missing')
    
    if ( ! (data instanceof Array) || ! (rowOrder instanceof Array))
        throw new Error('Type of array must be supplied for: data and rowOrder')
    
    // create tbody element if one is not provided
    var tableBody = tableBody || document.createElement('tbody')

    // create new rows with the provided data using the row order provided
    var rowCtr = rowOrder.length;
    for (i = 0; i < rowCtr; ++i) {
        
        var newRow = tableBody.insertRow(i);

        // populate the table by iterating though each rows' cells by using the row order index provided
        var colCtr = data[rowOrder[i]].length;
        for (j = 0; j < colCtr; ++j) {
            var cellData = data[rowOrder[i]][j]

            // create cell and append a text node with the respective cell data
            newRow.insertCell(j).appendChild(document.createTextNode(cellData));            
        }
    }

    return tableBody
}

// var SimpleTable = (function() {
// 
// })();


// https://developer.mozilla.org/en-US/docs/Web/JavaScript/Introduction_to_Object-Oriented_JavaScript
// http://www.htmlgoodies.com/html5/tutorials/create-an-object-oriented-javascript-class-constructor.html

var SimpleTable = new SimpleTable('dataTable')

SimpleTable.wow = {
    test: 'test here',
    another: 'variable plus plus'
}

debug(SimpleTable)

document.addEventListener('DOMContentLoaded', function() {

}, false);






document.addEventListener('DOMContentLoaded', function() {

    // store table data
    var table = document.getElementById('dataTable')
    var theadColumns = table.tHead.rows[0].cells
    var tableBodyData = extractTableBody(table)

    /**
     * Create on click event listeners for table header elements which will 
     * be used for sorting the table when clicked
     */
    for (i = theadColumns.length; i--;) {
        theadColumns[i].addEventListener('click', function(event) {

            /**
             * apply styles to show that a column is actively being sorted
             * and also alternate between ascending and descending when clicked 
             */
            switch (this.className) {
                case 'sorting':
                    this.className = 'sorting-asc'
                    break;
                case 'sorting-asc':
                    this.className = 'sorting-desc'
                    break; 
                case 'sorting-desc':
                    this.className = 'sorting-asc'
                    break;                     
                default: 
                    this.className = 'sorting'
            }

            // store index of column clicked
            var clickedColumnId = this.cellIndex

            // reset unclicked columns to the default style
            for (colId = theadColumns.length; colId--;) {
                if (colId !== clickedColumnId) {
                    theadColumns[colId].className = 'sorting'
                }
            }

            // create object to store cells within the column being sorted
            var clickedColumnData = []
            for (rowId = tableBodyData.length; rowId--;) {
                clickedColumnData[rowId] = {
                    rowId: rowId,
                    value: tableBodyData[rowId][clickedColumnId]
                }
            }

            // re-organize column by sorting the cell values based on the desired sort method (i.e., asc or desc)
            var activeSortMethod = this.className
            clickedColumnData.sort(function(a, b) { 
                var a = a.value.toLowerCase()
                var b = b.value.toLowerCase()

                if (activeSortMethod === 'sorting-asc') {
                    if (a > b) return 1
                    if (a < b) return -1
                    return 0
                }

                if (activeSortMethod === 'sorting-desc') {
                    if (a > b) return -1
                    if (a < b) return 1
                    return 0
                }
            })

            // extract the row index of the sorted column
            var sortedRowIndex = []
            for (i = clickedColumnData.length; i--;) {
                sortedRowIndex[i] = clickedColumnData[i].rowId
            }

            // create new tbody that has been sorted based on the column clicked
            var newTableBody = populateTableBody(tableBodyData, sortedRowIndex)

            // replace existing tbody
            table.replaceChild(newTableBody, table.tBodies[0])
        });
    };





















    button = document.getElementById('clear-table')
    button.addEventListener('click', function(event) {

    })

}, false);