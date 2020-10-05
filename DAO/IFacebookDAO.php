<?php
    namespace DAO;

    use DAO\Connection as Connection;

    interface IFacebookDAO
    {
        function makeFacebookApiCall( $endpoint, $params );
        function getFacebookLoginUrl();
        function getAccessTokenWithCode( $code );
        function getFacebookUserInfo( $accessToken );
        function tryAndLoginWithFacebook( $get );
        function getDebugAccessTokenInfo( $accessToken );
    }
?>