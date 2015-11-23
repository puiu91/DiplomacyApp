var module = function() {

    // configuration, change things here
    var config = {
        CSS: {
            classes:{
                hover:'hover',
                active:'current',
                jsEnabled:'js'
            },
            ids: {
                container:'maincontainer'
            } 
        },
        id: {

        },
        table: {
            unitOrders: document.getElementById('unitOrdersTable')
        },
        timeout: 2000,
        userID: 'chrisheilmann'
    };

    // start of main code 
    function init() {
  
    };

    // make init and config a public method
    return {
        init: init,
        config: config
    };

}();



/**
 * Using an object literal pattern
 * @type {Object}
 */
var config = {

    myFunction = function() {

    },

    tables: {
        unitOrders: document.getElementById('unitOrdersTableO')
    }

}();