<?php $google_analytics_client_id = get_option("google_analytics_client_id"); ?>
<?php $google_analytics_client_secret = get_option("google_analytics_client_secret"); ?>
<?php $google_analytics_auth = get_option("google_analytics_auth"); ?>
<?php 
$redirect_uri = get_home_url();

$google_analytics_access_token = "";
$auth_url = "";
if($google_analytics_auth){
  $dd = google_analytics_GetRefreshToken($google_analytics_client_id,$google_analytics_client_secret,$google_analytics_auth['refresh_token']);
  if($dd){
    $google_analytics_access_token = $dd['access_token'];
  }
}
if(!$google_analytics_access_token){
   $auth_url = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/analytics.readonly') . '&redirect_uri=' . urlencode($redirect_uri) . '&response_type=code&client_id=' . $google_analytics_client_id . '&access_type=offline&approval_prompt=force&include_granted_scopes=true';
}
?>
<?php if(isset($_SESSION['e_msg']) && $_SESSION['e_msg']){ ?>
<div class="update-nag">Success : <?php echo esc_html($_SESSION['e_msg']); ?></div>
<br/>
<?php unset($_SESSION['e_msg']); } ?>
<?php if(isset($_SESSION['error_message']) && $_SESSION['error_message']){ ?>
<div class="update-nag error-message"><?php echo esc_html($_SESSION['error_message']); ?></div>
<br/>
<?php unset($_SESSION['error_message']); } ?>
<form action="<?php esc_url(menu_page_url('snippet-menu-function')) ?>" method="post" class="wpforms-form">
  <div class="wcc-full">
    <div>
      <?php if(!$google_analytics_access_token){ ?>
        <h1 class="wp-heading-inline wcc-text-center" style="line-height: 1.5">Login to you Google Account<br>which is linked to your google analytics</h1>
        <div class="wcc-text-center">
          <a href="<?php echo esc_url($auth_url) ?>" class="btn-my btn-danger btn-xs">Connect Google - Login</a>
        </div>
      <?php }else{ ?>
        <?php require_once(plugin_dir_path( __FILE__ ) .'analytics.php'); ?>
      <?php } ?>
    </div>
  </div>
</form>