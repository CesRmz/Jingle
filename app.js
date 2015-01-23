/**
 * Created by Yozki on 22/01/2015.
 */

(function(){
    var app = angular.module('store', []);

    app.controller('StoreController', function(){
        this.products = gems;
    });

    var gems = [
        {
            name: 'Dodecahedron',
            price: 2.95,
            description: 'The description of the gem',
            canPurchase: true,
            soldOut: false,
            images: [
                {
                    full: "images/img1.jpg",
                    thumb: "tb_image1.jpg"
                }
            ]
        },
        {
            name: 'Rune of powa!',
            price: 13.37,
            description: 'Pew pew pew!',
            canPurchase: true,
            soldOut: false,
            images: [
                {
                    full: "img2.jpg",
                    thumb: "tb_image2.jpg"
                }
            ]
        }
    ]
})();
