/**
 * Created by Yozki on 22/01/2015.
 */

(function(){
    var app = angular.module('store', []);

    app.controller('StoreController', function(){
        this.product = gem;
    });

    var gem = {
        name: 'Dodecahedron',
        price: 2.95,
        description: 'The description of the gem',
        canPurchase: false
    }
})();
