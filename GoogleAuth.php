<?php

require_once 'vendor/autoload.php';
require_once 'Core/Dotenv.php';

// Init configuration.
class GoogleAuthenticator {
    private $clientID = "";
    private $clientSecret = "";
    private $redirectUri = "";
    private $client;

    public function __construct() {
        $env = new Dotenv();
        $this->clientID = $_ENV['clientID'] ?? '';
        $this->clientSecret = $_ENV['clientSecret'] ?? '';
        $this->redirectUri = $_ENV['redirectUri'] ?? '';

        if (!empty($this->clientID) && !empty($this->clientSecret) && !empty($this->redirectUri)) {
            $this->client = new Google\Client;
            $this->client->setClientId($this->clientID);
            $this->client->setClientSecret($this->clientSecret);
            $this->client->setRedirectUri($this->redirectUri);
            $this->client->addScope("email");
            $this->client->addScope("profile");
        }
        else {
            throw new Exception("Missing client ID, client secret, or redirect URI.");
        }
    }
    /**
     * Function to Authorize url.
     *
     * @return void
     */
    public function getAuthorizationUrl() {
        if (!empty($this->client)) {
            return $this->client->createAuthUrl();
        }
        else {
            throw new Exception("Google client is not initialized.");
        }
    }

    /**
     * Function to Authenticate url.
     *
     * @return void
     */
    public function authenticate() {
        if (isset($_GET['code'])) {
            $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
            $this->client->setAccessToken($token['access_token']);
            $google_oauth = new Google\Service\Oauth2($this->client);
            $google_account_info = $google_oauth->userinfo->get();
            $email = $google_account_info->email;
            session_start();
            $_SESSION['Email_id'] = $email;
            header('location:/home');
        }
    }
}
