(function (window, document, undefined) {

    'use strict';

    /**
     * Selectors
     */
    var closeModalButtons = document.querySelectorAll('[ui-role = closeModal]')

    /**
     * Methods
     */
    function closeModal() {
        
        /**
         * Parent modal
         * @type {HTMLDivElement}
         */
        var modal = this.parentNode.parentNode;

        /**
         * Hide modal
         */
        modal.classList.remove('visible');
    }

    /**
     * Events / APIs / Inits
     */
    for (var i = closeModalButtons.length; i--;) {
        (function(i) {
            closeModalButtons[i].addEventListener('click', closeModal, false);
        })(i);
    };

})(window, document);