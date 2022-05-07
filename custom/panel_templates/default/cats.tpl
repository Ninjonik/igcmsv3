{include file="header.tpl"}
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="tools float-right">
                  <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle btn-link btn-icon" data-toggle="dropdown">
                      <i class="tim-icons icon-settings-gear-63"></i>
                    </button>
                    <a href="createcat">Vytvoriť kategóriu</a>
                  </div>
                </div>
                <h4 class="card-title">Kategórie</h4>
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
                          Názov
                        </th>
                        <th>
                          Typ
                        </th>
                        <th>
                          Akcie
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$categories item=$categories2}
                      <tr>
                        <td>
                          {$categories2["catID"]}
                        </td>
                        <td>
                          {$categories2["name"]|truncate:50}
                        </td>
                        <td>
                          {$categories2["type"]}
                        </td>
                        <td>
                          <a href="action.php?action=deletecat&id={$categories2['catID']}&route=cats?action=catdeleted"><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm " data-original-title="Tooltip on top" title="Zmazať">
                            <i class="tim-icons icon-simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                      {/foreach}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
{include file="footer.tpl"}
