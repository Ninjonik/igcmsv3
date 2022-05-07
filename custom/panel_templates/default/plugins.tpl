{include file="header.tpl"}
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Skupiny</h4>
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
                          Verzia
                        </th>
                        <th>
                          Akcie
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$plugins item=$plugin}
                        {foreach from=$plugindirectories item=$plugindir}
                          {if $plugin["path"] == $plugindir}
                          <tr>
                            <td>
                              {$plugin["id"]}
                            </td>
                            <td>
                              {$plugin["title"]}
                            </td>
                            <td>
                              {$plugin["version"]}
                            </td>
                            <td>
                              <a href="../{$plugin['path']}/install.php?action=update"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm btn-icon " data-original-title="Tooltip on top" title="Aktualizovať">
                                <i class="tim-icons icon-refresh-02"></i>
                              </button></a>
                              <a href="../{$plugin['path']}/install.php?action=uninstall"><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm " data-original-title="Tooltip on top" title="Odinštalovať">
                                <i class="tim-icons icon-simple-remove"></i>
                              </button>
                            </td>
                          </tr>
                          {/if}
                        {/foreach}
                      {/foreach}
                    </tbody>
                  </table>

                  <div class="card">
                    <div class="card-body">
                      <form method="post">
                        <div class="form-group">
                          <label for="installplugin">Nainštalovať plugin</label>
                          <input type="text" class="form-control" id="installplugin" placeholder="Názov inštalačného priečinku pluginu, ktorý je umiestnený v /core/" name="path">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Nainštalovať</button>
                      </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
{include file="footer.tpl"}
