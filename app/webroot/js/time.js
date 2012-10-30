$(document).ready(function() {
    $('#sub').click(function(){
         var start_time;
         start_time = new Date();
         alert(start_time);

});

    $('#next').click(function(){
    	var now;
    now = new Date();
    var cur = now - start_time;
    alert(cur);
});
    });









 