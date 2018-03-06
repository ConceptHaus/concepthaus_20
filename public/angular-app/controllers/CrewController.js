/**
*  Module: Welcome Controller
*
* Description: Random Words Home
*/
angular.module('CrewController', ['app','ngMask'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.controller('CrewController', function CrewController($scope) {
  $scope.crew = [{
    nombre: "Shady Hakimi",
    puesto: "Marketing Director",
    foto: "img/crew/shady2.jpg"
  }, {
    nombre: "Lolita Davis",
    puesto: "Key Account Manager",
    foto: "img/crew/davis.jpg"
  }, {
    nombre: "Estefani Nava",
    puesto: "Key Account Manager",
    foto: "img/crew/fany.jpg"
  },{
    nombre: "Eugenio Becker",
    puesto: "CEO",
    foto: "img/crew/eugenio.jpg"
  },{
    nombre: "Daniela Cruz",
    puesto: "Lead Content Producer",
    foto: "img/crew/daniela.jpg"
  },{
    nombre: "Sergio Ramos",
    puesto: "Lead Web Engineer",
    foto: "img/crew/sergio2.jpg"
  },{
    nombre: "Paulina Flores",
    puesto: "Sr. Designer & Motion",
    foto: "img/crew/paulina2.jpg"
  },{
    nombre: "Nora Iñigo",
    puesto: "Lead Desing & Branding",
    foto: "img/crew/nora.jpg"
  },{
    nombre: "Andrés Gómez",
    puesto: "PR & Sales Director",
    foto: "img/crew/andres.jpg"
  },{
    nombre: "Lizbeth Luna",
    puesto: "Sr. Web Engineer",
    foto: "img/crew/lizbeth2.jpg"
  },{
    nombre: "Alin Covarrubias",
    puesto: "Back Office",
    foto: "img/crew/alin.jpg"
  },{
    nombre: "Omar Castillo",
    puesto: "Web Engineer",
    foto: "img/crew/omar.jpg"
  },{
    nombre: "Michel Covarrubias",
    puesto: "Front Desk",
    foto: "img/crew/michel.jpg"
  },{
    nombre: "Angelo Stifano",
    puesto: "Sr. Designer & Space Plannig",
    foto: "img/crew/angelo.jpg"
  },{
    nombre: "Armando Ortíz",
    puesto: "Financial Manager",
    foto: "img/crew/armando.jpg"
  },{
    nombre: "Michel Medel",
    puesto: "Content & Media planner",
    foto: "img/crew/michelM2.jpg"
  },{
    nombre: "Stephanie Micha",
    puesto: "Marketing Consultant",
    foto: "img/crew/stephanie.jpg"
  },{
    nombre: "Charis Becerra",
    puesto: "U.X. Designer",
    foto: "img/crew/charis.jpg"
  },{
    nombre: "Carolina Lucio",
    puesto: "Content Producer",
    foto: "img/crew/caro2.jpg"
  },{
    nombre: "Pedro Spota",
    puesto: "Lead Media Planner",
    foto: "img/crew/pedro.jpg"
  },{
    nombre: "Alfredo Zaidan",
    puesto: "Creative",
    foto: "img/crew/alfredo2.jpg"
  },{
    nombre: "Regina Hugues",
    puesto: "Key Account Manager TreeHaus",
    foto: "img/crew/regina.jpg"
  },
  // {
  //   nombre: "Caché",
  //   puesto: "COO Inhaus",
  //   foto: "img/crew/.jpg"
  // },
  // {
  //   nombre: "Vanessa Balboa",
  //   puesto: "PR Manager",
  //   foto: "img/crew/.jpg"
  // },
  // {
  //   nombre: "Jhovan",
  //   puesto: "Producer",
  //   foto: "img/crew/.jpg"
  // },
  // {
  //   nombre: "Jero",
  //   puesto: "Sr. Creative",
  //   foto: "img/crew/.jpg"
  // },
  {
    nombre: "Alejandra Alonso",
    puesto: "Account Manager",
    foto: "img/crew/alejandra.jpg"
  },{
    nombre: "Antonio Elizaga",
    puesto: "Admin Inhaus",
    foto: "img/crew/antonio.jpg"
  },{
    nombre: "Alberto Langarica",
    puesto: "Sr. Design & Motion",
    foto: "img/crew/alberto.jpg"
  },{
    nombre: "Isabel Sampson",
    puesto: "Junior Producer",
    foto: "img/crew/isabel2.jpg"
  },{
    nombre: "Miguel Fernández",
    puesto: "AV. Producer",
    foto: "img/crew/mike.jpg"
  },{
    nombre: "Caren Galindo",
    puesto: "Junior Producer",
    foto: "img/crew/caren.jpg"
  },{
    nombre: "Rosy",
    puesto: "Haus Keeper",
    foto: "img/crew/rosy.jpg"
  },{
    nombre: "Oscar Maravilla",
    puesto: "Driver & Guardian Angel",
    foto: "img/crew/oscar.jpg"
  },{
    nombre: "Alejandro Fuch",
    puesto: "Post Producer",
    foto: "img/crew/fuch.jpg"
  },{
    nombre: "Daniela García",
    puesto: "Back Office",
    foto: "img/crew/danielaG.jpg"
  },{
    nombre: "Anita",
    puesto: "Kitchen Keeper",
    foto: "img/crew/anita.jpg"
  },{
    nombre: "Karla Jiménez",
    puesto: "CEO Puebla",
    foto: "img/crew/karla.jpg"
  },{
    nombre: "Mariana Partida",
    puesto: "COO Puebla",
    foto: "img/crew/mariana2.jpg"
  },{
    nombre: "Ana Paula Vega",
    puesto: "Sr. Designer & Creative Puebla",
    foto: "img/crew/anapau.jpg"
  },{
    nombre: "José Miguel Quintana",
    puesto: "Media Planner Puebla",
    foto: "img/crew/josemiguel.jpg"
  },{
    nombre: "José de Jesús Maldonado",
    puesto: "Content Producer Puebla",
    foto: "img/crew/joseJ.jpg"
  },{
    nombre: "Hammer Garita",
    puesto: "Web Developer Puebla",
    foto: "img/crew/hammer.jpg"
  }
  ];
});