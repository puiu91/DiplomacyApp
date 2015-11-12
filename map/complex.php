<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>D</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>

<body>
    <svg id="svgCanvas" version="1.1" baseProfile="full" xmlns="http://www.w3.org/2000/svg">
        <g id="viewport">
            <circle id="moveMe" cx="800" cy="282" r="80" fill="green"  />
        </g>
    </svg>

    <script type="text/javascript">

        function debug(obj) { console.dir(obj) }

        var svg = document.getElementsByTagName('svg')[0]
        var viewport = document.getElementById('viewport')

        var circle = document.getElementById('moveMe')
            circle.addEventListener('mousedown', mouseDown)

            debug(viewport)





        var draggingElement = null
        var nMouseOffsetX = 0
        var nMouseOffsetY = 0        

        var viewportCTM = viewport.getCTM()
        var viewportTx = 0
        var viewportTy = 0
        var viewportSx = 0
        var viewportSy = 0



        /**
         * Extracts the transformations currently applied to an element and returns an array whose 
         * indexes refer to the transformation object
         * 
         * @return {[type]} [description]
         */
        function extractsTransformations() {}

        /**
         * Need to decide that the position of SVGTransformObjects are as follows
         * baseVal : SVGTransformList -> 0 : SVGTransform -> type 2 = SVG_TRANSFORM_TRANSLATE
         * baseVal : SVGTransformList -> 1 : SVGTransform -> type 3 = SVG_TRANSFORM_SCALE
         * baseVal : SVGTransformList -> 2 : SVGTransform -> type 4 = SVG_TRANSFORM_ROTATE
         */

        /**
         * Determines if an object contains the SVGTransform object in its SVGTransformList object, otherwise it creates
         * and appends a new SVGTransform object
         * 
         * @param  {object} obj svg element being clicked on
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
         * http://www.w3.org/TR/SVG11/coords.html#InterfaceSVGTransform
         * 
         * @param  {[type]} element [description]
         * @return {[type]}         [description]
         */
        function transformIndexLocations(element) {
            // store index for each transform
            transformIndex = {}

            // store the transformation list
            var tfmList = element.transform.baseVal

            for (var i = 0; i < tfmList.length; i++) {

                var transform = tfmList.getItem(i)

                if (transform.type === transform.SVG_TRANSFORM_MATRIX) 
                    transformIndex.matrix = true

                if (transform.type === transform.SVG_TRANSFORM_TRANSLATE) 
                    transformIndex.translate = true

                if (transform.type === transform.SVG_TRANSFORM_SCALE) 
                    transformIndex.scale = true
                
                if (transform.type === transform.SVG_TRANSFORM_ROTATE) 
                    transformIndex.rotate = true  

                if (transform.type === transform.SVG_TRANSFORM_SKEWX) 
                    transformIndex.skewX = true
                
                if (transform.type === transform.SVG_TRANSFORM_SKEWY) 
                    transformIndex.skewY = true

            }

            return transformIndex
        }        

        /**
         * Applies a transformation to an element
         * 
         * @param {[type]} el element
         * @param {[type]} t  transformation
         */
        function setTransform(el, t) {
            return el.transform.baseVal.initialize( t )
        }






        function mouseDown(event) {

            // store the reference to the object being dragged
            draggingElement = event.target

            // store a reference to object clicked on (and presumably being dragged)
            var obj = event.target
   
            // an element that is selected for the first time will not contain an SVGTransform object
            if ( ! containsSVGTransform( obj )) {

                // access the svg root element and create a new SVGTransform object with default translation parameters
                var translate = svg.createSVGTransform()
                translate.setTranslate(0, 0)              

                // apply transformation
                setTransform(obj, translate)
            }

            /**
             * track cursor position on the <svg> element when the <g> object is clicked on
             * 
             * note - if we had instead placed the mousemove listener on the <g> object being clicked on, 
             *        then the mouse cursor position will move faster than the <g> object's position can
             *        be updated, essentially stopping the dragging but not actually removing the listener
             */
            svg.addEventListener('mousemove', mouseMove)

            // end dragging
            event.target.addEventListener('mouseup', mouseUp) 

            // store mouse coordinates where drag event began
            var originDrag = {
                x : event.clientX,
                y : event.clientY
            }

            // create object to store viewport CTM (current transformation matrix)
            viewportMatrix = {
                tx : 0, 
                ty : 0,
                sx : 0,
                sy : 0
            }

            // store an object of SVGTransformList prototype
            var viewportTransform = viewport.transform.baseVal;

            if (containsSVGTransform ( viewport )) {

                // extract all transform currently applied on the object
                var transformsApplied = transformIndexLocations(viewport)

                for (var i in transformsApplied) {

                    if (transformsApplied.matrix) {

                        // read an object of SVGTransform prototype from the SVG DOM 
                        var SVGTransform = viewportTransform.getItem(0)

                        // extract (sx, sy, tx, ty) from the matrix
                        viewportMatrix = {
                            tx : SVGTransform.matrix.e,
                            ty : SVGTransform.matrix.f,
                            sx : SVGTransform.matrix.a,
                            sy : SVGTransform.matrix.d
                        }
                    }
                }
            }

            debug(viewport)

            // transformation has been applied on the viewport
            if (viewportTransform.numberOfItems > 0) {
 
                // read an object of SVGTransform prototype from the SVG DOM 
                var SVGTransform = viewportTransform.getItem(0);


            }

            debug('VIEWPORT MATRIX')

            var test = transformIndexLocations(obj)
            debug('EXTRACTION')
            debug(test)

             // extract the viewport tx, ty, sx, and sy from the current transformation matrix (CTM)
            // debug('VIEWPORT TX TY: ' + viewportMatrix.tx + ' | ' + viewportMatrix.ty)


            // debug(this)
            debug('CTM IS')
            // get current transformation matrix on <g> object
            var CTM = this.getCTM()
            debug(CTM)

            // current transform (x, y) on the object
            var dragX = CTM.e
            var dragY = CTM.f

            /**
             * calculate the offset as the difference between the mouse click (x,y)
             * and the existing transform (x,y) on the object
             *
             * (i.e.,) if the mouse(x,y) = (60,60) and the existing transform(x,y) = (10,20)
             *         then the offset(x,y) = (60-10,60-20) -> (50,40)
             *
             *         this offset then needs to be subtracted from the final mouse drag (x,y)
             */
            nMouseOffsetX = originDrag.x - dragX;
            nMouseOffsetY = originDrag.y - dragY;

            debug('Mouse Down Position: ' + originDrag.x + ' | ' + originDrag.y)
            debug('DragX and DragY: ' + dragX + ' | ' + dragY)
            debug('nMouseOffset: ' + nMouseOffsetX + ' | ' + nMouseOffsetY)
        }

        function mouseMove(evt) {

            var pa = {}
            pa.x = evt.clientX
            pa.y = evt.clientY

            debug('Mouse Moved to: ' + pa.x + ' | ' + pa.y)

            debug(viewportMatrix)

            debug(typeof viewportMatrix.tx)
            debug(typeof pa.x)

            debug(draggingElement.transform.baseVal)




            if (viewportMatrix.tx || viewportMatrix.ty || viewportMatrix.sx || viewportMatrix.sy) {
                pa.x = (pa.x - nMouseOffsetX - viewportMatrix.tx) * ( 1 / viewportMatrix.sx )
                pa.y = (pa.y - nMouseOffsetY - viewportMatrix.ty) * ( 1 / viewportMatrix.sy )


            // set new translation
            draggingElement.transform.baseVal.getItem(0).setTranslate(pa.x, pa.y);

            } else {
                pa.x = (pa.x - nMouseOffsetX)
                pa.y = (pa.y - nMouseOffsetY) 

                            // set new translation
            draggingElement.transform.baseVal.getItem(0).setTranslate(pa.x, pa.y);
            }

            debug('Final: ' + pa.x + ' | ' + pa.y)

            debug(evt.target.getCTM())

            // draggingElement.setAttribute("transform", "translate(" + pa.x + "," + pa.y + ")");



        }

        function mouseUp(event) {
            nMouseOffsetX = 0
            nMouseOffsetY = 0

            // remove the mousemove listener from the svg container
            svg.removeEventListener('mousemove', mouseMove)
        }












    </script>

    <!-- Javascript -->
    <script src="js/zoomPan.js"></script>
    <script type="text/javascript">
        panZoomSVG(svg)
    </script>

</body>
</html>