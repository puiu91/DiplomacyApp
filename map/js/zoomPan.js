function panZoomSVG(svg) {

    /**
     * Gets the viewport in the svg container
     * @type {object}
     */
    var viewport = svg.children[0]

    /**
     * Stores the state of panning
     * @type {Boolean}
     */
    var panningActive = false

    /**
     * Stores the original mouse event coordinates of where panning was requested
     * @type {Object}
     */
    var panningOrigin = {}

    /**
     * Coefficient that dictates the velocity of panning - a higher number slows panning
     * @type {int}
     */
    var panningSmoother = 60

    /**
     * add event listeners with useCapture true so that  all events of the 
     * specified type will be dispatched to the registered listener before 
     * being dispatched to any EventTarget beneath it in the DOM tree
     */
    svg.addEventListener('mousewheel', handleMouseWheel)
    svg.addEventListener('mousedown', handleMouseWheelDown)
    svg.addEventListener('mousemove', handleMouseMovement)
    svg.addEventListener('mouseup', handleMouseWheelUp)

    /**
     * Updates the viewport with provided CTM matrix
     * @param  {[type]} element [description]
     * @param  {[type]} CTM     [description]
     * @return {[type]}         [description]
     */
    function updateViewport(element, CTM) {
        // create matrix transformation string
        var matrixTransformation = 'matrix(' + CTM.a + ',' + CTM.b + ',' + CTM.c + ',' + CTM.d + ',' + CTM.e + ',' + CTM.f + ')';
        // update viewport
        viewport.setAttribute('transform', matrixTransformation);   
    }

    /**
     * Extracts mouse coordinates from event trigger
     * 
     * @param  {object} event mouse event
     * @return {object}       x,y coordinates of mouse event
     */
    function getMouseCoordinate(e) {
        var p = {}

        p.xCoord = e.clientX
        p.yCoord = e.clientY

        return p
    }

    function handleMouseWheel(event) {

        // determine direction of mouse wheel scroll
        var delta = (event.wheelDeltaY > 0) ? 1 : 0

        // mouse event coordinates
        var x = event.clientX
        var y = event.clientY

        // create mouse wheel change factor
        var wheelDelta = event.wheelDelta / 3600

        // create zoom factor
        var zoomFactor = 1 + wheelDelta
        
        /**
         * Moves the viewport towards the mouse position, then scales the viewport based on a 
         * computed zoom factor before finally moving the viewport back into the opposite 
         * direction of the mouse position.
         *
         * SVGMatrix translate - Post-multiplies a translation transformation on the current matrix and 
         *                       returns the resulting matrix.
         */
        var updatedCTM = viewport.getCTM().scale(zoomFactor)

        // update the viewport
        updateViewport(viewport, updatedCTM)
    }

    function handleMouseWheelDown(event) {

        // run only if middle mouse button is clicked
        if (event.button !== 0)
            return

        // ensure click event occured on the svg container
        if (event.target.id === svg.id) {

            // add the pointer cursor
            svg.setAttribute('style','cursor: pointer');

            panningActive = true

            // store the mouse event coordinates where panning began
            panningOrigin.x = event.clientX / panningSmoother
            panningOrigin.y = event.clientY / panningSmoother
        };
    }

    function handleMouseMovement(event) {

        var mouseX = event.clientX / panningSmoother
        var mouseY = event.clientY / panningSmoother

        // only handle the mouse movement when panning is enabled
        if ( ! panningActive) return

            debug(mouseX)

        // translate svg viewport using the panning event origin subtracted from the current mouse event position
        var adjustedCTM = viewport.getCTM().translate(mouseX - panningOrigin.x, mouseY - panningOrigin.y)

        // update the viewport
        updateViewport(viewport, adjustedCTM)
    }

    function handleMouseWheelUp(event) {

        // remove pointer cursor
        svg.setAttribute('style','cursor: default');

        panningActive = false

        debug(event)
    }
}