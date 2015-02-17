<?php
require_once 'src/apiClient.php';
require_once 'src/contrib/apiPlusService.php';
session_start();
$client = new apiClient();
//$client->setApplicationName("login with google");
//$client->setScopes(array('https://www.googleapis.com/auth/plus.me'));
$client->setScopes(array('https://www.googleapis.com/auth/plus.me','https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/userinfo.profile'));
$plus = new apiPlusService($client);
    if (isset($_GET['code'])) {
      $client->authenticate();
      $_SESSION['access_token'] = $client->getAccessToken();
      $client->setAccessToken($_SESSION['access_token']);
      header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
    }
    if (isset($_REQUEST['logout']) || isset($_REQUEST['loggedout'])) {
          $client->revokeToken();
          session_destroy();
          unset($_COOKIE);
          wp_logout();
          $authUrl = $client->createAuthUrl();
          $getAccessToken='';
          $me='';
     }
     else
     {
          if (isset($_GET['code'])) {
            $client->authenticate();
            $_SESSION['access_token'] = $client->getAccessToken();
            header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
          }

          if (isset($_SESSION['access_token'])) {
            $client->setAccessToken($_SESSION['access_token']);
          }
          if ($client->getAccessToken()) {
            $me = $plus->people->get('me');
            $optParams = array('maxResults' => 100);
            $activities = $plus->activities->listActivities('me', 'public',$optParams);
            // The access token may have been updated lazily.
            $_SESSION['access_token'] = $client->getAccessToken();
             $authUrl = '';
          }
          else{
             $authUrl = $client->createAuthUrl();
          }
     }
?>
<div>
 <?php 
 if(isset($me) && count($me)>1)
 { 
    $email_address=$me['emails']['0']['value'];
    if(username_exists( $email_address )) {
   
          $Newid=username_exists( $email_address );
          $_SESSION['wp_user_id']=$Newid;

          $secure_cookie = is_ssl();
          $secure_cookie = apply_filters('secure_signon_cookie', $secure_cookie, array());
          wp_set_auth_cookie($Newid ,true, $secure_cookie); //log in the user on wordpress
          wp_redirect( home_url().'/wp-admin' );
          $user_info = get_userdata($Newid);
          do_action('wp_login', $user_info->user_login, $user_info);
    }
    else{
          $password = wp_generate_password( 12, false );
          $user_id = wp_create_user( $email_address, $password, $email_address );
          wp_update_user(
          array(
          'ID'          =>    $user_id,
          'nickname'    =>    $email_address
          )
          );
          $user = new WP_User( $user_id );
          $user->set_role( 'subscriber' );
          wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $password );
          if ($user_id) 
          { // Login
                $_SESSION['wp_user_id']=$user_id;
                $secure_cookie = is_ssl();
                $secure_cookie = apply_filters('secure_signon_cookie', $secure_cookie, array());
                wp_set_auth_cookie($user_id ,true, $secure_cookie); //log in the user on wordpress
                wp_redirect( home_url().'/wp-admin' );
                $user_info = get_userdata($user_id);
                do_action('wp_login', $user_info->user_login, $user_info); 
           
          }

    }
 }
 else{
          wp_clear_auth_cookie();
          $client->revokeToken();
          session_destroy();
          unset($_COOKIE);
          wp_logout();
          $authUrl = $client->createAuthUrl();
          $getAccessToken='';
          $me='';
  } 
?>

<?php
  if(isset($authUrl)) {
	$plugin_url =  plugins_url('h-social');
    print "<a class='login' href='$authUrl'><img src='".$plugin_url."/images/sign-in-with-google.png' height='40'/> </a>";
  }
?><br/>
</div>
