{include file="header.tpl"}
{foreach from=$row2s item=$rowsmarty2}
{/foreach}
<div class="section">
        <div class="container">
          <div class="space-70"></div>
          <div id="contentAreas" class="cd-section">
            <div id="tables">
              <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                      <h6>Moje Články</h6>
                      <div class="card  card-plain">
                        <div class="card-header">
                          <h4 class="card-title"></h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table tablesorter">
                              <thead class="">
                                <tr>
                                  <th class="text-center">
                                    #
                                  </th>
                                  <th>
                                    Názov
                                  </th>
                                  <th>
                                    Napísané
                                  </th>
                                  <th class="text-center">
                                    Upravené
                                  </th>
                                  <th class="text-right">
                                    Sekcia
                                  </th>
                                  <th class="text-right">
                                    Akcie
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                {foreach from=$row2s item=$row}
                                <tr>
                                  <td class="text-center">
                                    {$row["id"]}
                                  </td>
                                  <td>
                                    {$row["title"]}
                                  </td>
                                  <td>
                                    {$row["date"]|date_format:"%d.%m.%Y %H:%M"}
                                  </td>
                                  <td class="text-center">
                                    {$row["editdate"]|date_format:"%d.%m.%Y %H:%M"}
                                  </td>
                                  <td class="text-right">
                                    {$row["name"]}
                                  </td>
                                  <td class="text-right">
                                    <a href="viewpost?id={$row['id']}"><button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm   btn-simple  ">
                                      <i class="tim-icons icon-double-right"></i>
                                    </button></a>
                                    <a href="editpost?id={$row['id']}"><button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm   btn-simple  ">
                                      <i class="tim-icons icon-settings"></i>
                                    </button></a>
                                    <a href="actions?action=removepost&id={$row['id']}"><button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm   btn-simple  ">
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
              </div>
            </div>
          </div>
{include file="footer.tpl"}
