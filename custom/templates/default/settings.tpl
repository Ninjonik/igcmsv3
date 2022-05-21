{include file="header.tpl"}
{foreach from=$row2s item=$rowsmarty2}
{/foreach}
  <div class="wrapper">
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="section">
              <!-- User Information -->
              <form enctype="multipart/form-data" method="post">
              <section class="text-center">
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                  <div class="fileinput-new thumbnail img-circle img-raised">
                    <img src="{$avataruser}" alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                  <div>
                    <span class="btn btn-raised btn-round btn-default btn-file">
                      <span class="fileinput-new">Add Photo</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="file" id="file">
                    </span>
                    <br>
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists btn-simple" data-dismiss="fileinput"><i class="tim-icons icon-simple-remove"></i> Remove</a>
                    <button name="submita" value="submita" class="btn btn-primary btn-round">Nahrať</button>
                  </div>
                  > 800x600, max 10MB, png jpg gif
                </div>
                <h3 class="title">{$rowsmarty2['username']}</h3>
              </section>
            </form>
              <!-- User Information -->
              <!-- Profile Sidebar -->
              <section>
                <br>
                <ul class="nav flex-column" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                      <i class="tim-icons icon-single-02"></i> Základné
                    </a>
                  </li>
                  <hr class="line-primary">
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                      <i class="tim-icons icon-lock-circle"></i> Úprava profilu
                    </a>
                  </li>
                </ul>
              </section>
              <!-- End Profile Sidebar -->
            </div>
          </div>
          <div class="col-md-8 ml-auto">
            <div class="section">
              <form method="post">
              <div class="tab-content">
                <div class="tab-pane active" id="link1">
                  <div>
                    <header>
                      <h2 class="text-uppercase">General information</h2>
                    </header>
                    <hr class="line-primary">
                    <br>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#username">Username</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <div class="form-group">
                          <input id="username" name="username" class="form-control" type="text" value="{$rowsmarty2['username']}" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#firstName">First Name</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <div class="form-group">
                          <input id="firstName" name="firstName" class="form-control" type="text" value="{$rowsmarty2['first_name']}" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#lastName">Last Name</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <div class="form-group">
                          <input id="lastName" name="lastName" class="form-control" type="text" value="{$rowsmarty2['last_name']}" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels">I’m</label>
                      </div>
                      <div class="col-md-4 align-self-center">
                        <div class="form-group">
                          <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Single Select" name="genderselect">
                            <option disabled selected>Gender</option>
                            <option value="0" {$male}>Male</option>
                            <option value="1" {$female}>Female</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#email">Email</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <div class="form-group">
                          <input id="email" name="email" class="form-control" type="email" value="{$rowsmarty2['email']}" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#location">Your Location</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <div class="form-group">
                          <input id="location" name="location" class="form-control" type="text" value="{$rowsmarty2['location']}" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#phone">Phone Number</label>
                      </div>
                      <div class="col-md-4 align-self-center">
                        <div class="form-group">
                          <input id="phone" name="phone" class="form-control" type="tel" value="{$rowsmarty2['phone_number']}" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels">Language</label>
                      </div>
                      <div class="col-md-4 align-self-center">
                        <div class="form-group">
                          <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Single Select">
                            <option selected>English</option>
                            <option value="2">French</option>
                            <option value="3">Spanish</option>
                            <option value="4">Deutsche</option>
                            <option value="4">Russian</option>
                            {$rowsmarty2['lang']}
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels">Description</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                         <textarea class="form-control" name="descr" rows="4" cols="80" placeholder="You can write your text here...">{$rowsmarty2['descr']}</textarea>
                      </div>
                    </div>
                    <p></p>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels">Skills</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                         <textarea class="form-control" name="skills" rows="4" cols="80" placeholder="You can write your text here...">{$rowsmarty2['skills']}</textarea>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-6">
                        <button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
                        <button class="btn btn-primary btn-simple" type="reset" onClick="window.location.reload();">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <!-- END OF FORM 1 -> General (Settings)  -->
                <div class="tab-pane" id="link3">
                  <div class="g-pos-rel h-100 g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-30--md">
                    <header>
                      <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">Úprava profilu</h2>
                    </header>
                    <hr class="line-primary">
                    <form enctype="multipart/form-data" method="post">
                      <div id="file-uploader">
                        <div class="container">
                          <div class="row">
                            <div class="col-md-5 col-sm-8">
                              <h4 class="card-title">Pozadie stránky</h4>
                              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                  <img src="../../custom/templates/default/assets/img/image_placeholder.jpg" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                  <span class="btn btn-rose btn-round btn-file">
                                    <span class="fileinput-new">Vybrať obrázok</span>
                                    <span class="fileinput-exists">Zmeniť</span>
                                    <input type="file" name="file2" id="file2">
                                  </span>
                                  <button type="submit" class="btn btn-primary btn-round btn-file" name="submitbg">Odoslať</button>
                                  <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Odstrániť</a>
                                </div>
                                Aspoň 1920x1080, maximum 10MB, .png .jpg .gif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
{include file="footer.tpl"}
