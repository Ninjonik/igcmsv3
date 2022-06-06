{include file="header.tpl"}
      <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Posledných 7 dní</h5>
                    <h2 class="card-title">Vývoj počtu uživateľov</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <canvas id="line-chart" style="position: relative; height:20vh; width:80vw"></canvas>
                    {$chartmembers}
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="info-icon text-center icon-warning">
                      <i class="far fa-newspaper"></i>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="numbers">
                      <p class="card-category">Príspevkov</p>
                      <h3 class="card-title">{$countposts}</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <hr>
                <div class="stats">
                  <i class="fas fa-check-square"></i>Zverejnených {$countpostsa}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="info-icon text-center icon-primary">
                      <i class="tim-icons icon-chat-33"></i>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="numbers">
                      <p class="card-category">Príspevkov na fóru</p>
                      <h3 class="card-title">{$countfposts}</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <hr>
                <div class="stats">
                  <i class="fas fa-quote-right"></i>Z toho citácií {$countfpostsq}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="info-icon text-center icon-success">
                      <i class="tim-icons icon-single-02"></i>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="numbers">
                      <p class="card-category">Uživatelia</p>
                      <h3 class="card-title">{$countmembers}</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <hr>
                <div class="stats">
                  <i class="fas fa-user-check"></i>Overených {$countmembersa}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="info-icon text-center icon-danger">
                      <i class="tim-icons icon-molecule-40"></i>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="numbers">
                      <p class="card-category">Najnovšia verzia</p>
                      <h3 class="card-title">{$jsonversion}</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <hr>
                <div class="stats">
                  <i class="tim-icons icon-watch-time"></i>Aktuálna nainštalovaná verzia {$assignedversion}
                </div>
              </div>
            </div>
        </div>
          <div class="col-md-3" {getmodulestatus id=4}>
            <div class="card card-tasks">
              <div class="card-header">
                <!-- {assign var=counter value=0}  -->
                {foreach $assgnid|rsort_array item=$assignments2}
                  <!--{$counter++}-->
                {/foreach}
                <h6 class="title d-inline">Zadania({$counter})</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      {foreach $assgnid|rsort_array item=$assignments2}
                      <tr>
                        <td>
                          <p class="title">{$assignments2["title"]|truncate:25}</p>
                          <p class="text-muted full-width">{$assignments2["description"]|truncate:40}</p>
                        </td>
                        <td class="td-actions text-right">
                          <a href="viewassignment?id={$assignments2['id']}"><button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Zobraziť Zadanie">
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
{include file="footer.tpl"}
