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
                    Vytvoriť predmety
                  </h3>
                  <div class="wizard-navigation">
                    <div class="progress-with-circle">
                      <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="2" style="width: 21%;"></div>
                    </div>
                    <ul>
                      <li class="nav-item">
                        <a class="nav-link active" href="#about" data-toggle="tab">
                          <i class="tim-icons icon-single-02"></i>
                          <p>Základné informácie</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#account" data-toggle="tab">
                          <i class="tim-icons icon-settings-gear-63"></i>
                          <p>Vlastnosti</p>
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
                          <label>Názov Predmetu</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                              </div>
                            </div>
                            <input type="text" name="title" class="form-control" placeholder="Názov Predmetu" value="{$item['title']}">
                          </div>
                        </div>
                        <div class="col-sm-10">
                          <label>Krátky popis Predmetu</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-info-circle"></i>
                              </div>
                            </div>
                            <input type="text" name="desc" class="form-control" placeholder="Krátky popis Predmetu" value="{$item['desc']}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="account">
                      <h5 class="info-text"> Upravte základné vlastnosti predmetu.</h5>
                      <div class="row justify-content-center mt-5">
                        <div class="col-sm-10">
                          <label>Vlastnosti Predmetu, <a href="createcat?action=createcategory">Vytvoriť kategóriu pre Predmety</a></label>
                          <div class="input-group">
                            <select class="selectpicker" data-style="select-with-transition" title="Vyberte 1 Kategóriu" data-size="7" name="category">
                                <option disabled>Vyberte Kategóriu</option>
                                <option selected value="{$item['value']}">{$item['name']}</option>
                                {foreach from=$categories item=$category}
                                <option value="{$category['catID']}">{$category['name']}</option>
                                {/foreach }
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-10">
                          <label>Hodnota Predmetu</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-info-circle"></i>
                              </div>
                            </div>
                            <input type="number" name="value" class="form-control" placeholder="Hodnota" value="{$item['value']}">
                          </div>
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
