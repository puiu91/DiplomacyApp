/**
 * Handler for when object is clicked
 * @param  {object} event prototype MouseEvent
 * @return {undefined}
 */ 
function dragSVGElements(event) {

    var evt = event

    /**
     * SVG container
     * @type {object} prototype of SVGSVGElement
     */
    var svg = document.getElementsByTagName('svg')[0]

    /**
     * Element in the svg container that had a mousedown event occur (and presumably being dragged)
     * Travel up the DOM path until a <g> group of items is found
     * @type {object}
     */
    /* cant get recurisve to work 
    var getGroup = function (evt) {
        if (event.target.nodeName !== 'g') {
            return getGroup(evt.target)
        }

        debug('outside function')

        element = event.target
    }
    */
   
    if (event.target.nodeName === 'path')
        element = event.target.parentNode
    else if (event.target.nodeName = 'g')
        element = event.target
    else
        return;

    // initialize handler
    mouseDown(event)
    debug(element)

    /**
     * Determines if an object contains the SVGTransform object in its SVGTransformList object, otherwise it creates
     * and appends a new SVGTransform object
     * 
     * @param  {object} obj SVG element being clicked on
     * @return {boolean}
     */
    function containsSVGTransform(obj) {
        // SVGTransformList of the element that has been clicked on
        var tfmList = obj.transform.baseVal;

        if (tfmList.numberOfItems === 0) 
            return false

        return true
    }

    /**
     * Applies a transformation to an element
     * 
     * @param {object} el an SVG element
     * @param {object} t  transformation
     */
    function setTransform(el, t) {
        return el.transform.baseVal.initialize( t )
    }

    function mouseDown() {

        /**
         * move selected element to the top of the svg canvas
         *
         * note - this is necessary becaause otherwise when an element is clicked that overlaps
         *        another element, both elements will fire off mousedown handlers and there will 
         *        be no way to remove the listeners on mouseup
         */
        element.parentNode.appendChild(element)

        // element is selected for the first time
        if ( ! containsSVGTransform( element )) {

            // access the svg root element and create a new SVGTransform object 
            var translate = svg.createSVGTransform()

            // set default parameters
            translate.setTranslate(0,0)              

            // apply transformation
            setTransform(element, translate)
        }

        /**
         * track cursor position on the <svg> element when the <g> object is clicked on
         * 
         * note - if we had instead placed the mousemove listener on the <g> object being clicked on, 
         *        then the mouse cursor position will move faster than the <g> object's position can
         *        be updated, essentially stopping the dragging but not actually removing the listener
         */
        svg.addEventListener('mousemove', mouseMove)

        // end dragging handler
        event.target.addEventListener('mouseup', mouseUp) 

        // store mouse coordinates where drag event began
        var dragOrigin = {
            x : event.clientX,
            y : event.clientY
        }

        // extract current transformation matrix of viewport
        var viewportCTM = viewport.getCTM()

        // extract (sx, sy, tx, ty) from the matrix
        var viewportMatrix = {
            tx : viewportCTM.e,
            ty : viewportCTM.f,
            sx : viewportCTM.a,
            sy : viewportCTM.d
        }

        // get current transformation matrix of <g> element
        var elementCTM = element.getCTM()

        // current (x,y) on the <g> element - equivalent to (tx,ty) in the matrix
        var activeTranslate = {
            x : elementCTM.e,
            y : elementCTM.f
        }

        // calculate the offset as the difference between the mouse click (x,y)
        // and the existing transform(x,y) on the object
        var mouseOffset = {
            x : (dragOrigin.x - activeTranslate.x),
            y : (dragOrigin.y - activeTranslate.y)
        }

        // debugging
        // debug('Mouse Down Start (x,y): ' + dragOrigin.x + ' | ' + dragOrigin.y)
        // debug('DragX & DragY: ' + activeTranslate.x + ' | ' + activeTranslate.y)
        // debug('Mouse Offset: ' + mouseOffset.x + ' | ' + mouseOffset.y)

        function mouseMove(event) {

            // store mouse coordinates where drag event ends
            var dragEnd = {
                x: event.clientX,
                y: event.clientY
            }

            // debugging
            // debug('Mouse Down End (x,y): ' + dragEnd.x + ' | ' + dragEnd.y)

            // calculate the final coordinates of the element and adjust for viewport transformation and scale
            dragEnd.x = (dragEnd.x - mouseOffset.x - viewportMatrix.tx) * (1 / viewportMatrix.sx)
            dragEnd.y = (dragEnd.y - mouseOffset.y - viewportMatrix.ty) * (1 / viewportMatrix.sy)
            
            // debugging
            // debug('Final Position: ' + dragEnd.x + ' | ' + dragEnd.y)

            // set new translation (through SVG DOM)
            element.transform.baseVal.getItem(0).setTranslate(dragEnd.x, dragEnd.y)
        }

        function mouseUp(event) {
            // remove the mousemove listener from the svg container
            svg.removeEventListener('mousemove', mouseMove)
        }          
    }
}