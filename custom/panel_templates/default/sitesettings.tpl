{include file="header.tpl"}
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Nastavenia stránky</h4>
              </div>
              <div class="card-body">
                <form enctype="multipart/form-data" method="post">
                <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <h4 class="card-title">Pozadie stránky</h4>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail">
                        <img src="../../custom/panel_templates/default/assets/img/image_placeholder.jpg" alt="...">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Vybrať obrázok</span>
                          <span class="fileinput-exists">Zmeniť</span>
                          <input type="file" name="file">
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Odstrániť</a>
                        <button type="submit" name="submitbg" class="btn btn-primary btn-round">Nahrať</button>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
                <form method="post">
                <div class="row">
                  <label class="col-sm-2 col-form-label">Názov stránky</label>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title" value="{$settings['siteTitle']}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Popis stránky</label>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input type="text" class="form-control" name="desc" value="{$settings['siteDesc']}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Domovská stránka</label>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input type="text" class="form-control" name="defaultsite" value="{$settings['defaultsite']}" data-toggle="tooltip" data-placement="right" title="e.g.: index, viewpage?id=4">
                    </div>
                  </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-round">Odoslať</button>
              </form>
              </div>
            </div>
          </div>
        </div>
{include file="footer.tpl"}
