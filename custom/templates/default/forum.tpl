{include file="header.tpl"}
<div class="wrapper">
    <div class="page-header page-header-small header-filter">
      <div class="page-header-image" data-parallax="true" style="background-image: url('../../uploads/backgrounds/{$siteinfo["background"]}');">
      </div>
      <div class="content-center">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto text-center">
            <h1 class="title">
      				Fórum
      			</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="main main-raised">
      <div class="container">
        <div class="row">
          <div class="container-fluid mt-100">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        {foreach from=$categories item=$categories2}
                        <div class="card-header pr-0 pl-0">
                            <div class="row no-gutters align-items-center w-100">
                                <div class="col font-weight-bold pl-3">{$categories2["title"]}</div>
                                <div class="d-none d-md-block col-6 text-muted">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-3">Threads</div>
                                        <div class="col-3">Replies</div>
                                        <div class="col-6">Last update</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          {foreach from=$forums item=$forums2}
                            {if $categories2["id"] == $forums2["parent"]}
                            <div class="card-body py-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col"><a href="viewforum?id={$forums2['id']}" class="text-big font-weight-semibold" data-abc="true">{$forums2["title"]}</a></div>
                                    <div class="d-none d-md-block col-6">
                                        <div class="row no-gutters align-items-center">
                                            {foreach from=$threadscount item=$thrcou}
                                              {if $forums2["id"] == $thrcou["threadforumID"]}
                                                <div class="col-3">
                                                  {$thrcou["threadscount"]}
                                                </div>
                                              {/if}
                                            {/foreach}

                                            {foreach from=$postscount item=$pocou}
                                              {if $forums2["id"] == $pocou["forumID"]}
                                                <div class="col-3">
                                                  {$pocou["postscount"]}
                                                </div>
                                              {/if}
                                            {/foreach}
                                        {foreach from=$lastupdate item=$lastupd}
                                          {if $forums2["id"] == $lastupd["forumID"]}
                                          {foreach from=$lastupdate2 item=$lastupd2}
                                            {if $lastupd["editcomID"] == $lastupd2["id"]}
                                              <div class="media col-6 align-items-center"> <img src="{$lastupd2['avatar']}" alt="" class="d-block ui-w-30 rounded-circle">
                                                  <div class="media-body flex-truncate ml-2"> <a href="viewtopic?id={$lastupd['id']}" class="d-block text-truncate" data-abc="true">{$lastupd2["desc"]|truncate:15}</a>
                                                      <div class="text-muted small text-truncate">{$lastupd2["time"]|date_format:"%d.%m.%Y %H:%M"} &nbsp;·&nbsp; <a href="profile?id={$lastupd2['userID']}" class="text-muted" data-abc="true">{$lastupd2["username"]}</a></div>
                                                  </div>
                                              </div>
                                            {/if}
                                          {/foreach}

                                          {/if}
                                        {/foreach}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {/if}
                          {/foreach}
                        {/foreach}
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
{include file="footer.tpl"}
