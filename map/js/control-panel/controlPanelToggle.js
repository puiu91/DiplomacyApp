(function (window, document, undefined) {

    'use strict'

    /**
     * Selectors
     */
    var toggleControlPanel = document.querySelectorAll('[ui-role = toggleControlPanel]')

    /**
     * Methods
     */
    function controlPanelToggle (event) {
        var controlPanel = this.parentNode.parentNode.parentNode
        controlPanel.classList.toggle('minimize')
    }

    /**
     * Events / APIs / Inits
     */
    toggleControlPanel[0].addEventListener('click', controlPanelToggle, false)

})(window, document);