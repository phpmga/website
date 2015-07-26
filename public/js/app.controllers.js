angular.module('app.controllers', [])

    .controller('IndexController', ['$scope', '$rootScope', '$http', '$location',

        function ($scope, $rootScope, $http, $location) {

            $scope.$on('$routeChangeSuccess', function () {

                jQuery('.masthead').visibility({
                    once: false,
                    onBottomPassed: function() {
                        jQuery('.fixed.menu').transition('fade in');
                    },
                    onBottomPassedReverse: function() {
                        jQuery('.fixed.menu').transition('fade out');
                    }
                });
            });

        }

    ]);