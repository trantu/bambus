scotchApp.factory('GroupsServices', function($timeout, $filter, $q,$http) {
    var service = {};
    service.getgroups = getgroups;
    service.editGroup = editGroup;
    service.removeGroup = removeGroup;










    return service;

    function getgroups() {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','groups');
        formData.append('action','groups');

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

    function editGroup(id,name,bild,farbe) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','groups');
        formData.append('action','editGroup');

        formData.append('id',id);
        formData.append('name',name);
        formData.append('bild',bild);
        formData.append('farbe',farbe);

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

    function removeGroup(id) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData();
        formData.append('controller','groups');
        formData.append('action','removeGroup');

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