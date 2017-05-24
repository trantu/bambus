scotchApp.controller('settingsController', function($scope,$http,$rootScope,SettingsServices) {

    $rootScope.group='';
    $rootScope.product='';
    $rootScope.setting='setting';
    $rootScope.histor_order='';
    $rootScope.settings=SettingsServices.getsettings();
    $rootScope.nameSettings=SettingsServices.getNameSettings();
    console.log($rootScope.settings);
    $rootScope.add_2='ng-hide';
    $rootScope.add_1='';


    $scope.saveSetting = function(data,id) {
        //alert(data.description);
        SettingsServices.editSetting(id,data.Key,data.Value,data.description);
        $rootScope.settings=SettingsServices.getsettings($scope.search);
    };

    $scope.change=function (search) {
        $rootScope.settings=SettingsServices.getsettings(search);
    }

    $scope.save=function (name,key,value,des) {
        if(name==null){
            alert('Please chose name!'); return;
        }
        SettingsServices.save(name,key,value,des);
        $('#myModal').modal('hide');
        $rootScope.settings=SettingsServices.getsettings($scope.search);
    }
    
    $scope.modalEdit=function (id) {
        $rootScope.id_logo=id;

        $('#editLogo').modal('show');
    }

    $scope.change_add=function (name) {
        if(name=='header_color'){
            $rootScope.add_1='ng-hide';
            $rootScope.add_2='';
        }else{
            $rootScope.add_2='ng-hide';
            $rootScope.add_1='';
        }
    }

    $scope.saveLogo = function(id) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData($("form#imageform")[0]);
        formData.append('controller','settings');
        formData.append('action','editLogo');
        formData.append('id', $rootScope.id_logo);

        $('#editLogo').modal('hide');
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
        $rootScope.settings=SettingsServices.getsettings($scope.search);
    }



});