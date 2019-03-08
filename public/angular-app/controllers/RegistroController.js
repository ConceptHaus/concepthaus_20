/**
*  Module
*
* Description
*/
angular.module('RegistroController', ['app', 'ngMask', 'isteven-multi-select', 'ngCookies'], function ($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.controller('RegistroController', function RegistroController($scope, $window, saveRegistro, saveLead, countries, states, brief, $cookies) {
    const urlParams = new URLSearchParams(window.location.search);
    $scope.utm_term = urlParams.get('utm_term');
    $cookies.put("__utm_term", $scope.utm_term);

    $scope.utm_campaign = urlParams.get('utm_campaign');
    $cookies.put("__utm_campaign", $scope.utm_campaign);

    console.log($scope.utm_term, $scope.utm_campaign);
    $scope.contacto={};
    $scope.saveDataContact  = function(contacto, contactoForm){
        
        swal({
            // text: "Estamos registrando tus datos.",
            imageUrl: '../img/loader.gif',
            imageWidth: 150,
            imageAlt: 'Concept Haus',
            showConfirmButton: false
        })
        $scope.contacto.utm_term = $scope.utm_term;
        $scope.contacto.utm_campaign = $scope.utm_campaign;
        // $scope.contacto.ciudad = $scope.contacto.ciudad.name;
        // $scope.contacto.estado = $scope.contacto.estado.name;
        console.log($scope.contacto);
        $scope.contacto.servicios = [];
        angular.forEach(contacto.outputServicies, function(value, key) {
            $scope.contacto.servicios.push(value.name);
        })
        saveRegistro.post($scope.contacto).then(successRegister, errorRegister);
    }
    var successRegister = function(res){
        $window.location.href = '/gracias';
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
            // swal({
            //     text:'Gracias, tu mensaje fue recibido, pronto nos pondremos en contacto contigo.',
            //     imageUrl: '../img/logo/concepthaus.svg',
            //     imageWidth: 210,
            //     imageAlt: 'Concept Haus',
            //     icon: "success",
            //     confirmButtonText:'Cerrar',
            //     confirmButtonColor: '#4a4f55',
            //     closeOnConfirm:false
            // })

            $scope.contacto = {};
            $scope.contactoForm.$setUntouched();
            $scope.contactoForm.$setPristine();
						console.log('Registro');
						$window.location.href = '/gracias';
        }
    }
    var errorRegister = function(errors){
        // swal({
        //     text:'Algo salió mal en el envío de tu información de contacto.',
        //     imageUrl: '../img/logo/concepthaus.svg',
        //     imageWidth: 210,
        //     imageAlt: 'Concept Haus',
        //     confirmButtonText:'Cerrar',
        //     confirmButtonColor: '#4a4f55',
        //     closeOnConfirm:false
        // })
				$window.location.href = '/gracias';
    }

    $scope.saveDataLead  = function(contacto, contactoForm){
        swal({
            imageUrl: '../img/loader.gif',
            imageWidth: 150,
            imageAlt: 'Concept Haus',
            showConfirmButton: false
        })

        $scope.contacto.servicios = [];
        angular.forEach(contacto.outputServicies, function(value, key) {
            $scope.contacto.servicios.push(value.name);
        })

        saveLead.post($scope.contacto).then(successRegisterLead, errorRegisterLead);
    }
    var successRegisterLead = function(res){
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
                text:'El registro del lead ha sido guardado.',
                imageUrl: '../img/logo/concepthaus.svg',
                imageWidth: 210,
                imageAlt: 'Concept Haus',
                icon: "success",
                confirmButtonText:'Cerrar',
                confirmButtonColor: '#4a4f55',
                closeOnConfirm:false
            })
            $scope.contacto = {};
            $scope.contacto.outputServicies = {};
            $scope.contactoForm.$setUntouched();
        }
    }
    var errorRegisterLead = function(errors){
        swal({
            text:'Algo salió mal en el registro del Lead, vuelve a intentarlo.',
            imageUrl: '../img/logo/concepthaus.svg',
            imageWidth: 210,
            imageAlt: 'Concept Haus',
            confirmButtonText:'Cerrar',
            confirmButtonColor: '#4a4f55',
            closeOnConfirm:false
        })
    }

    // Multiple Select
    $scope.listServicies = [
        { icon: "<img src=../../img/concept.png />", name: "Branding", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Diseño", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "3D", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Desarrollo Web", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "SEO", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Marketing Digital", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "Marketing ATL", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "Marketing BTL", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Evento", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Relaciones Públicas", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "Responsabilidad Social", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Interiorismo", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Producción Audiovisual", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Fotografía", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Varios", ticked: false  }
    ];

		// Multiple Select Eng
		$scope.listServicies_en = [
        { icon: "<img src=../../img/concept.png />", name: "Branding", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Design", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "3D", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Web Development", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "SEO", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Digital Marketing", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "ATL Marketing", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "BTL Marketing", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Event", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Public Relations", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "Corporate Social Responsibility", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Interior Design", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "AV Production", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Photography", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Various", ticked: false  }
    ];

		$scope.registroBrief = function(form){
			swal({
					// text: "Estamos registrando tus datos.",
					imageUrl: '../img/loader.gif',
					imageWidth: 150,
					imageAlt: 'Concept Haus',
					showConfirmButton: false,
					allowOutsideClick: false
			})

			brief.saveBrief(form).then(function(res){
				swal({
						text: "¡Gracias!",
						imageUrl: '../img/logo/concept.svg',
						imageWidth: 150,
						imageAlt: 'Concept Haus',
						showConfirmButton: true,
						confirmButtonText: 'Aceptar',
						confirmButtonColor: '#4a4f55',
						allowOutsideClick: false
				}).then((result) => {
					window.location.href = '/';
				})
			}, function(err){
				swal({
						text: "Ocurrio un error.",
						imageUrl: '../img/logo/concept.svg',
						imageWidth: 150,
						imageAlt: 'Concept Haus',
						showConfirmButton: false
				})
			})
		}



});
