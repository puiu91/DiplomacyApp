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


<button id="addSupplyDepot">Add new supply depot</button>


    <h2 align="center">HTML5 SVG Star</h2>

    <svg id="svgCanvas" version="1.1" baseProfile="full" xmlns="http://www.w3.org/2000/svg">

        <g id="viewport">
            <!-- <path d="M10 10 H 90 V 90 H 10 L 10 10"/> -->

            <image id="poly" x="90" y="-65" width="128" height="146" transform="rotate(45)" xlink:href="https://developer.mozilla.org/media/img/mdn-logo.png"/>

            <g id="groupedSVG" transform="translate(50,25)">
                <line x1="10" y1="10" x2="85" y2="10"
                style="stroke: #006600;"/>

                <rect x="10" y="20" height="50" width="75"
                style="stroke: #006600; fill: #006600"/>

                <text x="10" y="90" style="stroke: #660000; fill: #660000">
                    Text grouped with shapes
                </text>
            </g>


            <circle class="supply-depot" cx="600" cy="600" r="10" />

            <path stroke="black" d="M 519.25,440.625 -4.125,1.875 -3.25,0.5 -4,0.5 -1.25,-3 -0.875,-2.25 -0.25,-3.5 -1.25,-2 -0.5,-1.25 0,-1.5 0.75,-2.25 1.25,-1.75 0.625,-2.25 1.25,-2.75 0,-2.125 -2.125,-1.875 -2.125,-0.625 -2,-1.375 -1.125,-1 -0.375,-2.875 0.5,-2.875 0.25,-2.875 0.75,-1.75 1.125,-2.625 1.125,-2.5 0.875,-2.375 0.125,-3 -1.25,-1 -0.875,-1.125 -0.625,-1.625 -0.25,-1.25 0.625,-0.625 1.125,0.875 1.375,0.25 1.75,0.875 1,-1.375 0,-2.875 -0.25,-2 -0.625,-1.75 0,-2.25 1.125,-0.75 1.75,-1 2.75,-1.5 2.25,-1.375 6.375,0 6,-0.25 3.875,-1.125 1.625,-2.5 3.5,-3.375 2,-1.625 1.75,-0.25 1,-1.375 0.125,-1.75 1.875,0.875 1,1.5 0,1.75 -1.5,1.625 -0.75,2.125 0.125,6.25 -0.875,1.25 -1.625,0.75 -1.25,1.375 -1,2.5 0,1.75 -0.75,0.5 -3,0 -0.375,1.25 0,2.75 0.125,2.25 0.75,1.5 2.125,0.25 2,0.875 2.875,0 1.5,0 0.75,-0.875 1.125,0.75 0.75,1.375 -0.875,1.25 -0.625,2.25 0,1.25 0.375,1.75 1,1.125 -0.625,0.875 -2,1.125 -1.25,0.5 -2.375,0.625 -0.75,-1.125 -1.125,-0.875 -1.75,-0.625 -2,0.5 -0.75,1.375 -0.5,2.25 0,1.625 -1.625,1.5 -1.875,0.25 -0.75,1.75 0.375,2.5 -0.625,1.75 -0.75,1.25 -0.75,1.375 1.5,1.625 1.75,0 2,-0.625 1.625,-0.5 2.875,-0.125 1.125,1.375 0.25,2.375 0.125,2.125 0.75,1.875 -0.25,2.5 -1,2 -1.625,0.875 -1.125,0.625 L 531,432 l -2.625,-0.875 -2.25,-0.75 -2.125,-0.875 -1.625,0.25 -0.875,1.625 -0.5,2.875 -0.625,2.75 -0.625,1.875 z M 509.75,387.25 l 3,0.875 3.75,0.75 3.625,-0.375 1.25,-2 1,-2.25 2.75,-1 2,-0.875 3.625,0.125 0.625,-1 0.375,-2.75 -2,-1.375 -4,0.125 -3.25,0.375 -1.25,1.375 -0.875,1.25 -7.125,0 -1.625,1 -2,1.375 z"></path>
            <path stroke="black" d="m 543.625,416.375 0,5 0.125,4.375 1.75,1.75 1.25,3.5 1.125,2.25 1.625,1.5 1.25,-0.125 0.75,-0.875 1.5,-0.875 2.25,-0.625 1.125,-1.625 0.125,-2.625 1,-1.875 0.875,-2.625 0.375,-1.5 1,-0.875 -0.375,-1.625 -1.625,0.125 -1.375,-1.25 0.125,-3.75 0.875,-1 -1.25,-1.375 -1.875,-0.5 -1.5,-1.375 -1.875,0.875 -2.75,0.75 -2.25,2.25 -0.875,0.625 z"></path>

            <path stroke="black" d="m 540.75,436.75 3.125,-0.125 1.375,1.125 1.375,1.625 0.5,1.875 1.625,1.5 0.75,-0.125 1.375,1.5 -0.5,1.25 -1.375,1.25 -4.875,0 -1.625,-1.25 0,-2.625 -1.125,-2 -1.25,-0.5 -0.75,-1 0.5,-1.125 z"></path>


            <!-- <path d="M10 10 C 20 20, 40 20, 50 10" stroke="black" fill="transparent"/> -->

        <!-- <path d="M10 10 L 10 10"/> -->

            <!-- <path d="M 20 230 Q 40 205, 50 230 T 90230"/> -->

            <circle id="moveMe" cx="300" cy="100" r="80" fill="green" />

            <!-- <polygon id="poly" points="0,0 100,100 0,100 200,200" fill="red"/> -->
            <!-- <polygon points="20,10 300,20, 170,50" fill="red" /> -->
            <!-- <rect id="redrect" width="300" height="100" fill="red" /> -->

        </g>

    </svg>


    <style type="text/css">

    #moveMe {
        cursor: pointer;
    }

    </style>



    <script type="text/javascript">

        // access the svg element
        var svg = document.getElementsByTagName('svg')[0];
        var viewport = document.getElementById('viewport')

        debug(svg)
        // debug(viewport) 













        document.getElementById('addSupplyDepot').addEventListener('click', function(event) {
            var newElement = document.createElementNS("http://www.w3.org/2000/svg", 'circle');
            newElement.setAttribute('cx', '300');
            newElement.setAttribute('cy', '300');
            newElement.setAttribute('r', '20');
            newElement.setAttribute('class', 'supply-depot');
            svg.appendChild(newElement);
        });



        // var poly = document.getElementById('poly')
        // 
        
        var moveMe = document.getElementById('moveMe')
        var groupedSVG = document.getElementById('groupedSVG')

        // stores mouse down boolean
        var mouseDown = 0;

        // create event listeners for mouse down, up, and move
        // for all objects
        moveMe.addEventListener('mousedown', function(event) {
            mouseDown = 1;
        });

        moveMe.addEventListener('mouseup', function(event) {
            mouseDown = 0;
        });
            
        moveMe.addEventListener('mousemove', function(event) {
            // exit while the mouse isn't pressed down
            if ( ! mouseDown) return;
            
            debug(mouseDown)

            debug(this.node)
            

            // get current mouse (x, y) coordinates
            var mouseX = event.clientX;
            var mouseY = event.clientY;

            // set the coordinates of svg element to current mouse position
            moveMe.setAttributeNS(null, "cx", mouseX);
            moveMe.setAttributeNS(null, "cy", mouseY);

            debug(this)

            this.setAttribute('class', 'supply-depot')

            var tx = "translate(" + mouseX + "," + mouseY + ")";
            groupedSVG.setAttribute("transform", tx);

        });


        poly.addEventListener('mousedown', function(event) { 

            // get x and y coordinates of mouse


            // update the shape being hovered on with new mouse coordinates

            alert('clicked')
        });



        // document.addEventListener('mousemove', function(event) { 
        //     mouseX = event.clientX
        //     mouseY = event.clientY;

        //     debug('X: ' + mouseX + ' Y: ' + mouseY)
        // });

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

    </script>    













    <!-- Javascript -->
    <script src="js/zoomPan.js"></script>
    <script type="text/javascript">
        panZoomSVG(svg)
    </script>

</body>
</html>
