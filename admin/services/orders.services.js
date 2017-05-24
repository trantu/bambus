scotchApp.factory('OrdersServices', function($timeout, $filter, $q,$http) {
    var service = {};
    service.getorders = getorders;
    service.GetPager = GetPager;
    service.getorderstotal = getorderstotal;
    service.delete_order = delete_order;
    service.delete_order_all = delete_order_all;

    return service;



    function getorders(start,end ) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','orders');
        formData.append('action','getorders');
        formData.append('start',start);
        formData.append('end',end);


        $.ajax({
            url: url,
            type: 'POST',
            data:formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                data=angular.fromJson(response);
            }
        });
        return data;
    }

    function getorderstotal() {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','orders');
        formData.append('action','getorderstotal');


        $.ajax({
            url: url,
            type: 'POST',
            data:formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                data=angular.fromJson(response);
                data=data.num;
            }
        });
        return data;
    }

    function delete_order(id) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','orders');
        formData.append('action','delete_order');
        formData.append('id',id);


        $.ajax({
            url: url,
            type: 'POST',
            data:formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {


            }
        });
        return data;
    }

    function delete_order_all() {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','orders');
        formData.append('action','delete_order_all');



        $.ajax({
            url: url,
            type: 'POST',
            data:formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {


            }
        });
        return data;
    }

    function GetPager(totalItems, currentPage, pageSize) {
        // default to first page
        currentPage = currentPage || 1;

        // default page size is 10
        pageSize = pageSize || 30;

        // calculate total pages
        var totalPages = Math.ceil(totalItems / pageSize);

        var startPage, endPage;
        if (totalPages <= 10) {
            // less than 10 total pages so show all
            startPage = 1;
            endPage = totalPages;
        } else {
            // more than 10 total pages so calculate start and end pages
            if (currentPage <= 6) {
                startPage = 1;
                endPage = 10;
            } else if (currentPage + 4 >= totalPages) {
                startPage = totalPages - 9;
                endPage = totalPages;
            } else {
                startPage = currentPage - 5;
                endPage = currentPage + 4;
            }
        }

        // calculate start and end item indexes
        var startIndex = (currentPage - 1) * pageSize;
        var endIndex = Math.min(startIndex + pageSize - 1, totalItems - 1);

        // create an array of pages to ng-repeat in the pager control
        var pages = _.range(startPage, endPage + 1);

        // return object with all pager properties required by the view
        return {
            totalItems: totalItems,
            currentPage: currentPage,
            pageSize: pageSize,
            totalPages: totalPages,
            startPage: startPage,
            endPage: endPage,
            startIndex: startIndex,
            endIndex: endIndex,
            pages: pages
        };
    }




});