{include file="header.tpl"}

<div class="content">
        <div class="col-md-10 mr-auto ml-auto">
          <!--      Wizard container        -->
          <div class="wizard-container">
            <div class="card card-wizard" data-color="primary" id="wizardProfile">
              <form method="post">
                <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                <div class="card-header text-center">
                  <h3 class="card-title">
                    Vytvoriť fórum
                  </h3>
                  <h5 class="description">Vytvoriť fórum nikdy nebolo jednoduchšie!</h5>
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
                          <i class="tim-icons icon-bullet-list-67"></i>
                          <p>Nastavenia</p>
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
                          <label>Názov Fóra</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-credit-card"></i>
                              </div>
                            </div>
                            <input type="text" name="title" class="form-control" placeholder="Názov fóra">
                          </div>
                        </div>
                        <div class="col-sm-10">
                          <label>Popis Fóra</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-badge"></i>
                              </div>
                            </div>
                            <input type="text" name="desc" class="form-control" placeholder="Popis fóra">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="account">
                      <h5 class="info-text"> Upravte základný vzhľad fóra.</h5>
                      <div class="row justify-content-center mt-5">
                        <div class="col-sm-10">
                          <label>Ikona fóra</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-zoom-split"></i>
                              </div>
                            </div>
                            <input type="input" name="icon" class="form-control" placeholder="Ikona fóra">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="address">
                      <div class="row justify-content-center">
                        <div class="col-sm-12">
                          <h5 class="info-text"> Vyberte nastavenia, ktorými bude dané fórum disponovať. </h5>
                        </div>
                        <div class="card-body">
                        <div class="form-check">
                          <select class="selectpicker" data-size="7" data-style="btn btn-primary" name="parent">
                            <option disabled selected>Rodič fóra</option>
                            {foreach from=$forums item=$forums2}

                                <option value="{$forums2['id']}">{$forums2["title"]}</option>

                            {/foreach}
                          </select>
                          * Ak nebude vybraná žiaden rodič fóra, tak bude fórum vytvorené ako kategória.
                        </div>
                        <div class="form-check">
                            <input type="number" name="order" class="form-control" placeholder="Poradie fóra" min="0">
                        </div>
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
