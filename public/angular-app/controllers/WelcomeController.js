/**
*  Module: Welcome Controller
*
* Description: Random Words Home
*/
angular.module('WelcomeController', ['app','ngMask', 'isteven-multi-select'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.filter('trusted', ['$sce', function ($sce) {
    return function(url) {
        return $sce.trustAsResourceUrl(url);
    };
}]);

app.controller('WelcomeController', function WelcomeController($http, $scope, $interval, $window) {
    // Projects
    $scope.projects = {};
    $http.jsonp('https://api.behance.net/v2/users/concepthausmx/projects?client_id=aeyWwVoxxS9DxTLvJ0W6scIauKj3Bpbg&callback=JSON_CALLBACK')
    .then(function (response) {
      $scope.projects = response.data.projects;
    })

		$scope.getOneProject = function (id){
			$scope.project = {};
			$scope.test = {};
			$http.jsonp('https://www.behance.net/v2/projects/'+id+'?client_id=aeyWwVoxxS9DxTLvJ0W6scIauKj3Bpbg&callback=JSON_CALLBACK')
			.then(function (response){
				console.log(response.data.project);
				$scope.nombre = response.data.project.name;
				$scope.etiquetas = response.data.project.fields[0];
				$scope.project = response.data.project.modules;
				angular.forEach($scope.project, function(value,key){

					if (value.type == 'image') {
						$scope.test[key] = {
							'tipo':'imagen',
							'url':value.sizes.max_1200
						};
					}
					if (value.type == 'text') {
						$scope.test[key] = {
							'tipo':'texto',
							'url':value.text_plain
						};
					}
					if (value.type == 'video') {
						$scope.test[key] = {
							'tipo':'video',
							'url':value.src
						};
					}
				})
				console.log($scope.etiquetas[0]);
			})


		}

    // Random Words Home
    $scope.words = [
      {"word" : "Publicidad"},
      {"word" : "Creatividad"},
      {"word" : "Marketing Digital"},
      {"word" : "Branding"},
      {"word" : "Rebranding"},
      {"word" : "Content Management"},
      {"word" : "Páginas Web"},
      {"word" : "Diseño Gráfico"},
      {"word" : "Posicionamiento Web"},
      {"word" : "SEO"},

      {"word" : "SEM"},
      {"word" : "Desarrollo Sustentable"},
      {"word" : "Producción Audiovisual"},
      {"word" : "Identidad Corporativa"},
      {"word" : "Motion Graphics"},
      {"word" : "Diseño de empaque"},
      {"word" : "Programación"},
      {"word" : "Diseño de páginas web"},
      {"word" : "E-commerce"},
      {"word" : "Apps"},

      {"word" : "Relaciones Públicas"},
      {"word" : "Casa Productora"},
      {"word" : "Post Producción"},
      {"word" : "Cine"},
      {"word" : "Cortometrajes"},
      {"word" : "Comerciales de tv"},
      {"word" : "Video marketing"},
      {"word" : "Videos corporativos"},
      {"word" : "Videos musicales"},
      {"word" : "Fotografía de producto"},

      {"word" : "Cobertura de eventos"},
      {"word" : "Green marketing"},
      {"word" : "Sustentabilidad empresarial"},
      {"word" : "Concientización ecológica"},
      {"word" : "Compra de medios"},
      {"word" : "Back-end"},
      {"word" : "Front-end"},
      {"word" : "Newslettering"},
      {"word" : "Intranet"},

      {"word" : "Community manager"},
      {"word" : "Agencia de diseño"},
      {"word" : "BTL"},
      {"word" : "ATL"},
      {"word" : "Agencia creativa"},
      {"word" : "Google Partner"},
      {"word" : "Google AdWords"},
      {"word" : "Monitoreo de medios"},
      {"word" : "Compras de medios"},
      {"word" : "Influencer Marketing"},

      {"word" : "Análisis de KPI’s"},
      {"word" : "Social Media"},
      {"word" : "Anuncios Google"},
      {"word" : "Google AdWords"},
      {"word" : "Pautas publicitarias"},
      {"word" : "Publicidad en buscadores"},
      {"word" : "Productora de cine"},
      {"word" : "Videos documentales"},
      {"word" : "Video profesional"},
      {"word" : "Video institucional"},

      {"word" : "Comerciales"},
      {"word" : "Diseño de logos"},
      {"word" : "Diseño editorial"},
      {"word" : "Manual de identidad"},
      {"word" : "Brochure"},
      {"word" : "Brand equity"},
      {"word" : "Brand awareness"},
      {"word" : "Diseño de marca"},
      {"word" : "Marketing strategy"},
      {"word" : "Diseño de imagen corporativa"},

      {"word" : "Brand Design"},
      {"word" : "Advertising"},
      {"word" : "Posicionamiento Web"},
      {"word" : "Link Building"},
      {"word" : "Posicionamiento en Google"},
      {"word" : "Posicionamiento Orgánico"},
      {"word" : "Sitios Web"},
      {"word" : "Aplicaciones"},
      {"word" : "Landing Pages"},
      {"word" : "Servicios Web"},

      {"word" : "Sitios Web"},
      {"word" : "Páginas de internet"},
      {"word" : "Maquetación web"},
      {"word" : "Tiendas virtuales"},
      {"word" : "Tiendas online"},
      {"word" : "Sostenibilidad"},

    ]

    $scope.randomWords = {}
    var getRandomWords = function(){
      var words_selection = Math.floor(Math.random()*($scope.words.length));
      var words_random = $scope.words[words_selection];
      // console.log(words_random);
      $scope.randomWords = [
        {"word" : words_random.word,}
      ];
    };
    $interval(getRandomWords,500);

});
