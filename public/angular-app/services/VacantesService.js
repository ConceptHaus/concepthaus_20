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
        getVacantes: function(){
          return $http({
            method: 'GET',
            url: 'getVacantes'
          })
        },
        getAreas: function(){
          return $http({
            method: 'GET',
            url: '/getAreas'
          })
        },
        getVacantesPostulados : function(){
          return $http({
            method: 'GET',
            url: '/vacantesPostulados'
          })
        },
        deleteVacante: function(id){
          return $http({
            method: 'DELETE',
            url: '/deleteVacante/'+id
          })
        }
    }
});
