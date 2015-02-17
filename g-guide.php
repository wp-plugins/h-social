<div class="row gauth">
  <div class="col-md-10">
      <div class="panel panel-primary">
            <div class="panel-heading"><h4></b>Google client Guide</b></h4></div>
            <div class="panel-body">
                    <ol class="list-unstyled">
                      <li>
                        Go to the <a target="dev-console" href="https://console.developers.google.com/">Google Developers Console</a>.
                      </li>
                      <li>
                        
                        Select a project,
                        or create a new one by clicking <b>Create Project</b>:
                          
                        
                        <p style="margin: .5em 0 .5em;" class="note">
                            <b>Note:</b>  Use a single project to hold all platform instances of your app
                            (Android, iOS, web, etc.), each with a different Client ID.
                        </p>
                          
                        <ol>
                          <li>
                            In the <b>Project name</b> field, type in a name for your project.
                          </li>
                          <li>
                            In the <b>Project ID</b> field, optionally type in a project ID for
                            your project or use the one that the console has created for you.
                            This ID must be unique world-wide.
                          </li>
                          <li>
                            Click the <b>Create</b> button and wait for the project to be created.
                          </li>
                          <li>
                            Click on the new project name in the list to start editing the project.
                          </li>
                        </ol>
                      </li>
                      
                      <li>
                        In the left sidebar, select the <b>APIs</b> item below "APIs &amp; auth".
                        A list of Google web services appears.
                      </li>
                      <li>
                        Find the <b>Google+ API</b> service and set its status to
                        <b>ON</b>&mdash;notice that this action moves the service to the top of
                        the list.
                        
                        You can turn off the Google Cloud services.
                          
                      </li>
                     
                      <li>
                        In the sidebar under "APIs &amp; auth", select <b>Consent screen</b>.
                        <ol>
                          <li>
                            Choose an <b>Email Address</b> and specify a <b>Product Name</b>.
                          </li>
                        </ol>
                      </li>
                      
                      <li>
                        In the sidebar under "APIs &amp; auth", select <b>Credentials</b>.
                      </li>
                      <li>
                        Click <b>Create a new Client ID</b> &mdash; a
                        dialog box appears.
                        <br>
                        Register the origins from which your app is allowed to access the Google APIs,
                        as follows. An origin is a unique combination of protocol, hostname, and port.
                        <ol>
                          <li>
                            In the <b class="uitext">Application type</b> section of the dialog, select
                            <b>Web application</b>.
                          </li>
                          <li>
                            In the <b class="uitext">Authorized JavaScript origins</b> field, enter the origin
                            for your app. You can enter multiple origins to allow for your app to run on different
                            protocols, domains, or subdomains.  Wildcards are not allowed. In the example below,
                            the second URL could be a production URL.

                      <pre class="prettyprint">
                          <span class="pln">For Authorized JavaScript origins:</br/></span>                           
                          <span class="pln">if you use localhost in wordpress than please write url is</span>
                          <span class="pln">http</span><span class="pun">:</span><span class="com">//localhost:9090<br/></span>
                          <span class="pln">else</span> 
                          <span class="pln">https</span><span class="pun">:</span><span class="com">https://www.example.com</span>

                           

                           <span class="pln">For Authorized redirect URIs :</br/></span>
                           <span class="pln">if you use wordpress than please write redirect url is</span>
                           <span class="pln">'http://localhost/PROJECTNAME/wp-login.php'</span>
                           <span class="pln">else</span> 
                          <span class="pln">https</span><span class="pun">:</span><span class="com">//myproductionurl.example.com</span></pre>
                     
                          </li>
                          
                          <li>
                            In the <b class="uitext">Authorized redirect URI</b> field,
                            delete the default value.  It is not used for this case.
                          </li>
                            
                          <li>
                            Click the <b>Create Client ID</b> button.
                          </li>
                        </ol>
                      </li>
                      
                      <li>
                        In the resulting <b class="uitext">Client ID for web application</b> section,
                        copy the <b class="uitext">Client ID</b>
                        
                        and <b class="uitext">Client secret</b>
                        
                        that your app will need to use to access the APIs.
                      </li>
                    </ol>  

            </div>
            </div>
  </div>  
</div>
