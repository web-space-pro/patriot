try {
    window.jQuery = window.$ = require('jquery');
   require("./vendors");
   require("./modules/input_mask");
   require("./modules/menu");
   require("./modules/generall");
   require("./modules/gsap");
   require("./modules/gallery");
   require("./modules/slider-track");
   require("./modules/modal");
}
catch (e) {
    console.log('JS ERROR!!!', e);
}