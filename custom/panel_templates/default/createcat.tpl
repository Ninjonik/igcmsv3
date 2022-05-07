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
                    Vytvoriť kategóriu
                  </h3>
                  <h5 class="description">Vytvoriť kategóriu nikdy nebolo jednoduchšie!</h5>
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
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane show active" id="about">
                      <h5 class="info-text"> Začnime so základnými informáciami.</h5>
                      <div class="row justify-content-center mt-5">
                        <div class="col-sm-10">
                          <label>Názov Kategórie</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                              </div>
                            </div>
                            <input type="text" name="catname" class="form-control" placeholder="Názov kategórie">
                          </div>
                          <label>Typ</label>
                          <div class="input-group">
                            <select class="selectpicker" data-size="7" data-style="btn btn-primary" name="type">
                                  <option value="0" selected>Články a Fóra</option>
                                  <option value="1">Tickety</option>
                                  <option value="2">Typ Predmetov</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-footer">
                  <div class="pull-right">
                    <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd' name='submit' value='Odoslať' />
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
