{include file="header.tpl"}
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="tools float-right">
                  <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle btn-link btn-icon" data-toggle="dropdown">
                      <i class="fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="createitems">Vytvoriť Predmet</a>
                      <a class="dropdown-item" href="createcase">Vytvoriť Bedňu</a>
                    </div>
                  </div>
                </div>
                <h4 class="card-title">Bedne</h4>
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
                          Cena
                        </th>
                        <th>
                          Popisok
                        </th>
                        <th>
                          Vytvoril
                        </th>
                        <th>
                          Akcie
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$item item=$items}
                      <tr>
                        <td>
                          {$items["id"]}
                        </td>
                        <td>
                          {$items["title"]}
                        </td>
                        <td>
                          {$items["price"]}
                        </td>
                        <td>
                          {$items["desc"]}
                        </td>
                        <td>
                          {$items["username"]}
                        </td>
                        <td>
                          <a href="editcase?id={$items['id']}"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm btn-icon " data-original-title="Tooltip on top" title="Upraviť">
                            <i class="tim-icons icon-pencil"></i>
                          </button></a>
                           <a href="editchances?id={$items['id']}"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm btn-icon " data-original-title="Tooltip on top" title="Upraviť šance">
                            <i class="fas fa-percent"></i>
                          </button></a>
                          <a href="../user_panel/opencase.php?id={$items['id']}"><button type="button" rel="tooltip" class="btn btn-primary btn-link btn-sm " data-original-title="Tooltip on top" title="Zobraziť">
                            <i class="tim-icons icon-zoom-split"></i>
                          </button></a>
                          <a href="action.php?action=deleteitem&id={$items['id']}&route=items?action=itemdeleted"><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm " data-original-title="Tooltip on top" title="Zmazať">
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

{include file="footer.tpl"}
