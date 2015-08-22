angular.module('app.controllers', [])

    .controller('IndexController', ['$scope', '$rootScope', '$http', '$location',

        function ($scope, $rootScope, $http, $location) {

            $scope.name = "";
            $scope.email = "";
            $scope.subject = "";
            $scope.message = "";
            $scope.sendmail = {
                type: "negative",
                valid: false,
                message: ""
            };

            var rules =
            {
                name: {
                    identifier: 'name',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Por favor informe seu nome'
                        }
                    ]
                },
                email: {
                    identifier: 'email',
                    rules: [
                        {
                            type: 'email',
                            prompt: 'Por favor informe um e-mail válido'
                        }
                    ]
                },
                subject: {
                    identifier: 'subject',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Por favor informe o assunto'
                        }
                    ]
                },
                message: {
                    identifier: 'message',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Por favor insira sua mensagem'
                        }
                    ]
                }
            }
            var settings =
            {
                on: blur,
                inline: true,
                onSuccess: function () {
                    var $button = $('#submit').addClass('loading').prop('disabled', true);

                    $http.post('/email/contact', {
                        name: $scope.name,
                        email: $scope.email,
                        subject: $scope.subject,
                        message: $scope.message
                    })
                        .success(function (data) {
                            $button.removeClass('loading').prop('disabled', false);

                            if (data.status == "success") {
                                $scope.sendmail.type = "success";
                                $scope.sendmail.valid = true;
                                $scope.sendmail.message = data.message;

                                $('#contact_form').find('input,textarea').val('');

                                return false;
                            } else {
                                $scope.sendmail.type = "negative";
                                $scope.sendmail.valid = true;
                                $scope.sendmail.message = data.message;
                                return false;
                            }
                        })
                    return false;
                }
            }
            $('#contact_form').form(rules, settings);
        }

    ]);