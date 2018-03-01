/**
*  Module
*
* Description
*/
angular.module('RegistroController', ['app','ngMask'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.controller('RegistroController', function RegistroController($scope, saveRegistro, countries, states) {
    $scope.contacto={}; 
    $scope.saveDataContact  = function(contacto, contactoForm){
        console.log('REGISTRO DE CONTACTO EJECUTADO');
        swal({
            // text: "Estamos registrando tus datos.",
            imageUrl: '../img/loader.gif',
            imageWidth: 150,
            imageAlt: 'Concept Haus',
            showConfirmButton: false
        })
        // $scope.contacto.ciudad = $scope.contacto.ciudad.name;
        // $scope.contacto.estado = $scope.contacto.estado.name;
        saveRegistro.post($scope.contacto).then(successRegister, errorRegister);
    }
    var successRegister = function(res){
        // console.log(res.data);
        if (angular.isDefined(res.data.correo)) {
            swal({
                text:'El correo que proporcionaste ya se encuentra registrado, verifícalo o intenta con otro.',
                imageUrl: '../img/logo/concepthaus.svg',
                imageWidth: 210,
                imageAlt: 'Concept Haus',
                confirmButtonText:'Cerrar',
                confirmButtonColor: '#4a4f55',
                closeOnConfirm:false
            })
        } else {
            swal({
                text:'Gracias, tu mensaje fue recibido, pronto nos pondremos en contacto contigo.',
                imageUrl: '../img/logo/concepthaus.svg',
                imageWidth: 210,
                imageAlt: 'Concept Haus',
                icon: "success",
                confirmButtonText:'Cerrar',
                confirmButtonColor: '#4a4f55',
                closeOnConfirm:false
            })
            $scope.contacto = {};
            $scope.contactoForm.$setUntouched();
            $scope.contactoForm.$setPristine();
        }
    }
    var errorRegister = function(errors){
        swal({
            text:'Algo salió mal en el envío de tu información de contacto.',
            imageUrl: '../img/logo/concepthaus.svg',
            imageWidth: 210,
            imageAlt: 'Concept Haus',
            confirmButtonText:'Cerrar',
            confirmButtonColor: '#4a4f55',
            closeOnConfirm:false
        })
    }

    // Estados
    // countries.get().$promise.then(function(data) {
    //     $scope.selected = undefined;
    //     $scope.estados = data.states;
    // })    

    // Código Postal
    // $scope.states=null;
    // $scope.address=null;
    // $scope.searchZipCode = function(state){
    //     $scope.address = states.get({id: state.id});
    //     $scope.address.$promise.then(onsuccesszip, onerrorzip);
    // }
    // function onsuccesszip(data){}
    // function onerrorzip(error){}

});