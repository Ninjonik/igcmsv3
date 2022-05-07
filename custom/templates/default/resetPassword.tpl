{include file="header.tpl"}
  <!-- End Navbar -->
  <div class="squares square1"></div>
  <div class="squares square2"></div>
  <div class="squares square3"></div>
  <div class="squares square4"></div>
  <div class="squares square5"></div>
  <div class="squares square6"></div>
  <div class="page-header">
    <div class="page-header-image"></div>
    <div class="container">
      <div class="col-lg-5 col-md-8 mx-auto">
        <div class="card card-login">
          <form class="form" method="post">
            <div class="card-header">
              <img class="card-img" src="../../custom/templates/default/assets/img/square-purple-1.png" alt="Card image">
              <h4 class="card-title">reset 2.</h4>
            </div>
            <div class="card-body">
        			<p>
        				{$loginerrorecho}
        			</p>
              <div class="input-group input-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="tim-icons icon-lock-circle"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Password" name="password">
              </div>
              <div class="input-group input-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="tim-icons icon-lock-circle""></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Confirm Password" name="passwordConfirm">
              </div>
            <div class="card-footer text-center">
			   <button name="submit" value="submit" class="btn btn-primary btn-round btn-lg btn-block">Odoslať</button>
            </div>
            <div class="pull-left ml-3 mb-3">
              <h6>
                <a href="register" class="link footer-link">Vytvoriť účet</a>
              </h6>
            </div>
            <div class="pull-right mr-3 mb-3">
              <h6>
                <a href="login" class="link footer-link">Prihlásiť sa</a>
              </h6>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
{include file="footer.tpl"}
