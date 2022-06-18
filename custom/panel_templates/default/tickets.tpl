{include file="header.tpl"}
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tickety</h4>
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
                          <a href="viewticket?id={$ticket['id']}"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm btn-icon " data-original-title="Tooltip on top" title="Zobraziť">
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
