define(['jquery'], function($){
    "use strict";
    return function alertNotaAlta(btn)
    {
        $(btn).click(function(){
            alert('La nota mayor de la clase es: ' + maxNote);
        })
    }
});
