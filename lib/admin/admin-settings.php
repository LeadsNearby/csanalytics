<?php
/*******************************
  ADMIN INTERFACE PAGE
********************************/

function csanalytics_settings() { ?>
<script>
jQuery(document).ready(function() {
	
	jQuery(".tabs-menu a").click(function(event) {
		event.preventDefault();
		jQuery(this).parent().addClass("current");
		jQuery(this).parent().siblings().removeClass("current");
		var tab = jQuery(this).attr("href");
		jQuery(".tab-content").not(tab).css("display", "none");
		jQuery(tab).fadeIn();
	});	 

	jQuery('.gapi-next').on('click', function () {
	  jQuery(this).closest('.tab-content').hide();
	  jQuery(this).closest('.tab-content').next().show();
	  jQuery(this).closest('#tabs-container').find('li.current').removeClass('current').next().addClass('current');
	});
	
	//Admin Image loader Script
    var custom_uploader;

	jQuery('.upload_image_button').on( "click", function(e) {
 
	   var $el = jQuery(this);	
	   e.preventDefault();
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
			$el.closest('p').find('.upload_image').val(attachment.url);		
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });
	
	//Remove Media Button
	jQuery(".remove_media").click(function (e) {
		jQuery(this).closest("tr").find(".upload_image").val("");
		return false; // prevent default click action from happening!
		e.preventDefault(); // same thing as above
	});

	jQuery("#dev_client_payment_type").change(function() {
		var val = jQuery(this).val();
		if(val === "monthly") {
			jQuery("#dev_client_monthly_container").show();
			jQuery("#dev_client_perlead_container").hide();
		}
		else if(val === "perlead") {
			jQuery("#dev_client_perlead_container").show();
			jQuery("#dev_client_monthly_container").hide();
		}
	});
	
	var val = jQuery("#dev_client_payment_type").val();
	if(val === "monthly") {
		jQuery("#dev_client_monthly_container").show();
		jQuery("#dev_client_perlead_container").hide();		
	}
	if(val === "perlead") {
		jQuery("#dev_client_perlead_container").show();
		jQuery("#dev_client_monthly_container").hide();		
	}
	});
</script>

<?php
	$image_library_url = get_upload_iframe_src( 'image', null, 'library' );
	$image_library_url = remove_query_arg( array('TB_iframe'), $image_library_url );
	$image_library_url = add_query_arg( array( 'context' => 'jpg-default-image', 'TB_iframe' => 1 ), $image_library_url );
	//Gets Activation API Keys
	$csanalytics_license_key = trim( get_option( 'gapi_dev_license_key' ) );
	$csanalytics_license_status = get_option( 'gapi_dev_license_status' );
?>
<style>
#weather_enable {width: 20px !important;}
.gapi-submit-container {float: left;margin: 10px;width: 175px;}
.gapi-button {
    background: #0073aa none repeat scroll 0 0;
    border: medium none;
    border-radius: 10px;
    color: #fff;
    cursor: pointer;
    float: none;
    font-size: 14px;
    padding: 5%;
    text-align: center;
    width: 90%;
} 
.tabs-menu {
    height: 30px;
    clear: both;
    margin: 0;
}

.tabs-menu li {
    height: 30px;
    line-height: 30px;
    float: left;
    margin-right: 10px;
    background-color: #ccc;
    border-top: 1px solid #d4d4d1;
    border-right: 1px solid #d4d4d1;
    border-left: 1px solid #d4d4d1;
}

.tabs-menu li.current {
    position: relative;
    background-color: #fff;
    border-bottom: 1px solid #fff;
    z-index: 5;
}

.tabs-menu li a {
    padding: 10px;
    text-transform: uppercase;
    color: #fff;
    text-decoration: none; 
}

.tabs-menu .current a {
    color: #2e7da3;
}

.tab {
    border: 1px solid #d4d4d1;
    background-color: #fff;
    margin-bottom: 20px;
    width: auto;
    padding-bottom: 20px;
}

.tab-content {
    width: 1000px;
    padding: 20px 20px 0;
    display: none;
}

#tab-1 {
 display: block;   
}

