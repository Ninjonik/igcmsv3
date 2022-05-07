{include file="header.tpl"}
<div class="content">
  <div class="row">
    {foreach from=$assignments item=$assignments2}
    <div class="col-lg-12 col-sm-12">
      <div class="card card-user">
        <div class="card-body">
          <p class="card-text">
            <div class="author">
              <div class="block block-one"></div>
              <div class="block block-two"></div>
              <div class="block block-three"></div>
              <div class="block block-four"></div>
              <a href="javascript:void(0)">
                <img class="avatar" src="../../custom/panel_templates/default/assets/img/code.png" alt="...">
                <h5 class="title">{$assignments2["title"]}</h5>
              </a>
              <p class="description">
                {$assignments2["time"]|date_format:"%d.%m.%Y %H:%M"}
              </p>
            </div>
          </p>
          <div class="card-description">
            {$assignments2["description"]}
          </div>
          {$assignedto2['username']}
          Pridelené: {foreach from=$assignedto899 item=$assignedto2}<img src="{$assignedto2['avatar']}" alt="{$assignedto2['username']}" width="2.5%" height="7.5%" style="border-radius:50%"> {/foreach}
      </div>
    </div>
    {/foreach}

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
          <div align="right" class="button-container">
            <a href="viewassignment?quote={$imgtop2['id']}&id={$getID}"><button class="btn btn-icon btn-round">
              <i class="fas fa-quote-right"></i>
            </button></a>
          </div>
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
