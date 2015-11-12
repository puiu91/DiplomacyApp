# DiplomacyApp
App to speed up order creation in Diplomacy board game

There are three phases to this project.

**Phase** 1 (beta done, in beta2 folder)
- create a small phone webapp to speed up order creation by users

Phase 2 
- create an interactive SVG webapp of the Diplomacy map 
- allow users to create/delete new units and supply depots
- zoomable map
- draggable unit and supply depot icons

Limitations
- one user will be responsible to move the pieces (ideally played on a large TV)

Phase 3 
- use Node.js or WebSockets to create piece moves
  - joining the orders created in the app from Phase 1 with the svg map in Phase 2
- alternatively, let players play on their own computer and communicate with each other with orders they create

Features
- ability to highlight provinces similar to http://jsfiddle.net/neveldo/TUYHN/

**Resources Needed:**

https://msdn.microsoft.com/en-us/library/gg589508(v=vs.85).aspx

https://github.com/ariutta/svg-pan-zoom

http://bl.ocks.org/mbostock/3680999

http://samples.msdn.microsoft.com/workshop/samples/svg/zoomAndPan/zoomingAndPanning.html

http://pencilscoop.com/2014/03/svg-zoom-effects-with-internal-javascipt

http://pencilscoop.com/2013/11/animate-svg-icons-with-css3-jquery

http://www.w3.org/TR/SVG/propidx.html

**For Mapping** 

http://www.smashingmagazine.com/2015/09/making-svg-maps-from-natural-earth-data/

http://techslides.com/50-javascript-libraries-and-plugins-for-maps

https://github.com/nvkelso/natural-earth-vector

**Important Threads on how to manipulate SVG**

http://stackoverflow.com/questions/10349811/how-to-manipulate-translate-transforms-on-a-svg-element-with-javascript-in-chrom

http://stackoverflow.com/questions/16810948/svg-transformations-in-javascript

https://github.com/kartograph/kartograph.org/tree/master/showcase/italia

http://www.creativebloq.com/netmag/create-responsive-svg-image-maps-51411831

http://bl.ocks.org/mbostock/6123708

http://codepen.io/anon/pen/gaQeZE?editors=101

**Creating new SVG Nodes**

http://stackoverflow.com/questions/16488884/add-svg-element-to-existing-svg-using-dom

http://sarasoueidan.com/blog/svg-transformations/

http://stackoverflow.com/questions/10281732/js-svg-getctm-and-setctm

http://bl.ocks.org/rkirsling/5001347

**add click listeners to all units**

http://stackoverflow.com/questions/4070287/advice-for-creating-google-maps-like-interface

https://mdn.mozillademos.org/files/5031/draggable_elements.html
