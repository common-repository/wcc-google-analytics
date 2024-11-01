<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_settig'])) {

    $post = array( 
      "google_analytics_client_id" => isset($_POST['google_analytics_client_id']) ? sanitize_text_field($_POST['google_analytics_client_id']) : "",
      "google_analytics_client_secret" => isset($_POST['google_analytics_client_secret']) ? sanitize_text_field($_POST['google_analytics_client_secret']) : "",
    );

    foreach ($post as $key => $value) {
      update_option($key,$value);
    }
    $_SESSION['e_msg'] = 'Setting Update Successfully.';
  }

?>
<?php $google_analytics_client_id = get_option("google_analytics_client_id"); ?>
<?php $google_analytics_api_key = get_option("google_analytics_api_key"); ?>
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
<form action="" method="post" class="wpforms-form">
  <!-- <?php if($google_analytics_user_id && $google_analytics_page_id ){ ?>
    <p>Use This Sortcode To Add Review On Page Or Post<br/>[google_analytics]</p>
  <?php } ?> -->
  <h2 class="wp-heading-inline">Setting</h2>
  <div>
    <div class="tab">
      <div style="text-align: center; padding-bottom: 20px">
        <img src="<?php echo esc_url(plugins_url( '../img/logo.svg', __FILE__ )) ?>" width="150px">
        <h3 style="margin-bottom: 0px">Google Analytics</h3>
        <h4 style="margin-bottom: 0px">Version 1.0.0</h4>
        <p>Powered By <a href="https://www.virtualbrix.com" style="color: #17a2ea; font-weight: 700" title="Go to VirtualBrix's Website" target="_blank">VirtualBrix</a></p>
      </div>
      <hr/>
    </div>

   <div class="tabcontent" style="display: block;">
      <div class="wcc-full wcc-dashboard-table-setting">
       <table  style="width: 100%"> 
          <tbody>
            <tr>
              <td width="200" class=""><label class="form-label">WCC API Key</label></td>
              <td>
                <input type="text" value="<?php echo esc_attr($google_analytics_api_key) ?>" class="fbrev-page-id form-control wcc-dashboard-form-control" readonly placeholder="WCC API Key" style='width: 100%;background: #ddd;opacity: 0.7;'/>
              </td>
            </tr>
            <tr>
              <td width="200" class=""><label class="form-label">Client ID</label></td>
              <td>
                <input type="text" id="google_analytics_client_id" name="google_analytics_client_id" value="<?php echo esc_attr($google_analytics_client_id) ?>" class="fbrev-page-id form-control wcc-dashboard-form-control" placeholder="Client ID" style='width: 100%'/>
              </td>
            </tr>
            <tr>
              <td width="200" class=""><label class="form-label">Client Secret</label></td>
              <td>
                <input type="text" id="google_analytics_client_secret" name="google_analytics_client_secret" value="<?php echo esc_attr($google_analytics_client_secret) ?>" class="fbrev-page-id form-control wcc-dashboard-form-control" placeholder="Client Secret" style='width: 100%'/>
              </td>
            </tr>
          </tbody>
        </table>
        <table  style="width: 100%"> 
          <tbody>
            <tr>
              <td width="200"></td>
              <td>
                <input type="submit" name="save_settig" value="Save Settings" class="wcc-dashboard-btn">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="vb_clear_both"></div>
  </div>

</form>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>