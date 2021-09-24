define(['jquery'], function($){
    "use strict";
    return function btndisplay(btn,div)
    {
        $(btn).click(function(){
            $(div).slideToggle();
        });
    }
});


