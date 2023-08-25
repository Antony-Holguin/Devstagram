strict

//Disable rigth click to prevent the user to access devolopment tools
(function (){
    function disableIE() {
        if (document.all) {
            return false;
        }
    }

    document.onkeydown = function (e) {
 
        // disable F12 key
        if(e.keyCode == 123) {
            return false;
        }
 
        // disable I key
        if(e.ctrlKey && e.shiftKey && e.keyCode == 73){
            return false;
        }
 
        // disable J key
        if(e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            return false;
        }
 
        // disable U key
        if(e.ctrlKey && e.keyCode == 85) {
            return false;
        }
    }

    function disableNS(e) {
        if (document.layers || (document.getElementById && !document.all)) {
            if (e.which==2 || e.which==3 || e.wich===27 ) {
                return false;
            }

            if(e.wich == 123) {
                return false;
            }
        }
    }
    if (document.layers) {
        document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown = disableNS;
    } 
    else {
        document.onmouseup = disableNS;
        document.oncontextmenu = disableIE;
    }
    document.oncontextmenu=new Function("return false");
}());