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
                    Vytvoriť zadanie
                  </h3>
                  <h5 class="description">Vytvoriť zadanie nikdy nebolo jednoduchšie!</h5>
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
                          <label>Názov Zadania</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                              </div>
                            </div>
                            <input type="text" name="title" class="form-control" placeholder="Názov zadania">
                          </div>
                        </div>
                        <div class="col-sm-10">
                          <label>Deadline</label>
                          <div class="input-group">
                            <input type="text" class="form-control datetimepicker" value="1650268407" name="deadline">
                          </div>
                        </div>
                        <div class="col-sm-10">
                          <label>Popis Zadania</label>
                          <div class="input-group">
                            <textarea class="form-control" name="desc" id="editor1" rows="10" cols="80">

                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor 4
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1', {
                                  skin: 'prestige'
                                } );
                            </script>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="account">
                      <h5 class="info-text"> Upravte základný vzhľad zadania.</h5>
                      <div class="row justify-content-center mt-5">
                        <div class="col-sm-10">
                          <label>Farba Zadania</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                              </div>
                            </div>
                            <input type="color" name="colour" class="form-control" placeholder="Názov zadania">
                          </div>
                        </div>
                        <div class="col-sm-10">
                          <label>Priorita Zadania</label>
                          <div class="form-group">
                            <select class="selectpicker" data-size="7" data-style="btn btn-primary" name="priority">
                                <option value="0">Nie dôležitá</option>
                                <option value="1">Nízka</option>
                                <option value="2">Normálna</option>
                                <option value="3">Vysoká</option>
                                <option value="4">Súrna</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="address">
                      <div class="row justify-content-center">
                        <div class="col-sm-12">
                          <h5 class="info-text"> Vyberte ľudí, ktorým chcete zadanie pridať. </h5>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                          <select multiple class="selectpicker" id="exampleFormControlSelect2" name="select[]" data-style="btn btn-primary">
                            {foreach from=$assignto item=$assignto2}
                              <option value='{$assignto2["memberID"]}'>{$assignto2["username"]}</option>
                            {/foreach}
                          </select>
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
  <script src="../../custom/panel_templates/default/assets/js/plugins/bootstrap-datetimepicker.js"></script>
  <script>
    $(document).ready(function() {
      // initialise Datetimepicker
      blackDashboard.initDateTimePicker();
    });
  </script>
{include file="footer.tpl"}
