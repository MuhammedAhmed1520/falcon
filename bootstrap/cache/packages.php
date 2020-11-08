<?php return array (
  'aacotroneo/laravel-saml2' => 
  array (
    'providers' => 
    array (
      0 => 'Aacotroneo\\Saml2\\Saml2ServiceProvider',
    ),
  ),
  'adldap2/adldap2-laravel' => 
  array (
    'providers' => 
    array (
      0 => 'Adldap\\Laravel\\AdldapServiceProvider',
      1 => 'Adldap\\Laravel\\AdldapAuthServiceProvider',
    ),
    'aliases' => 
    array (
      'Adldap' => 'Adldap\\Laravel\\Facades\\Adldap',
    ),
  ),
  'artisaninweb/laravel-soap' => 
  array (
    'providers' => 
    array (
      0 => 'Artisaninweb\\SoapWrapper\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'SoapWrapper' => 'Artisaninweb\\SoapWrapper\\Facade',
    ),
  ),
  'beyondcode/laravel-dump-server' => 
  array (
    'providers' => 
    array (
      0 => 'BeyondCode\\DumpServer\\DumpServerServiceProvider',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'hisorange/browser-detect' => 
  array (
    'providers' => 
    array (
      0 => 'hisorange\\BrowserDetect\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Browser' => 'hisorange\\BrowserDetect\\Facade',
    ),
  ),
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'laravel/nexmo-notification-channel' => 
  array (
    'providers' => 
    array (
      0 => 'Illuminate\\Notifications\\NexmoChannelServiceProvider',
    ),
  ),
  'laravel/slack-notification-channel' => 
  array (
    'providers' => 
    array (
      0 => 'Illuminate\\Notifications\\SlackChannelServiceProvider',
    ),
  ),
  'laravel/socialite' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Socialite\\SocialiteServiceProvider',
    ),
    'aliases' => 
    array (
      'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'laravelcollective/html' => 
  array (
    'providers' => 
    array (
      0 => 'Collective\\Html\\HtmlServiceProvider',
    ),
    'aliases' => 
    array (
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
    ),
  ),
  'matthewbdaly/laravel-azure-storage' => 
  array (
    'providers' => 
    array (
      0 => 'Matthewbdaly\\LaravelAzureStorage\\AzureStorageServiceProvider',
    ),
  ),
  'metrogistics/laravel-azure-ad-oauth' => 
  array (
    'providers' => 
    array (
      0 => 'Metrogistics\\AzureSocialite\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'AzureUser' => 'Metrogistics\\AzureSocialite\\AzureUserFacade',
    ),
  ),
  'mews/captcha' => 
  array (
    'providers' => 
    array (
      0 => 'Mews\\Captcha\\CaptchaServiceProvider',
    ),
    'aliases' => 
    array (
      'Captcha' => 'Mews\\Captcha\\Facades\\Captcha',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'rootinc/laravel-azure-middleware' => 
  array (
    'providers' => 
    array (
      0 => 'RootInc\\LaravelAzureMiddleware\\AzureServiceProvider',
    ),
  ),
  'tymon/jwt-auth' => 
  array (
    'aliases' => 
    array (
      'JWTAuth' => 'Tymon\\JWTAuth\\Facades\\JWTAuth',
      'JWTFactory' => 'Tymon\\JWTAuth\\Facades\\JWTFactory',
    ),
    'providers' => 
    array (
      0 => 'Tymon\\JWTAuth\\Providers\\LaravelServiceProvider',
    ),
  ),
);