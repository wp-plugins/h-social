<?php 
    $google_client = get_option( 'google_client' );
    $submit=$_POST['submit'];
    if(isset($submit)){
            if($google_client=='')
            {
                add_option( 'google_client', $_POST['client'], '', 'yes' );
            }
            else{
                update_option( 'google_client', $_POST['client'], '', 'yes' );
            }
    }
     $google_client = get_option( 'google_client' );
?>
<div class="row gauth">
<div class="bs-example col-md-10">
    <div class="panel panel-primary">
            <div class="panel-heading"><h4></b>Google client information</b></h4></div>
            <div class="panel-body">
                    <form name='frm' method="post" action="" class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label col-xs-2">Application name</label>
                            <div  class="col-xs-10"><input type='text' class="form-control" value="<?php echo ($google_client['app_name'])? $google_client['app_name']:''; ?>" name='client[app_name]' /></div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail" class="control-label col-xs-2">Client Id</label> 
                            <div  class="col-xs-10"><input type='text' class="form-control" value="<?php echo ($google_client['client_id'])? $google_client['client_id']:''; ?>" name='client[client_id]' /></div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label col-xs-2">Client secret</label> 
                            <div  class="col-xs-10"><input type='text' class="form-control" value="<?php echo ($google_client['client_secret'])? $google_client['client_secret']:''; ?>" name='client[client_secret]' /></div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail" class="control-label col-xs-2">Redirect uri</label>
                            <div  class="col-xs-10"><input type='text'class="form-control" value="<?php echo ($google_client['client_redirect_uri'])? $google_client['client_redirect_uri']:''; ?>" name='client[client_redirect_uri]' /></div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label col-xs-2"></label>
                            <div  class="col-xs-10"><input type='submit'class="btn btn-default" name='submit' value="Submit"></div>
                        </div>
            </form>
            <div>
           <p><b>Note:If you not create google client information than please refer the link <a href="admin.php?page=google_client_guide">Google client guide</a></b></p>
           <p>If you not install curl than first install curl.</p>
            </div>
    </div>
</div>
</div>    
</div>
