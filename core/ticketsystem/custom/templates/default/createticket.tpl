

{include file="header.tpl"}
<div class="wrapper">
<div class="section">
   <div class="team-1">
      <div class="container">
         <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
               <h2 class="title">Pridať Ticket</h2>
            </div>
         </div>
      </div>
   </div>
   <form enctype="multipart/form-data" method="post">
      <div id="file-uploader">
         <div class="container" align="center">
            <div class="row">
               <div class="col-md-8 ml-auto mr-auto text-center mt-5">
                  <h1 class="title">Nezabudnite na
                     <b>popis</b>
                  </h1>
                  <div class="row">
                     <div class="col-md-10 mx-auto ">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-6">
                                 <label>Názov</label>
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="tim-icons icon-single-02"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Maximálne 25 znakov" aria-label="First Name..." maxlength="25" name="title">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Kategória</label>
                                    <div class="input-group">
                                       <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-simple" title="Single Select" name="category">
                                          <option disabled selected>Kategória</option>
                                          {foreach from=$cats item=$cats2}
                                          <option value="{$cats2['catID']}">{$cats2["name"]}</option>
                                          {/foreach}
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label>Popis</label>
                              <div class="toolbar-container"></div>
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
                           <div class="row">
                              <div class="col-md-6 ml-auto">
                                 <button type="submit" name="submit" class="btn btn-primary btn-round pull-right">Odoslať</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>
{include file="footer.tpl"}
