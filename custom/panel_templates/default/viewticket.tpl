{include file="header.tpl"}
{foreach from=$tickets item=$ticket}
{/foreach}
<div class="content">
  <div class="row">
    <div class="col-lg-12 col-sm-12">
      <div class="card card-user">
        <div class="card-body">
          <p class="card-text">
            <div class="author">
              <div class="block block-one"></div>
              <div class="block block-two"></div>
              <div class="block block-three"></div>
              <div class="block block-four"></div>
              <div class="table-responsive">
                <table class="table">
                  <thead class="text-primary">
                    <tr>
                      <th>
                        #
                      </th>
                      <th>
                        Názov
                      </th>
                      <th>
                        Dátum
                      </th>
                      <th>
                        Posledná Úprava
                      </th>
                      <th>
                        Stav
                      </th>
                      <th>
                        Kategória
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        {$ticket["id"]}
                      </td>
                      <td>
                        {$ticket["title"]}
                      </td>
                      <td>
                        {$ticket["date"]|date_format:"%d.%m.%Y %H:%M"}
                      </td>
                      <td>
                        {$ticket["editdate"]|date_format:"%d.%m.%Y %H:%M"}
                      </td>
                      <td>
                        <script>

                        function formSubmit() {
                          document.getElementById("form1").submit();
                        }

                       </script>
                     <form method="post" id="form1">
                        <select data-size="7" data-style="btn btn-primary btn-simple" title="Single Select" name="status" onchange = formSubmit();>
                          <option disabled selected>{$ticket["statustitle"]}</option>
                           <option value="0"> Čaká sa na podporu</option>
                           <option value="1"> Rieši sa</option>
                           <option value="2"> Vyriešené</option>
                           <option value="3"> Uzavreté</option>
                           <option value="4"> Odložené</option>
                           <option value="5"> Čaká sa na odpoveď uživateľa</option>
                        </select>
                      </form>
                      </td>
                      <td>
                       {$ticket["name"]}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </p>
      </div>
    </div>

    <!-- COMMENT SECTION -->

    <div class="col-lg-12 col-sm-12">
      {foreach from=$imgtop item=$imgtop2}
      <div class="card card-testimonial">
        <div class="card-header card-header-avatar">
          <a href="#pablo">
            <img class="img img-raised" src="{$imgtop2['avatar']}">
          </a>
        </div>
        <div class="card-body ">
          <p class="card-description">
            {$imgtop2["username"]}
          </p>
        </div>
        <div class="card-footer ">
          <h4 class="card-title">{$imgtop2["desc"]}</h4>
          <p class="category">{$imgtop2["time"]|date_format:"%d.%m.%Y %H:%M"}</p>
        </div>
      </div>
      {/foreach}
      <form method="post">
      <div class="card card-testimonial">
        <div class="card-header card-header-avatar">
          <a href="#pablo">
            <img class="img img-raised" src="{$avataruser}">
          </a>
        </div>
        <div class="card-footer">
          <p><textarea class="form-control" name="desc" id="editor1" rows="10" cols="80">
              {$quote}
          </textarea>
          <script>
              // Replace the <textarea id="editor1"> with a CKEditor 4
              // instance, using default configuration.
              CKEDITOR.replace( 'editor1', {
                skin: 'prestige'
              } );
          </script></p>
          <p class="category"><input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd' name='submit' value='Odoslať' /></p>
        </div>
      </div>
     </form>
  </div>
</div>

{include file="footer.tpl"}
