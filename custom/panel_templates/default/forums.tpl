{include file="header.tpl"}
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="tools float-right">
                  <div class="dropdown">
                    <a href="createforum">Vytvoriť fórum</a>
                  </div>
                </div>
                <h4 class="card-title">Fóra a Kategórie</h4>
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
                          Poradie
                        </th>
                        <th>
                          # Rodiča
                        </th>
                        <th>
                          Ikona
                        </th>
                        <th>
                          Akcie
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$forums item=$forums2}
                      <tr>
                        <td>
                          {$forums2["id"]}
                        </td>
                        <td>
                          {$forums2["title"]}
                        </td>
                        <td>
                          {$forums2["order"]}
                        </td>
                        <td>
                          {$forums2["parent"]}
                        </td>
                        <td>
                          {$forums2["icon"]}
                        </td>
                        <td>
                          <a href="editforum?id={$forums2['id']}"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm btn-icon " data-original-title="Tooltip on top" title="Upraviť">
                            <i class="tim-icons icon-pencil"></i>
                          </button></a>
                          <a href="action.php?action=deleteforum&id={$forums2['id']}&route=forums?action=forumdeleted"><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm " data-original-title="Tooltip on top" title="Zmazať">
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