</style>
<div id="tabs-container">
<div id="analytics-logo" style="margin:1% 0"><img src="<?php echo plugins_url('/csanalytics/lib/admin/images/lnb-logo-blk.png'); ?>" /></div>
<p style="font-size: 20px; width: 90%;">Welcome to CSAnalytics by LeadsNearby. LeadsNearby offers the most comprehensive local search marketing in the industry. Our analytics will provide you an indepth look at how your business is progressing while LeadsNearby. Our real-time ROI data board will give insite on how your website is performing for you. All additional data boards will give the information you need to understand how your real-time ROI is calculated.</p>
    <ul class="tabs-menu">
        <li class="current"><a href="#tab-1">Client Settings</a></li>
        <li><a href="#tab-2">Google API</a></li>
        <li><a href="#tab-3">CYFE Data</a></li>
        <li><a href="#tab-4">Convirza/Chat Data</a></li>
        <li><a href="#tab-5">Heatmap</a></li>
        <li><a href="#tab-6">LNB Data</a></li>
        <li><a href="#tab-7">Weather Data</a></li>
        <li><a href="#tab-8">ServiceTitan</a></li>
		<li><a href="#tab-9">OntraPort</a></li>
    </ul>
    <div class="tab">
		<form method="post" action="">
        <div id="tab-1" class="tab-content">
			<fieldset>
				<table class="form-table">			
					<tr>
						<td>
							<label for="dev_email"><?php _e( 'Clients Primary Industry', 'inputname' ); ?></label><br />
							<em>Select the clients primary industry.</em><br />
							<select class="col-input body-style" name="dev_industry" id="dev_industry">
								<option value="hvac" <?php if(get_option('gapi_dev_industry') == 'hvac'){?>selected="selected"<?php }?>>HVAC Industry</option>
								<option value="plumbing" <?php if(get_option('gapi_dev_industry') == 'plumbing'){?>selected="selected"<?php }?>>Plumbing Industry</option>
								<option value="electrical" <?php if(get_option('gapi_dev_industry') == 'electrical'){?>selected="selected"<?php }?>>Electrical Industry</option>
                                <option value="other" <?php if(get_option('gapi_dev_industry') == 'other'){?>selected="selected"<?php }?>>Other Great Industries</option>
								<option value="custom" <?php if(get_option('gapi_dev_industry') == 'custom'){?>selected="selected"<?php }?>>Custom Settings</option>
							</select>
						</td>
					</tr>						
					<tr>
						<td>
							<label for="dev_email"><?php _e( 'Client Payment Type', 'inputname' ); ?></label><br />
							<em>Select the clients payment type.</em><br />						
							<select class="col-input body-style" name="dev_client_payment_type" id="dev_client_payment_type">
								<option value="monthly" <?php if(get_option('gapi_dev_client_payment_type') == 'monthly'){?>selected="selected"<?php }?>>Monthly</option>
								<option value="perlead" <?php if(get_option('gapi_dev_client_payment_type') == 'perlead'){?>selected="selected"<?php }?>>Per Lead</option>
							</select>
						</td>
					</tr>
					<tr id="dev_client_perlead_container">
						<td>
							<label for="dev_client_perlead"><?php _e( 'Per Lead Rate', 'inputname' ); ?></label><br />
							<em>Please the per lead rate dollar amount. No symbols, only whole numbers ex: 1500</em><br />					
							<input name="dev_client_perlead" type="text" id="dev_client_perlead" class="col-input body-style" value="<?php echo get_option('gapi_dev_client_perlead'); ?>" class="regular-text" />
						</td>
					</tr>
					<tr id="dev_client_monthly_container">
						<td>
							<label for="dev_client_monthly"><?php _e( 'Current Monthly Payment', 'inputname' ); ?></label><br />
							<em>Please the monthly dollar amount. No symbols, only whole numbers ex: 1500</em><br />					
							<input name="dev_client_monthly" type="text" id="dev_client_monthly" class="col-input body-style" value="<?php echo get_option('gapi_dev_client_monthly'); ?>" class="regular-text" />
						</td>
					</tr>						
				</table>
			</fieldset>	
			<div class="gapi-submit-container">
				<div class="gapi-button gapi-next">Next</div>
			</div>				
        </div>
        <div id="tab-2" class="tab-content">
			<fieldset>
				<table class="form-table">
				<tr>
					<td>
						<label for="dev_email"><?php _e( 'Google Developer Email Address', 'inputname' ); ?></label><br />
						<em>Enter the Google Developer email address.</em><br />					
						<input name="dev_email" type="text" id="dev_email" class="col-input body-style" value="<?php echo get_option('gapi_dev_email'); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="dev_key"><?php _e( 'P12 File Location', 'inputname' ); ?></label><br />
						<em>Enter the URL for the P12 File</em><br />					
						<input name="dev_key" type="text" id="dev_key" class="upload_image col-input body-style" value="<?php echo get_option('gapi_dev_key'); ?>" />
						<!--<span class="wp-media-buttons"><a title="Add Media" data-editor="bio" class="button upload_image_button add_media" href="#"><span class="wp-media-buttons-icon"></span> Add Media</a></span><span class="wp-media-remove"><a title="Remove Media" data-editor="removal" class="button remove_image_button remove_media" href="#"><span class="wp-media-buttons-icon"></span> Remove</a></span>-->						
					</td>
				</tr>
				<tr>
					<td>
						<label for="dev_profile"><?php _e( 'Analytics Profile ID', 'inputname' ); ?></label><br />
						<em>Enter your Google Analytics Profile ID</em><br />					
						<input name="dev_profile" type="text" id="dev_profile" class="col-input body-style" value="<?php echo get_option('gapi_dev_profile'); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="speed_enable"><?php _e( 'Enable Site Speed Data', 'inputname' ); ?></label><br />
						<input id="speed_enable" name="speed_enable" type="checkbox" value="1" <?php checked( '1', get_option( 'gapi_speed_enable' ) ); ?> />
						<em>Cliek to enable Google Site Speed Data.</em>
					</td>
				</tr>
                <tr>
					<td>
						<label for="adwords_enable"><?php _e( 'Enable AdWords Data', 'inputname' ); ?></label><br />
						<input id="adwords_enable" name="adwords_enable" type="checkbox" value="1" <?php checked( '1', get_option( 'gapi_adwords_enable' ) ); ?> />
						<em>Cliek to display Google Ad Words data. AdWords must be tied to Google Analytics for this to work properly.</em>
					</td>
				</tr>				
				<tr>
					<td>
						<label for="dev_tag_mgr"><?php _e( 'Google Tag Manager Script', 'inputname' ); ?></label><br />
						<em>Enter your Google Tag Manager Script</em><br />					
						<textarea name="dev_tag_mgr" type="text" id="dev_tag_mgr" class="col-input body-style"  rows="20" cols="50"><?php echo stripslashes (get_option('gapi_dev_tag_mgr')); ?></textarea>
					</td>
				</tr>					
				</table>
			</fieldset>	
			<div class="gapi-submit-container">
				<div class="gapi-button gapi-next">Next</div>
			</div>			
        </div>
        <div id="tab-3" class="tab-content">
			<fieldset>
				<table class="form-table">
				<tr>
					<td>
						<label for="dev_adwords_url"><?php _e( 'Cyfe AdWords URL', 'inputname' ); ?></label><br />
						<em>Please enter the Cyfe AdWords URL</em><br />					
						<input name="dev_adwords_url" type="text" id="dev_adwords_url" class="col-input body-style" value="<?php echo get_option('gapi_dev_adwords_url'); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="dev_social_url"><?php _e( 'Cyfe Social URL', 'inputname' ); ?></label><br />
						<em>Please enter the Cyfe Social URL</em><br />					
						<input name="dev_social_url" type="text" id="dev_social_url" class="col-input body-style" value="<?php echo get_option('gapi_dev_social_url'); ?>" class="regular-text" />
					</td>
				</tr>					
				</table>
			</fieldset>	
			<div class="gapi-submit-container">
				<div class="gapi-button gapi-next">Next</div>
			</div>			
        </div>        
        <div id="tab-4" class="tab-content">
			<fieldset>
				<table class="form-table">
				<tr>
					<td>
						<label for="dev_conv_profile"><?php _e( 'Convirza External ID', 'inputname' ); ?></label><br />
						<em>Enter your Convirza External ID</em><br />					
						<input name="dev_conv_profile" type="text" id="dev_conv_profile" class="col-input body-style" value="<?php echo get_option('gapi_dev_conv_profile'); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="dev_conv_script"><?php _e( 'Convirza DNI Script', 'inputname' ); ?></label><br />
						<em>Enter your Convirza DNI Script</em><br />					
						<textarea name="dev_conv_script" type="text" id="dev_conv_script" class="col-input body-style"  rows="20" cols="50"><?php echo stripslashes (get_option('gapi_dev_conv_script')); ?></textarea>
					</td>
				</tr>	
				<tr>
					<td>
						<label for="dev_chat"><?php _e( 'Number of Chats', 'inputname' ); ?></label><br />
						<em>Please enter the number of chats</em><br />					
						<input name="dev_chat" type="text" id="dev_chat" class="col-input body-style" value="<?php echo get_option('gapi_dev_chat'); ?>" class="regular-text" />
					</td>
				</tr>					
				</table>
			</fieldset>	
			<div class="gapi-submit-container">
				<div class="gapi-button gapi-next">Next</div>
			</div>			
        </div>
        <div id="tab-5" class="tab-content">
			<fieldset>
				<table class="form-table">
				<tr>
					<td>
						<label for="dev_heatmap_script"><?php _e( 'Heatmap Script', 'inputname' ); ?></label><br />
						<em>Heatmap Script</em><br />					
						<textarea name="dev_heatmap_script" type="text" id="dev_heatmap_script" class="col-input body-style"  rows="20" cols="50"><?php echo stripslashes (get_option('gapi_dev_heatmap_script')); ?></textarea>
					</td>
				</tr>		
				<tr>
					<td>
						<label for="dev_heatmap_page"><?php _e( 'Heatmap Display Home Page', 'inputname' ); ?></label><br />
						<em>Enter link to Display Home Page Heatmap</em><br />					
						<input name="dev_heatmap_page" type="text" id="dev_heatmap_page" class="col-input body-style" value="<?php echo get_option('gapi_dev_heatmap_page'); ?>" class="regular-text" />
					</td>
				</tr>				
				</table>
			</fieldset>	
			<div class="gapi-submit-container">
				<div class="gapi-button gapi-next">Next</div>
			</div>			
        </div>		
        <div id="tab-6" class="tab-content">
			<fieldset>
				<table class="form-table">
				<tr>
					<td>
						<label for="dev_keyword_rank"><?php _e( 'LNB Keyword Ranking CSV Location', 'inputname' ); ?></label><br />
						<em>Please enter the website URL for the Keyword Ranking CSV file</em><br />					
						<input name="dev_keyword_rank" type="text" id="dev_keyword_rank" class="col-input body-style" value="<?php echo get_option('gapi_dev_keyword_rank'); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="dev_web_rank_url"><?php _e( 'LNB Web Ranking URL', 'inputname' ); ?></label><br />
						<em>Please enter the website URL for the webrank reports</em><br />					
						<input name="dev_web_rank_url" type="text" id="dev_web_rank_url" class="col-input body-style" value="<?php echo get_option('gapi_dev_web_rank_url'); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="dev_bl_citations"><?php _e( 'Bright Local Citations', 'inputname' ); ?></label><br />
						<em>Please enter the Bright Local Citations URL</em><br />					
						<input name="dev_bl_citations" type="text" id="dev_bl_citations" class="col-input body-style" value="<?php echo stripslashes (get_option('gapi_dev_bl_citations')); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="dev_bl_reviews"><?php _e( 'Bright Local Reviews', 'inputname' ); ?></label><br />
						<em>Please enter the Bright Local Reviews URL</em><br />					
						<input name="dev_bl_reviews" type="text" id="dev_bl_reviews" class="col-input body-style" value="<?php echo stripslashes (get_option('gapi_dev_bl_reviews')); ?>" class="regular-text" />
					</td>
				</tr>
				</table>
			</fieldset>	
			<div class="gapi-submit-container">
				<div class="gapi-button gapi-next">Next</div>
			</div>		
        </div>
		<div id="tab-7" class="tab-content">
			<fieldset>
				<table class="form-table">
				<tr>
					<td>
						<label for="weather_enable"><?php _e( 'Enable Weather Data Features', 'inputname' ); ?></label><br />
						<em>Cliek to enable Weather Data Features</em>
						<input id="weather_enable" name="weather_enable" type="checkbox" value="1" <?php checked( '1', get_option( 'gapi_weather_enable' ) ); ?> />
					</td>
				</tr>
				<tr>
					<td>
						<label for="weather_api"><?php _e( 'Weather Data API Key', 'inputname' ); ?></label><br />
						<em>Please free API Key obtained from <a href="https://developer.worldweatheronline.com/">https://developer.worldweatheronline.com/</a></em><br />					
						<input name="weather_api" type="text" id="weather_api" class="col-input body-style" value="<?php echo get_option('gapi_weather_api'); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="weather_zip"><?php _e( 'Weather Data Zip Code', 'inputname' ); ?></label><br />
						<em>Please enter the zip for weather data</em><br />					
						<input name="weather_zip" type="text" id="weather_zip" class="col-input body-style" value="<?php echo get_option('gapi_weather_zip'); ?>" class="regular-text" />
					</td>
				</tr>					
				</table>
			</fieldset>
			<div class="gapi-submit-container">
				<div class="gapi-button gapi-next">Next</div>
			</div>									
        </div>
		<div id="tab-8" class="tab-content">
			<fieldset>
				<table class="form-table">
    				<tr>
    					<td>
    						<label for="dev_servicetitan_apikey"><?php _e( 'ServiceTitan API Key', 'inputname' ); ?></label><br />
    						<em>Please enter the Service Titan API Key</em><br />					
    						<input name="dev_servicetitan_apikey" type="text" id="dev_servicetitan_apikey" class="col-input body-style" value="<?php echo get_option('gapi_dev_servicetitan_apikey'); ?>" class="regular-text" />
    					</td>
    				</tr>					
				</table>
			</fieldset>
			<div class="gapi-submit-container">
				<div class="gapi-button gapi-next">Next</div>
			</div>									
        </div>        
        <div id="tab-9" class="tab-content">
		<fieldset>
				<table class="form-table">
				<tr>
					<td>
						<label for="dev_ontraport_enable"><?php _e( 'Enable OntraPort Data Features', 'inputname' ); ?></label><br />
						<em>Click to enable OntraPort Data Features</em>
						<input id="dev_ontraport_enable" name="dev_ontraport_enable" type="checkbox" value="1" <?php checked( '1', get_option( 'gapi_dev_ontraport_enable' ) ); ?> />
					</td>
				</tr>
				<tr>
					<td>
						<label for="dev_ontraport_clientkey"><?php _e( 'OntraPort Client Key', 'inputname' ); ?></label><br />
						<em>Please enter the LeadsNearby OntraPort Client Key</em><br />					
						<input name="dev_ontraport_clientkey" type="text" id="dev_ontraport_clientkey" class="col-input body-style" value="<?php echo get_option('gapi_dev_ontraport_clientkey'); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="dev_ontraport_apikey"><?php _e( 'OntraPort API Key', 'inputname' ); ?></label><br />
						<em>Please enter the OntraPort API Key obtained from <a href="https://app.ontraport.com/#!/api_settings/listAll">https://app.ontraport.com/#!/api_settings/listAll</a></em><br />					
						<input name="dev_ontraport_apikey" type="text" id="dev_ontraport_apikey" class="col-input body-style" value="<?php echo get_option('gapi_dev_ontraport_apikey'); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="dev_ontraport_appid"><?php _e( 'OntraPort App ID', 'inputname' ); ?></label><br />
						<em>Please enter the OntraPort API Key obtained from <a href="https://app.ontraport.com/#!/api_settings/listAll">https://app.ontraport.com/#!/api_settings/listAll</a></em><br />					
						<input name="dev_ontraport_appid" type="text" id="dev_ontraport_appid" class="col-input body-style" value="<?php echo get_option('gapi_dev_ontraport_appid'); ?>" class="regular-text" />
					</td>
				</tr>					
				</table>
			</fieldset>		
        </div>
		<p class="gapi-submit-container">
			<input style="background:green" type="submit" name="Submit" class="gapi-button" value="Save Changes" />
			<input type="hidden" name="csanalytics_settings" value="save" style="display:none;" />
		</p>
		<div class="clear"></div>
		</form>	
    </div>
</div>
<?php }