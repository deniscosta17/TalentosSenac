$(document).ready(function() {

	$('#lista-usuarios').perfectScrollbar();


});

var SenacApp = angular.module("SenacApp", ["ngMask"]);

SenacApp.controller("ResultadosFinalCtrl", ["$scope", "$http", "$timeout", function($scope, $http, $timeout) {
	
}]);

SenacApp.controller("ConfirmacaoController", ["$scope", "$http", "$timeout", function($scope, $http, $timeout) {
	$scope.participante = {busca: null};
	$scope.participants = [];
	$scope.totalDisplayed = 20;
	$scope.participante_selecionado = false;
	$scope.confirmado = false;
	$scope.esconder_formulario = false;
	$scope.participante_validado = false;
	$scope.mostrar_erro = false;

	$scope.pesquisar = function(newValue)
	{
		if(newValue && newValue.length >= 3) {

			$http({
				method: "POST",
				url: baseUrl + "participants/api_search",
				data: {newValue: newValue}
			}).then(function(resp) {
				$scope.participants = resp.data;
				$scope.totalDisplayed = 20;

				$('#lista-usuarios').perfectScrollbar('update');
			});
		}
	}

	$scope.$watch("participante_form.cpf", function(newValue, oldValue) {

		if(newValue && newValue == $scope.participante_selecionado.cpf)
		{
			$scope.participante_validado = true;
			$scope.mostrar_erro = false;
		} else {
			$scope.participante_validado = false;
			
			if(newValue && newValue.length >= 14)
			{
				$scope.mostrar_erro = true;
			}
		}
	});
	$scope.$watch("participante.busca", function(newValue, oldValue) {
		$scope.pesquisar(newValue);
	});

	$scope.aoDigitarBusca = function()
	{
		console.log("digitou!");
	};

	$scope.enviar = function()
	{
		$scope.confirmado = true;


		$http({
			method: "POST",
			url: baseUrl + "participants/api_save",
			data: {
				cpf: $scope.participante_selecionado.cpf,
				unidade: $scope.participante_selecionado.unidade,
				ocupacao: $scope.participante_selecionado.ocupacao,
				nome: $scope.participante_selecionado.name,
				email: $scope.participante_form.email,
				telefone: $scope.participante_form.telefone,
				participant_id: $scope.participante_selecionado.id
			}
		});

		$timeout(function() {

			$scope.esconder_formulario = true;
		}, 1500);
	}

	$scope.selecionarParticipante = function(participante)
	{
		$("#lista-usuarios").addClass("animated flipOutY");
		
		$scope.participante_selecionado = participante;

	};

	$scope.carregarMais = function()
	{
		$scope.totalDisplayed = $scope.totalDisplayed + 20;
				$('#lista-usuarios').perfectScrollbar('update');
	};

	$http.get(baseUrl + "participants/api_index").then(function (resp) {

		console.log("teste");

		$("#loading").hide();
		$("#carregar-mais").show();

		$scope.participants = resp.data;

		$('#lista-usuarios').perfectScrollbar('update');

	});
}]);

SenacApp.controller("ContatoCtrl", ["$scope", "$http", "$timeout", function($scope, $http, $timeout) {
	$scope.contato = {
		nome: null,
		email: null,
		telefone: null,
		unidade: 'Unidade',
		assunto: 'Assunto',
		mensagem: null,
		enviado: false
	};

	$scope.enviarContato = function(contato)
	{
		if($scope.ContatoForm.$valid)
		{
			$scope.contato.enviado = true;
			$scope.contato = {
				nome: null,
				email: null,
				telefone: null,
				unidade: 'Unidade',
				assunto: 'Assunto',
				mensagem: null,
				enviado: true
			};
			
			// Executa requisição POST para o Mandrill disparar o e-mail
			$http.post('https://mandrillapp.com/api/1.0/messages/send.json', {
				key: 'yo7eJ0r7FHX7d_Ney3OLZA',
				message: {
					html: $("#corpo_email").html(),
					text: $("#corpo_email").html(),
					subject: "[Talentos Senac] Contato do Site",
					from_email: "no-reply@bblender.com.br",
					from_name: 'Talentos Senac',
					to: [
						{
							email: "sac@rj.senac.br",
							name: "SAC Senac",
							type: "to"
						}
					]
				} 
			});
		}
	}
}]);