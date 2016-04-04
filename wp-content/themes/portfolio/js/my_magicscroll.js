/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($){
    var controller = new ScrollMagic.Controller();

// build tween
    var tween = new TimelineMax()
            .to('.proj', 0.5, {left: "+=300"})
            .to('.proj', 1.5, {left: "-=300", opacity: 1});


// build scene and set duration to window height
    new ScrollMagic.Scene({
        // the scene should last for a scroll distance of 100px
        offset: 100        // start this scene after scrolling for 50px
    })
            .setTween(tween)
            .addTo(controller);

})(jQuery);

