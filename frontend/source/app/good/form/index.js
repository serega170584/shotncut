var uiMask = require('angular-ui-mask')
angular
    .module('si.good.form', [uiMask])
    .controller('siGoodFormController', ['$scope', '$http', function($scope, $http){
        $scope.send = function(){
            $http.post('/api/send-request', $scope.request)
                .then(function(response){ //success request
                    $scope.request.phone = '';
                    //TODO: thanks message
                    console.log(response);

                }, function(response){ // error request
                    //TODO: error message
                    console.log(response);
                })
        }
    }])
module.exports = 'si.good.form'
