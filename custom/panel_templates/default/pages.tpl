{include file="header.tpl"}
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="tools float-right">
                  <div class="dropdown">
                    <a href="createpage">Vytvoriť stránku</a>
                  </div>
                </div>
                <h4 class="card-title">Stránky</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Názov
                        </th>
                        <th>
                          Presmerovanie
                        </th>
                        <th>
                          Ikona
                        </th>
                        <th>
                          Pozadie
                        </th>
                        <th>
                          Akcie
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$pages item=$pages2}
                      <tr>
                        <td>
                          {$pages2["id"]}
                        </td>
                        <td>
                          {$pages2["title"]}
                        </td>
                        <td>
                          {$pages2["redirect"]}
                        </td>
                        <td>
                          {$pages2["icon"]}
                        </td>
                        <td>
                          {$pages2["backgroundimg"]}
                        </td>
                        <td>
                          <a href="editpage?id={$pages2['id']}"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm " data-original-title="Tooltip on top" title="Upraviť">
                            <i class="tim-icons icon-pencil"></i>
                          </button></a>
                          <a href="action.php?action=deletepage&id={$pages2['id']}&route=pages?action=pagedeleted"><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm " data-original-title="Tooltip on top" title="Zmazať">
                            <i class="tim-icons icon-simple-remove"></i>
                          </button></a>
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
