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
            <circle id="moveMe" cx="800" cy="282" r="80" fill="green" transform="translate(0,0)" />
        </g>

    </svg>

    <script type="text/javascript">
        function debug(obj) { console.dir(obj) }

        var svg = document.getElementsByTagName('svg')[0]
        var viewport = document.getElementById('viewport')

        // debug(viewport)

        var w = svg.clientWidth
        var h = svg.clientHeight

        var circle = document.getElementById('moveMe')
        circle.addEventListener('mousedown', startDrag)








        function startDrag(event) {

            // store object clicked on
            obj = event.target

            // initiate dragging
            obj.addEventListener('mousemove', drag)
            
            // end dragging
            obj.addEventListener('mouseup', stopDrag)

            // mouse coordinates where drag event began 
            originDrag = {}
            originDrag.x = event.clientX
            originDrag.y = event.clientY

            debug(originDrag.x + ' : ' + originDrag.y)
        }

        function stopDrag(event) {
            debug('Drag End')
            event.target.removeEventListener('mousemove', drag, false)
        }


        function drag(event2) {

            var obj = event2.target

            // mouse coordinates where drag event finished
            finalDrag = {}
            finalDrag.x = event2.clientX
            finalDrag.y = event2.clientY

            var newObjectPosition = {}
            newObjectPosition.x = finalDrag.x - originDrag.x
            newObjectPosition.y = finalDrag.y - originDrag.y

            // originDrag
            // finalDrag
            // 
            


            // store an object of SVGTransformList prototype
            var SVGTransformList = obj.transform.baseVal;

            // apply transformation for the first time
            if (SVGTransformList.numberOfItems === 0) {
                // var tx = "translate(" + (newObjectPosition.x) + "," + (newObjectPosition.y) + ")";
                // event2.target.setAttribute("transform", "translate(0,0)");
            }



            // transformation has previously been applied
            if (SVGTransformList.numberOfItems > 0) {

                // read the SVG DOM transformation object
                var SVGTransform = SVGTransformList.getItem(0);

                // determine if the transformation was of type translate
                if (SVGTransform.type == SVGTransform.SVG_TRANSFORM_TRANSLATE) {
                    
                    // extract the matrix (x,y) position
                    var previousTx = SVGTransform.matrix.e
                    var previousTy = SVGTransform.matrix.f

                    debug('(1) Previous Tx and Ty: ' + previousTx + ' | ' + previousTy)
                    debug('(2) Drag Origin X and Y: ' + originDrag.x + ' | ' + originDrag.y)
                    debug('(3) Drag Final X and Y: ' + finalDrag.x + ' | ' + finalDrag.y)
                    debug('(4) Dif. in Drag Origin vs. Final: ' + newObjectPosition.x + ' | ' + newObjectPosition.y)

                    // calculate mouse offset
                    nMouseOffsetX = originDrag.x - previousTx
                    nMouseOffsetY = originDrag.y - previousTy

                    debug('Mouse Offset Calculation:')
                    debug(nMouseOffsetX + ' ' + nMouseOffsetY)

                    correctX = originDrag.x - nMouseOffsetX
                    correctY = originDrag.y - nMouseOffsetY

                    debug('Working Coodrindates: ' + correctX + ' | ' + correctY)


                    debug('transofmring')
                    // set new translation using previous translation (x,y) coordinates
                    this.transform.baseVal.getItem(0).setTranslate(previousTx + newObjectPosition.x, previousTy + newObjectPosition.y);
                }
            }


            
            // get current CTM of object when object was clicked
            // objCTM = obj.getCTM()
            // debug(objCTM)
        }
















        // var mouseX = event.clientX
        // var mouseY = event.clientY
        // debug(event.clientX + ' : ' + event.clientY)         
    </script>

    <!-- Javascript -->
    <script src="js/zoomPan.js"></script>
    <script type="text/javascript">
        panZoomSVG(svg)
    </script>

</body>
</html>
