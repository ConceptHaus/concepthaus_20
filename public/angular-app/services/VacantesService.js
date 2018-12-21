/**
*  Module
*
* Description
*/
angular.module('VacantesService', [])

.factory('vacantes', function($http, $log){
    return {
        saveVacante: function(vacante){
            return $http({
                method: 'POST',
                url: '/saveVacante',
                data: vacante
            })
        },
        createArea: function(area){
          return $http({
            method: 'POST',
            url: '/createArea',
            data: area
          })
        },
        createPostulado : function(postulado){
          return $http({
            method: 'POST',
            url: '/createPostulado',
            data: postulado
          })
        }
    }
});
