{include file="header.tpl"}
<div class="wrapper">
   <div class="page-header page-header-small header-filter">
      <div class="page-header-image" data-parallax="true" style="background-image: url('../../uploads/backgrounds/{$siteinfo["background"]}');">
   </div>
   <div class="content-center">
      <div class="row">
         <div class="col-md-6 ml-auto mr-auto text-center">
            <h1 class="title">
               Fórum - {$topicinfo["title"]}
            </h1>
         </div>
      </div>
   </div>
</div>
<div class="main main-raised">
<div class="container">
   <div class="container-fluid mt-100">
      <div class="row">
        <a href="forum">Fórum</a> &nbsp; / &nbsp;<a href="viewforum?id={$topicinfo['forumID']}">{$topicinfo["titleforum"]}</a>&nbsp; / &nbsp;{$topicinfo["title"]}
         <div class="col-md-12">
            {foreach from=$rowcom item=$rowcoms}
            <div class="card mb-4" id="com{$rowcoms['id']}">
               <div class="card-header">
                  <div class="media flex-wrap w-100 align-items-center">
                     <img src="{$rowcoms['avatar']}" class="d-block ui-w-40 rounded-circle" alt="{$rowcoms['username']}">
                     <div class="media-body ml-3">
                        <a href="profile?id={$rowcoms['userID']}" data-abc="true">{$rowcoms['html']["html"]} {$rowcoms["username"]}</a>
                        <div class="text-muted small">{$rowcoms["time"]|date_format:"%d.%m.%Y %H:%M"}</div>
                     </div>
                     <div class="text-muted small ml-3">
                        <div>Member since <strong>{$rowcoms["joinTime"]|date_format:"%d.%m.%Y %H:%M"}</strong></div>
                        <!--<div><strong>134</strong> posts</div>-->
                     </div>
                  </div>
               </div>
               <div class="card-body">
                 {$rowcoms["quotefinal"]}
                  <p>{$rowcoms["desc"]}</p>
                  <div class="media-footer">
                    <a href="viewtopic?id={$getID}&quote={$rowcoms['id']}" class="btn btn-primary btn-simple btn-sm pull-right" rel="tooltip" title="Reply to Comment">
                      <i class="tim-icons icon-send"></i> Reply
                    </a>
                    <a href="#" class="btn btn-danger btn-simple btn-sm pull-right">
                      <i class="tim-icons icon-heart-2"></i> {$rowcoms["review"]}
                    </a>
                    <a href="actions?action=likenttc&type=unlike&id={$rowcoms['id']}&targetID={$getID}&secondaryroute=com{$rowcoms['id']}" class="btn btn-danger btn-simple btn-sm pull-right"><i class="fas fa-thumbs-down"></i></a>
                    <a href="actions?action=likenttc&type=like&id={$rowcoms['id']}&targetID={$getID}&secondaryroute=com{$rowcoms['id']}" class="btn btn-danger btn-simple btn-sm pull-right"><i class="far fa-thumbs-up"></i></a>
                  </div>
               </div>
             </div>
            {/foreach}
            <form method="post">
            <div class="card mb-4">
               <div class="card-header">
                  <div class="media flex-wrap w-100 align-items-center">
                     <img src="{$avataruser}" class="d-block ui-w-40 rounded-circle" alt="">
                  </div>
               </div>
               <div class="card-body">
                  <p>

                    <textarea class="form-control" rows="4" id="editor1" name="desc">{$quote}</textarea>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor 4
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor1', {
                          skin: 'prestige'
                        } );
                    </script>

                  </p>
                  <div class="media-footer">
                    <button class="btn btn-primary pull-right btn-simple" type="submit" name="submit"> Reply </a>
                  </div>
               </div>
             </div>
           </form>
         </div>
      </div>
   </div>
</div>
{include file="footer.tpl"}
