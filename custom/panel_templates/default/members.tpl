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
              <div class="card-header">
                <div class="tools float-right">
                  <div class="dropdown">
                    <a href="createpage">Vytvoriť uživateľa</a>
                  </div>
                </div>
                <h4 class="card-title">Uživatelia</h4>
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
                          Používateľské Meno
                        </th>
                        <th>
                          E-mail
                        </th>
                        <th>
                          Je aktívny?
                        </th>
                        <th>
                          Dátum Registrácie
                        </th>
                        <th>
                          Skupina
                        </th>
                        <th>
                          Akcie
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$members item=$members2}
                      <tr>
                        <td>
                          {$members2["memberID"]}
                        </td>
                        <td>
                          {$members2["username"]}
                        </td>
                        <td>
                          {$members2["email"]}
                        </td>
                        <td>
                          {$members2["active"]}
                        </td>
                        <td>
                          {$members2["joinTime"]|date_format:"%d.%m.%Y %H:%M"}
                        </td>
                        <td>
                          {$members2["title"]}
                        </td>
                        <td>
                          <a href="editpage?id={$members2['id']}"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm " data-original-title="Tooltip on top" title="Upraviť">
                            <i class="tim-icons icon-pencil"></i>
                          </button></a>
                          <a href="action.php?action=deleteuser&id={$members2['memberID']}&route=members?action=userdeleted"><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm " data-original-title="Tooltip on top" title="Zmazať">
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
