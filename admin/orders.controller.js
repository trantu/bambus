scotchApp.controller('ordersController', function($scope,$http,$rootScope,OrdersServices) {

    $rootScope.group='';
    $rootScope.product='';
    $rootScope.setting='';
    $rootScope.histor_order='order';
    $scope.dummyItems=OrdersServices.getorderstotal();

    console.log($scope.dummyItems);


    //$scope.dummyItems = $scope.orders; // dummy array of items to be paged

    $scope.pager = {};
    $scope.setPage = setPage;

    initController();

    function initController() {
        // initialize to page 1
        $scope.setPage(1);
    }

    function setPage(page) {
        if (page < 1 || page > $scope.pager.totalPages) {
            return;
        }

        // get pager object from service
        $scope.pager = OrdersServices.GetPager($scope.dummyItems, page);
        console.log($scope.pager);
        // get current page of items
        //$scope.items = $scope.dummyItems.slice($scope.pager.startIndex, $scope.pager.endIndex + 1);
        $scope.items = OrdersServices.getorders($scope.pager.startIndex, $scope.pager.endIndex + 1);
    }
    
    $scope.show_product = function (product) {
        $('#product').modal('show');
        $scope.products=angular.fromJson(product);
        angular.forEach($scope.products, function(value, key) {
            if(value.stt_bei!=undefined){
                var res = value.stt_bei.split("<==>");
                angular.forEach(res, function(value, key) {
                    if(value=="")
                    {
                        res.splice(key);
                    }else{
                        var res_chird=value.split("¶");
                        res[key]=res_chird;
                    }

                });
                value.stt_bei=res;
            }

        });
        console.log($scope.products);
    }

    $scope.show_address = function (address) {
        $('#address').modal('show');
        $scope.data=null;

        $scope.address=angular.fromJson(address);
        $scope.data=[$scope.address];
        console.log($scope.data);

    }

    $scope.delete_order = function (id) {
        if(confirm('Are you sure delete?')){
            OrdersServices.delete_order(id);
            $scope.dummyItems=OrdersServices.getorderstotal();
            $scope.setPage($scope.pager.currentPage);
        }else{

        }
    }
    $scope.delete_order_all = function (id) {
        if(confirm('Are you sure delete all data?')){
            OrdersServices.delete_order_all();
            $scope.dummyItems=OrdersServices.getorderstotal();
            $scope.setPage($scope.pager.currentPage);
        }else{

        }
    }

});