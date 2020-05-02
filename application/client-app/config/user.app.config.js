angular.
    module("appCore")
    .config(["$locationProvider", "$routeProvider", function ($locationProvider, $routeProvider) {

        $routeProvider
            .when("/wallet/", {
                template: "<dashboard-component></dashboard-component>"
            })
            .when("/wallet/accounts/", {
                template: "<accounts-component></accounts-component>"
            })
            .when("/wallet/transactions/", {
                template: "<transactions-component></transactions-component>"
            })
            .when("/wallet/buy/", {
                template: "<buy-component></buy-component>"
            })
            .when("/wallet/profile/", {
                template: "<profile-component></profile-component>"
            })
            .when("/wallet/profile/email/", {
                template: "<email-component></email-component>"
            })
            .when("/wallet/sell/", {
                template: "<sell-component></sell-component>"
            })
            .when("/wallet/send/btc/", {
                template: "<sendbtc-component></sendbtc-component>"
            })
            .when("/wallet/send/eth/", {
                template: "<sendeth-component></sendeth-component>"
            })
            .when("/wallet/accounts/btc/", {
                template: "<btc-component></btc-component>"
            })
            .when("/wallet/accounts/usd/", {
                template: "<usd-component></usd-component>"
            })
            .when("/wallet/accounts/usd/history/", {
                template: "<withdrawhistory-component></withdrawhistory-component>"
            })
            .when("/wallet/accounts/usd/edit-local-bank-transfer/", {
                template: "<editbank-component></editbank-component>"
            })
            .when("/wallet/accounts/usd/deposit/", {
                template: "<usddeposit-component></usddeposit-component>"
            })
            .when("/wallet/accounts/eth/", {
                template: "<eth-component></eth-component>"
            })
            .when("/wallet/mining/", {
                template: "<mining-component></mining-component>"
            })

            .when("/wallet/mining/pool/:id/", {
                template: "<miningpool-component></miningpool-component>"
            })

            .when("/wallet/mining/pool/config/:id/", {
                template: "<poolconfig-component></poolconfig-component>"
            })

            .when("/wallet/profile/kyc-verification/", {
                template:"<kycverification-component></kycverification-component>"
            })
            .when("/wallet/faq/", {
                template:"<faq-component></faq-component>"
            })
            
            .otherwise({
                template: `
                <div class="card" style="margin: 0 auto; width:400px; max-width:100%;">
    <div class="card-content">
        <div class="head-content">
            <div class="center">
                <br>
                <p style="font-size:20px; font-family: 'Open Sans', sans-serif; color:red"><b>
                    Object Not Found </b></p>

            </div>
        </div>
        <br>
        <div class="card-body" style="user-select:none;padding:10px; text-align:center;" id="bt">
            <div style="width:100px; margin:0 auto; max-width:100%">
                <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/error.png" alt="" style="width:100%" draggable="false">
            </div><br>
            <p><span style="color:red">
            The requested data could not be provided, it may be that the data has been removed or moved.
        </p>
            <br><br>
            
        </div>
    </div>
</div>
                `,
                controller: [function () {
                }]
            })
        $locationProvider.html5Mode(true)
    }])
    .run(function ($rootScope, $templateCache) {
        $rootScope.$on('$viewContentLoaded', function () {
            $templateCache.removeAll();
        })
    })