{include file="header.tpl"}
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Skupiny</h4>
              </div>
            </div>
          </div>

          <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Form Elements</h4>
                      </div>
                      <div class="card-body">
                        <form method="post" class="form-horizontal">
                          <div class="row">
                            <label class="col-sm-2 col-form-label">Názov</label>
                            <div class="col-sm-10">
                              <div class="form-group">
                                <input type="text" class="form-control" name="title">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <label class="col-sm-2 col-form-label">Kategória</label>
                            <div class="col-sm-10">
                              <select class="selectpicker" data-size="7" data-style="btn btn-primary" name="category">
                                <option disabled selected>Kategória</option>
                                {foreach from=$cats item=$cats2}

                                    <option value="{$cats2['id']}">{$cats2["name"]}</option>

                                {/foreach}
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <label class="col-sm-2 col-form-label">Popisok</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="desc" id="editor1" rows="10" cols="80">

                              </textarea>
                              <script>
                                  // Replace the <textarea id="editor1"> with a CKEditor 4
                                  // instance, using default configuration.
                                  CKEDITOR.replace( 'editor1', {
                                    skin: 'prestige'
                                  } );
                              </script>
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
