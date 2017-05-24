scotchApp.factory('ProductsServices', function($timeout, $filter, $q,$http) {
    var service = {};
    service.getproducts = getproducts;
    service.editProduct = editProduct;
    service.removeProduct = removeProduct;










    return service;

    function getproducts(search) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','products');
        formData.append('action','products');
        formData.append('search',search);

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

    function editProduct(id,PLU,Name,Preis1,Preis2,Preis3) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','products');
        formData.append('action','editProduct');

        formData.append('id',id);
        formData.append('PLU',PLU);
        formData.append('Name',Name);
        formData.append('Preis1',Preis1);
        formData.append('Preis2',Preis2);
        formData.append('Preis3',Preis3);

        $.ajax({
            url: url,
            type: 'POST',
            data:formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                data=response;
                console.log(data);
            }
        });
        return data;
    }

    function removeProduct(id) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','products');
        formData.append('action','removeProduct');

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
                data=response;
                console.log(data);
            }
        });
        return data;
    }




});