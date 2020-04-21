angular.
module("appCore")
    .config(["$locationProvider", "$routeProvider", function($locationProvider, $routeProvider){
        
        $routeProvider
        .when("/wallet/", {
            template:"<dashboard-component></dashboard-component>"
        })
        .when("/wallet/accounts/", {
            template:"<accounts-component></accounts-component>"
        })
        .when("/wallet/transactions/", {
            template:"<transactions-component></transactions-component>"
        })
        .when("/wallet/buy/", {
            template:"<buy-component></buy-component>"
        })
        .when("/wallet/profile/", {
            template:"<profile-component></profile-component>"
        })
        .when("/wallet/profile/email/", {
            template:"<email-component></email-component>"
        })
        .when("/wallet/sell/", {
            template:"<sell-component></sell-component>"
        })
        .when("/wallet/send/btc/", {
            template:"<sendbtc-component></sendbtc-component>"
        })
        .when("/wallet/send/eth/", {
            template:"<sendeth-component></sendeth-component>"
        })
        .when("/wallet/accounts/btc/", {
            template:"<btc-component></btc-component>"
        })
        .when("/wallet/accounts/usd/", {
            template:"<usd-component></usd-component>"
        })
        .when("/wallet/accounts/usd/deposit/", {
            template:"<usddeposit-component></usddeposit-component>"
        })
        .when("/wallet/accounts/eth/", {
            template:"<eth-component></eth-component>"
        })
        .otherwise({
            template:"Page not found for this route",
            controller:[function(){
                
            }]
        })
        $locationProvider.html5Mode(true)
}])
.run(function($rootScope, $templateCache){
	$rootScope.$on('$viewContentLoaded', function(){
	$templateCache.removeAll();
	})
})