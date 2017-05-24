scotchApp.controller('productsController', function($scope,$http,$rootScope,ProductsServices,GroupsServices) {

    $rootScope.group='';
    $rootScope.product='product';
    $rootScope.setting='';
    $rootScope.histor_order='';
    $rootScope.products=ProductsServices.getproducts();
    console.log($rootScope.products);

    $scope.groups_product=GroupsServices.getgroups();
    $scope.groups_product2=GroupsServices.getgroups();

    $scope.change_group=function (search_p) {
        $rootScope.products=ProductsServices.getproducts(search_p);
    }

    $scope.removeProduct=function (id) {
        var r = confirm("are you sure you want to delete product?");
        if(r==true){
            ProductsServices.removeProduct(id);
            $rootScope.products=ProductsServices.getproducts($scope.search_p);
        }

    }
    $scope.modalEditProduct=function (old,plu,name,pre1,pre2,pre3,beli,artikel_name,bes,group,bild,farbe) {
        //alert(bes);return;
        $scope.old_plu=old;
        $scope.PLU=plu;
        $scope.Name=name;
        $scope.Preis1=pre1;
        $scope.Preis2=pre2;
        $scope.Preis3=pre3;
        $scope.Beilage=beli;
        $scope.Artikel_Name=artikel_name;
        $scope.Artikel_Beschreibung=bes;
        $scope.Online_Gruppe=group;
        $scope.Online_Bild=bild;
        $scope.Online_Farbe=farbe;

        $('#editProduct').modal('show');
    }

    $scope.editProductSave = function(old_plu,p_plu,p_name,p_preis1,p_preis2,p_preis3,p_beilage,p_artikel_name,p_artikel_beschreibung,p_online_gruppe,p_online_bild,p_online_farbe) {

        if(p_online_gruppe==null){
            alert('Please chose group!');return;
        }
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData($("form#imageform")[0]);
        formData.append('controller','products');
        formData.append('action','editProduct');
        formData.append('old_plu', old_plu);
        formData.append('p_plu', p_plu);
        formData.append('p_name', p_name);
        formData.append('p_preis1', p_preis1);
        formData.append('p_preis2', p_preis2);
        formData.append('p_preis3', p_preis3);
        formData.append('p_beilage', p_beilage);
        formData.append('p_artikel_name', p_artikel_name);
        formData.append('p_artikel_beschreibung', p_artikel_beschreibung);
        formData.append('p_online_gruppe', p_online_gruppe);
        formData.append('p_online_bild', p_online_bild);
        formData.append('p_online_farbe', p_online_farbe);



        $('#editProduct').modal('hide');
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
        $rootScope.products=ProductsServices.getproducts($scope.search_p);
    }

    $scope.saveProduct = function(p_plu,p_name,p_preis1,p_preis2,p_preis3,p_beilage,p_artikel_name,p_artikel_beschreibung,p_online_gruppe,p_online_bild,p_online_farbe) {
        if(p_online_gruppe==null){
            alert('Please chose group!');return;
        }
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData($("form#imageform")[0]);
        formData.append('controller','products');
        formData.append('action','addProduct');
        formData.append('p_plu', p_plu);
        formData.append('p_name', p_name);
        formData.append('p_preis1', p_preis1);
        formData.append('p_preis2', p_preis2);
        formData.append('p_preis3', p_preis3);
        formData.append('p_beilage', p_beilage);
        formData.append('p_artikel_name', p_artikel_name);
        formData.append('p_artikel_beschreibung', p_artikel_beschreibung);
        formData.append('p_online_gruppe', p_online_gruppe);
        formData.append('p_online_bild', p_online_bild);
        formData.append('p_online_farbe', p_online_farbe);



        $('#addProduct').modal('hide');
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
        $rootScope.products=ProductsServices.getproducts($scope.search_p);
    }


});