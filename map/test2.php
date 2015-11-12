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

        var circle = document.getElementById('moveMe')
            circle.addEventListener('mousedown', mouseDown)







        var draggingElement = null
        var nMouseOffsetX = 0
        var nMouseOffsetY = 0        

            var viewportCTM = viewport.getCTM()
            var viewportTx 
            var viewportTy 

        function mouseDown(event) {

            // store the reference to the object being dragged
            draggingElement = event.target

            // initiate dragging by adding a mousemove listener on the svg container
            svg.addEventListener('mousemove', mouseMove)

            // end dragging
            event.target.addEventListener('mouseup', mouseUp)            

            var p = {}
            p.x = event.clientX
            p.y = event.clientY

            var CTM = this.getCTM()

            /**
             * get viewport tx ty
             */
             viewportCTM = viewport.getCTM()
             viewportTx = viewportCTM.e
             viewportTy = viewportCTM.f


            debug('VIEWPORT TX TY: ' + viewportTx + ' | ' + viewportTy)

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
            nMouseOffsetX = p.x - dragX;
            nMouseOffsetY = p.y - dragY;

            debug('Mouse Down Position: ' + p.x + ' | ' + p.y)
            debug('DragX and DragY: ' + dragX + ' | ' + dragY)
            debug('nMouseOffset: ' + nMouseOffsetX + ' | ' + nMouseOffsetY)
        }

        function mouseUp(event) {
            nMouseOffsetX = 0
            nMouseOffsetY = 0

            // remove the mousemove listener from the svg container
            svg.removeEventListener('mousemove', mouseMove)
        }

        function mouseMove(evt) {


            var pa = {}
            pa.x = evt.clientX
            pa.y = evt.clientY

            debug('Mouse Moved to: ' + pa.x + ' | ' + pa.y)

            debug(viewportTx)

            pa.x = pa.x - nMouseOffsetX - viewportTx
            pa.y = pa.y - nMouseOffsetY - viewportTy

            debug('Final: ' + pa.x + ' | ' + pa.y)

            debug(evt.target.getCTM())

            draggingElement.setAttribute("transform", "translate(" + pa.x + "," + pa.y + ")");
        }














    </script>

    <!-- Javascript -->
    <script src="js/zoomPan.js"></script>
    <script type="text/javascript">
        panZoomSVG(svg)
    </script>

</body>
</html>
