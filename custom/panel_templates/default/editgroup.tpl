{include file="header.tpl"}
{foreach from=$groups item=$groups2}
{/foreach}
<div class="content">
        <div class="col-md-10 mr-auto ml-auto">
          <!--      Wizard container        -->
          <div class="wizard-container">
            <div class="card card-wizard" data-color="primary" id="wizardProfile">
              <form method="post">
                <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                <div class="card-header text-center">
                  <h3 class="card-title">
                    Upraviť skupinu
                  </h3>
                  <h5 class="description">Upraviť skupinu nikdy nebolo jednoduchšie!</h5>
                  <div class="wizard-navigation">
                    <div class="progress-with-circle">
                      <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                    </div>
                    <ul>
                      <li class="nav-item">
                        <a class="nav-link active" href="#about" data-toggle="tab">
                          <i class="tim-icons icon-single-02"></i>
                          <p>Základné Informácie</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#account" data-toggle="tab">
                          <i class="tim-icons icon-settings-gear-63"></i>
                          <p>Vzhľad</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#address" data-toggle="tab">
                          <i class="tim-icons icon-delivery-fast"></i>
                          <p>Oprávnenia</p>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane show active" id="about">
                      <h5 class="info-text"> Začnime so základnými informáciami.</h5>
                      <div class="row justify-content-center mt-5">
                        <div class="col-sm-10">
                          <label>Názov Skupiny</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                              </div>
                            </div>
                            <input type="text" name="firstname" class="form-control" placeholder="Názov skupiny" value="{$groups2['title']}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="account">
                      <h5 class="info-text"> Upravte základný vzhľad skupiny.</h5>
                      <div class="row justify-content-center mt-5">
                        <div class="col-sm-10">
                          <label>Farba Skupiny</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                              </div>
                            </div>
                            <input type="color" name="colour" class="form-control" placeholder="Názov skupiny" value="{$groups2['colour']}">
                          </div>
                        </div>
                      </div>
                       <div class="row justify-content-center mt-5">
                        <div class="col-sm-10">
                          <label>HTML Skupiny</label>
                          Napríklad: &lt;span class="badge badge-primary">&lt;strong>&lt;i class="fas fa-crown">&lt;/i> Admin&lt;/strong>&lt;/span>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                              </div>
                            </div>
                            <input type="text" name="html" class="form-control" placeholder="HTML skupiny" value="{$groups2['html']|escape}">
                          </div>
                          Preview: {$groups2['html']}
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="address">
                      <div class="row justify-content-center">
                        <div class="col-sm-12">
                          <h5 class="info-text"> Vyberte oprávnenia, ktorými bude daná skupina disponovať. </h5>
                        </div>
                        <div class="card-body">
                        {foreach from=$groupsvalues item=$groupvalue}
                           {foreach from=$groupsnames item=$groupname}
                            {if $groupvalue["id"] == $groupname["id"]}

                              <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="{$groupvalue["id"]}" {if $groupvalue["value"] == 1}checked{/if}>
                                    {$groupname["name"]}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                              </div>

                            {/if}
                           {/foreach}
                        {/foreach}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="pull-right">
                    <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Dopredu' />
                    <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd' name='submit' value='Odoslať' />
                  </div>
                  <div class="pull-left">
                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Späť' />
                  </div>
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
          </div>
          <!-- wizard container -->
        </div>
      </div>
{include file="footer.tpl"}
