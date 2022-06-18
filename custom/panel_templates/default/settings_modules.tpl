{include file="header.tpl"}
<script>
      $(document).ready(function() {
      $('#table').DataTable();
  } );
  </script>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <form method="post">
              <div class="card-header">
                <h4 class="card-title">Moduly</h4>
                <button class="btn btn-primary" type="submit" name="submit">Uložiť zmeny</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="table" class="display">
                    <thead class="text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Modul
                        </th>
                        <th>
                          Stav
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$modules item=$modul}
                      <tr>
                        <td>
                          {$modul["id"]}
                        </td>
                        <td>
                          {$modul["name"]}
                        </td>
                        <td>
                          <div class="form-group">
                            <select class="form-control" name="{$modul['id']}">               
                            {if $modul["value"] == 1}
                                <option value="1" selected>Zapnuté</option>
                                <option value="0">Vypnuté</option>
                            {else}
                                <option value="0" selected>Vypnuté</option>
                                <option value="1">Zapnuté</option>
                            {/if}
                          </select>
                          </div>
                        </td>
                      </tr>
                      {/foreach}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
{include file="footer.tpl"}
