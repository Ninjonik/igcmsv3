{include file="header.tpl"}
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Nastavenia stránky</h4>
              </div>
              <div class="card-body">
                <form method="post">
                {foreach from=$item item=$items}
                <div class="row">
                  <label class="col-sm-2 col-form-label">{$items['title']}</label>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input type="number" class="form-control" step=".01" name="chance[{$items['id']}]" min="0" max="10000">
                    </div>
                  </div>
                </div>
                {/foreach}
                <button type="submit" name="submit" class="btn btn-primary btn-round">Odoslať</button>
              </form>
              </div>
            </div>
          </div>
        </div>
{include file="footer.tpl"}
