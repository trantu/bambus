scotchApp.factory('SettingsServices', function($timeout, $filter, $q,$http) {
    var service = {};
    service.getsettings = getsettings;
    service.editSetting = editSetting;
    service.getNameSettings = getNameSettings;
    service.save = save;










    return service;

    function getsettings(search) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','settings');
        formData.append('action','settings');
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

    function getNameSettings() {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','settings');
        formData.append('action','nameSettings');


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

    function editSetting(id,key,value,description) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','settings');
        formData.append('action','editSetting');

        formData.append('id',id);
        //formData.append('Name',name);
        formData.append('Key',key);
        formData.append('Value',value);
        formData.append('description',description);

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

    function save(name,key,value,des) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','settings');
        formData.append('action','save');

        formData.append('Name',name);
        //formData.append('Name',name);
        formData.append('Key',key);
        formData.append('Value',value);
        formData.append('des',des);

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