{include file="header.tpl"}
<div class="wrapper">
 <div class="page-header header-filter">
   <div class="page-header-image" data-parallax="true" style="background-image: url('../../uploads/backgrounds/{$row["background"]}');"></div>
   <div class="container">
     <div class="row">
       <div class="col-md-8 ml-auto mr-auto text-center">
         <h1 class="title">{$row["title"]}</h1>
         <div class="author">
           <h1 class="description">{$row["username"]}</h1>
           <img src="{$row['avatar']}" alt="..." class="avatar img-raised">
         </div>
         <br/>
         <h4 class="description"></h4>
       </div>
     </div>
   </div>
 </div>
 <div class="section">
   <div class="container">
     <div class="row">
       <div class="col-md-8 ml-auto mr-auto">
         {$row["text"]}
       </div>
     </div>
   </div>
 </div>
 <div class="section section-blog-info">
   <div class="container">
     <div class="row">
       <div class="col-md-8 ml-auto mr-auto">
         <div class="row">
           <div class="col-md-10">
             <div class="blog-tags">
               Sekcia:&nbsp;
               <a href="posts?searchcategory={$row["catID"]}"><span class="badge badge-primary">{$row["name"]}</span></a>
               <a href="#" class="btn btn-danger btn-simple btn-sm">
                 <i class="tim-icons icon-heart-2"></i> {$row["review"]}
               </a>
               <a href="actions?action=likentp&type=like&id={$row['id']}&targetID={$row['id']}" class="btn btn-danger btn-simple btn-sm"><i class="far fa-thumbs-up"></i></a>
               <a href="actions?action=likentp&type=unlike&id={$row['id']}&targetID={$row['id']}" class="btn btn-danger btn-simple btn-sm"><i class="fas fa-thumbs-down"></i></a>
             </div>
           </div>
           <hr />
           <div class="col-md-8 ml-auto mr-auto">
             <div class="card card-profile profile-bg">
               <div class="card-header" style="background-image: url('../../uploads/backgroundsprofile/{$row["backgroundprofile"]}');">
                 <div class="card-avatar">
                   <a href="profile?id={$row['memberID']}">
                     <img class="img img-raised" src="{$row["avatar"]}" />
                   </a>
                 </div>
               </div>
               <div class="card-body">
                 <h3 class="card-title">{$row["username"]}</h3>
                 <h6 class="category text-primary">SKupina KUKW</h6>
                 <p class="card-description" style="hyphens: auto;">
                   {$row["descr"]}
                 </p>
               </div>
               <div class="card-footer">
                 <div class="follow float-left">
                   <a class="btn btn-primary btn-sm" href="profile?id={$row['memberID']}">Profil </a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <div class="section section-comments">
   <div class="container">
     <div class="row">
       <div class="col-md-8 ml-auto mr-auto">
         <div class="media-area">
           <h3 class="title text-center">{$rowcommentscount} Comments</h3>

           {foreach from=$rowcom item=$rowcoms}
           <div class="media" id="com{$rowcoms['id']}">
             <a class="pull-left" href="#pablo">
               <div class="avatar">
                 <img class="media-object img-raised" src="{$rowcoms['avatar']}" alt="..." />
               </div>
             </a>
             <div class="media-body">
               <h5 class="media-heading"> {$rowcoms["username"]}
                 <small class="text-muted">&middot; {$rowcoms["time"]|date_format:"%d.%m.%Y %H:%M"}</small>
               </h5>
               {$rowcoms["quotefinal"]}
               <p>{$rowcoms['desc']}</p>
               <div class="media-footer">
                 <a href="viewpost?id={$getID}&quote={$rowcoms['id']}" class="btn btn-primary btn-simple btn-sm pull-right" rel="tooltip" title="Reply to Comment">
                   <i class="tim-icons icon-send"></i> Reply
                 </a>
                 <a href="#" class="btn btn-danger btn-simple btn-sm pull-right">
                   <i class="tim-icons icon-heart-2"></i> {$rowcoms["review"]}
                 </a>
                <a href="actions?action=likentpc&type=unlike&id={$rowcoms['id']}&targetID={$row['id']}&secondaryroute=com{$rowcoms['id']}" class="btn btn-danger btn-simple btn-sm pull-right"><i class="fas fa-thumbs-down"></i></a>
                <a href="actions?action=likentpc&type=like&id={$rowcoms['id']}&targetID={$row['id']}&secondaryroute=com{$rowcoms['id']}" class="btn btn-danger btn-simple btn-sm pull-right"><i class="far fa-thumbs-up"></i></a>
               </div>
             </div>
           </div>
           {/foreach}

         </div>
         <form method="post">
         <h3 class="title text-center">Post your comment</h3>
         <div class="media media-post">
           <a class="pull-left author" href="#pablo">
             <div class="avatar">
               <img class="media-object img-raised" alt="64x64" src="{$avataruser}">
             </div>
           </a>
           <div class="media-body">
             <textarea class="form-control" rows="4" id="editor1" name="desc">{$quote}</textarea>
             <script>
                 // Replace the <textarea id="editor1"> with a CKEditor 4
                 // instance, using default configuration.
                 CKEDITOR.replace( 'editor1', {
                   skin: 'prestige'
                 } );
             </script>
             <p>
             <div class="media-footer">
               <button class="btn btn-primary pull-right" type="submit" name="submit"> Reply </a>
             </div>
           </p>
           </div>
         </div>
        </form>
         <!-- end media-post -->

       </div>
     </div>
   </div>
 </div>

 <div class="section section-comments">
   <div class="container">
     <div class="row">
       <div class="col-md-8 ml-auto mr-auto">
         <div class="media-area">
           <h3 class="title text-center">Najnovšie články v kategórii <b>{$row["name"]}</b></h3>

           {foreach from=$posts item=$posts2}
           <p>
            <div class="col-md-12 ml-auto mr-auto">
              <div class="card card-blog card-plain blog-horizontal">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card-image">
                      <a href="viewpost?id={$posts2['id']}">
                        <img class="img rounded" src="../../uploads/backgrounds/{$posts2["background"]}" />
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="card-body">
                      <h3 class="card-title">
                        <a href="viewpost?id={$posts2['id']}">{$posts2["title"]}</a>
                      </h3>
                      <p class="card-description">
                        {$posts2["text"]|mb_substr:0:300} ...
                        <a href="viewpost?id={$posts2['id']}"> Čítať viac </a>
                      </p>
                      <div class="author">
                        <img src="{$posts2['avataruser']}" alt="..." class="avatar img-raised">
                        <div class="text">
                          <span class="name">{$posts2["username"]}</span>
                          <div class="meta">{$posts2["editdate"]|date_format:"%d.%m.%Y %H:%M"}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </p>
           {/foreach}
         </div>
       </div>
     </div>
   </div>
 </div>

{include file="footer.tpl"}
