/*$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#emplacement-id').on('change', function () {
        var typeId = $(this).val();
        if (typeId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'emplacementdepart_id=' + typeId,
                success: function (vols) {
                    $select = $('#vol-id');
                    $select.find('option').remove();
                    $.each(vols, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.id + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#vol-id').html('<option value="">Select Type first</option>');
        }
    });
});*/

var app = angular.module('linkedlists', []);

app.controller('emplacementsController', function ($scope, $http) {
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.emplacements = response.data;
    });
});