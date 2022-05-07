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
                    <a href="creategroup">Vytvoriť skupinu</a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#">Niečo</a>
                    </div>
                  </div>
                </div>
                <h4 class="card-title">Skupiny</h4>
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
                          Dátum
                        </th>
                        <th>
                          Posledná Úprava
                        </th>
                        <th>
                          Stav
                        </th>
                        <th>
                          Kategória
                        </th>
                        <th>
                          Actions
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$tickets item=$ticket}
                      <tr>
                        <td>
                          {$ticket["id"]}
                        </td>
                        <td>
                          {$ticket["title"]}
                        </td>
                        <td>
                          {$ticket["date"]|date_format:"%d.%m.%Y %H:%M"}
                        </td>
                        <td>
                          {$ticket["editdate"]|date_format:"%d.%m.%Y %H:%M"}
                        </td>
                        <td>
                         {$ticket["statustitle"]}
                        </td>
                        <td>
                         {$ticket["name"]}
                        </td>
                        <td>
                          <a href="viewtopic?id={$ticket['id']}"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm btn-icon " data-original-title="Tooltip on top" title="Zobraziť">
                            <i class="tim-icons icon-pencil"></i>
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
