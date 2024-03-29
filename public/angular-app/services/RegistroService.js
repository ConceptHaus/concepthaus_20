/**
*  Module
*
* Description
*/
angular.module('RegistroService', [])


.factory('saveRegistroCancun', function($http, $log){ 
    return {
        post: function(contacto){
            return $http({
                method: 'POST',
                url: '/saveRegistroCancun',
                data: contacto,
            })
        }
    }
})


.factory('saveRegistro', function($http, $log){ 
    return {
        post: function(contacto){
            return $http({
                method: 'POST',
                url: '/saveRegistro',
                data: contacto,
            })
        }
    }
})

.factory('saveLead', function($http, $log){
    return {
        post: function(contacto){
            return $http({
                method: 'POST',
                url: '/saveRegistroLead',
                data: contacto,
            })
        }
    }
})

.factory('AdminService', function($http, $log){
    return {
        getSolicitudes: function(){
            return $http({
                method: 'GET',
                url:'/api/v1/registros'
            })
        },
        getSolicitudesUltimas: function(){
            return $http({
                method: 'GET',
                url:' /api/v1/registrosLatest'
            })
        },
        postFilterDate : function(data){
            return $http({
                method: 'POST',
                url:'/api/v1/solicitud/filterdata',
                data:data,
            })
        },
        postStatus : function(data){
            return $http({
                method: 'POST',
                url:'/api/v1/registro/status',
                data:data,
            })
        },
        postUpdateStatusCompra : function(id_socio, data){
            return $http({
                method: 'POST',
                url:'/api/v1/registro/update/'+id_socio,
                data:data,
            })
        },
        postMedio : function(data){
            return $http({
                method:'POST',
                url:'/api/v1/registro/medio_contacto',
                data:data,
            })
        },
        postDelete : function(data){
            return $http({
                method:'POST',
                url:'/api/v1/registro/delete',
                data:data,
            })
        },
        postEdit : function(data){
            return $http({
                method:'POST',
                url:'/api/v1/registro/edit',
                data:data,
            })
        },
        postDeleteServicie : function(data){
            return $http({
                method:'POST',
                url:'/api/v1/registro/deleteServicie',
                data:data,
            })
        }
    }
})

.factory('brief', function($http) {
  return{
    saveBrief: function(data){
      return $http({
        method: 'POST',
        url: '/brief',
        data: data
      })
    }
  }
})

.factory("countries", function($resource) {
    return $resource("https://api.mercadolibre.com/countries/MX");
})

.factory('states', function($resource,$log){
	var rsc = $resource('https://api.mercadolibre.com/states/:id', {id:'@id'});
	return rsc;
});
