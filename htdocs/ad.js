$(function(){
    $(".show-button").click(function(){
        var $this = $(this);
        var $target = $this.next();
        if($target.css('display') == 'none'){
            $target.slideDown(100);
        
        }else{
            $target.slideUp(100);

        };
    });
});