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
                    <a href="createassignment">Vytvoriť zadanie</a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#">Niečo</a>
                    </div>
                  </div>
                </div>
                <h4 class="card-title">Zadania</h4>
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
                          Vytvorené
                        </th>
                        <th>
                          Deadline
                        </th>
                        <th>
                          Farba
                        </th>
                        <th>
                          Priorita
                        </th>
                        <th>
                          Akcie
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$assignments item=$assignments2}
                      <tr>
                        <td>
                          {$assignments2["id"]}
                        </td>
                        <td>
                          {$assignments2["title"]|truncate:80}
                        </td>
                        <td>
                          {$assignments2["time"]|date_format:"%d.%m.%Y %H:%M"}
                        </td>
                        <td>
                          {$assignments2["deadline"]|date_format:"%d.%m.%Y %H:%M"}
                        </td>
                        <td>
                          {$assignments2["colour"]}
                        </td>
                        <td>
                          {$assignments2["status"]}
                        </td>
                        <td>
                          <a href="viewassignment?id={$assignments2['id']}"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm btn-icon " data-original-title="Tooltip on top" title="Zobraziť">
                            <i class="tim-icons icon-pencil"></i>
                          </button></a>
                          <a href="action.php?action=deleteassignment&id={$assignments2['id']}&route=assignments?action=assignmentsuccessfullydeleted"><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm " data-original-title="Tooltip on top" title="Zmazať">
                            <i class="tim-icons icon-simple-remove"></i></a>
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
{include file="footer.tpl"}
