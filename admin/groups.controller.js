scotchApp.controller('groupsController', function($scope,$http,$rootScope,GroupsServices) {

    $rootScope.group='group';
    $rootScope.product='';
    $rootScope.setting='';
    $rootScope.gif='';
    $rootScope.histor_order='';
    $rootScope.groups=GroupsServices.getgroups();
    console.log($scope.groups);

    // $scope.addGroup = function() {
    //     $scope.inserted = {
    //         id: $scope.groups.length+1,
    //         Online_Gruppe_Name: '',
    //         Online_Gruppe_Bild: '',
    //         Online_Gruppe_Farbe: ''
    //     };
    //     $rootScope.groups.push($scope.inserted);
    // };

    $scope.saveGroup = function(data,id) {
        GroupsServices.editGroup(id,data.Online_Gruppe_Name,data.Online_Gruppe_Bild,data.Online_Gruppe_Farbe);
        $rootScope.groups=GroupsServices.getgroups();
    };


    $scope.removeGroup=function (id) {
        var r = confirm("Are you sure you want to delete group?");
        if(r==true){
            GroupsServices.removeGroup(id);
            $rootScope.groups=GroupsServices.getgroups();
        }

    }

    $scope.addGroup = function(name,frabe_group) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData($("form#imageform")[0]);
        formData.append('controller','groups');
        formData.append('action','addGroup');
        formData.append('name', name);
        formData.append('frabe_group', frabe_group);

        $('#addGroup').modal('hide');
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
        $('#exampleInputPassword2').val('');
        $('#exampleInputPassword1').val('');
        $rootScope.groups=GroupsServices.getgroups();
    }

    $scope.modalEditGroup=function (id,name,frabe) {
        $scope.id_group=id;
        $scope.name_group_edit=name;
        $scope.frabe_group_edit=frabe;
        $("#file_2").val('');

        $('#editGroup').modal('show');
    }


    $scope.editGroupSave = function(name,frabe_group) {
        var data = null;
        var url = '../admin/controllers/controller.php';
        var formData = new FormData($("form#imageform_edit")[0]);
        formData.append('controller','groups');
        formData.append('action','editGroupArticle');
        formData.append('name', name);
        formData.append('frabe_group', frabe_group);
        formData.append('id', $scope.id_group);

        $('#editGroup').modal('hide');
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
        $rootScope.groups=GroupsServices.getgroups();
    }

});