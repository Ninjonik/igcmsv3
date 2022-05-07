{include file="header.tpl"}
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Stránky</h4>
              </div>
            </div>
          </div>

          <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Upraviť stránku</h4>
                      </div>
                      <div class="card-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                          <div class="row">
                            <label class="col-sm-2 col-form-label">Názov</label>
                            <div class="col-sm-10">
                              <div class="form-group">
                                <input type="text" class="form-control" name="title" value="{$editinfo['title']}">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <label class="col-sm-2 col-form-label">Presmerovanie</label>
                            <div class="col-sm-10">
                              <div class="form-group">
                                <input type="text" class="form-control" name="redirect" value="{$editinfo['redirect']}"> Presmerovanie stránky, ak nie je nie nič vyplnené, tak presmerovanie nebude. (používať iba v prípade, že sa chce odkázať na iný web atp.)
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <label class="col-sm-2 col-form-label">Ikona</label>
                            <div class="col-sm-10">
                              <div class="form-group">
                                <input type="text" class="form-control" name="icon" value="{$editinfo['icon']}"> Príklad: icon-pencil
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <label class="col-sm-2 col-form-label">Obsah stránky</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="desc" id="editor1" rows="10" cols="80">
                                {$editinfo['text']}
                              </textarea>
                              <script>
                                  // Replace the <textarea id="editor1"> with a CKEditor 4
                                  // instance, using default configuration.
                                  CKEDITOR.replace( 'editor1', {
                                    skin: 'prestige'
                                  } );
                              </script>
                              <div class="row">
                                <div class="col-sm-10">
                                  <h4 class="card-title"></h4>
                                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                      <img src="../../custom/panel_templates/default/assets/img/image_placeholder.jpg" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                      <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">Vybrať obrázok</span>
                                        <span class="fileinput-exists">Zmeniť</span>
                                        <input type="file" name="file" id="file">
                                      </span>
                                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary" name="submit">Odoslať</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

        </div>
      </div>
{include file="footer.tpl"}
