/**
 * Extracts a column from a table at a specified column
 * 
 * @param  {string} tableName The table name
 * @param  {int}    colId     The column to extract from
 * @return {array}            An array of strings
 */
function tableExtractColumn(tableName, colId) {

    var tbody = document.getElementById(tableName).getElementsByTagName('tbody')[0].children
    var columnData = []

    // extract column and return array
    for (var i = tbody.length; i--;)
        columnData[i] = tbody[i].cells[colId].textContent

    return columnData
}