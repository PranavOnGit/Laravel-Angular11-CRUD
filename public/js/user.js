
var app = angular.module('userRecords', []);
app.controller('UserController', function($scope, $http) {
    //show modal form
    $scope.toggle = function(modalstate, id) {
        // $scope.modalstate = modalstate;
        // $scope.user = null;
        // switch (modalstate) {
        //     case 'edit':
        //         $scope.form_title = "user Detail";
        //         $scope.id = id;
        //         $http.get('getUser/' + id)
        //             .then(function(response) {
        //                 console.log(response);
        //                 $scope.user = response.data.user;
        //             });
        //         break;
        //     default:
        //         break;
        // }
        console.log(id);
        console.log(modalstate);
        $('#exampleModal').modal('show');
    }
    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http.delete('deleteUser/'+id).then(function (response) {
                if (response.data.status == true){
                    alert(response.data.data);
                    location.reload();
                } else {
                    console.log(error);
                    alert(response.data.data);
                }
            })
        } else {
            return false;
        }
    }
});