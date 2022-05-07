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
    <div class="container-fluid mt-100">
    <!-- TODO
        <div class="d-flex flex-wrap justify-content-between">
            <div> <a href="createtopic?id={$getID}"><button type="button" class="btn btn-shadow btn-wide btn-primary"> <span class="btn-icon-wrapper pr-2 opacity-7"> <i class="fa fa-plus fa-w-20"></i> </span> Nový príspevok  </button> </a></div>
            <div class="col-12 col-md-3 p-0 mb-3"> <input type="text" class="form-control" placeholder="Search..."> </div>
        </div>
    -->
        <div class="card mb-3">
            <div class="card-header pl-0 pr-0">
                <div class="row no-gutters w-100 align-items-center">
                    <div class="col ml-3">Fóra</div>
                    <div class="col-4 text-muted">
                        <div class="row no-gutters align-items-center">
                            <div class="col-4">Replies</div>
                            <div class="col-8">Last update</div>
                        </div>
                    </div>
                </div>
            </div>
            {foreach from=$forums item=$forum}
            <div class="card-body py-1">
                <div class="row no-gutters align-items-center">
                    <div class="col"> <a href="viewforum?id={$forum['id']}" class="text-big" data-abc="true">{$forum["title"]}</a>
                    </div>
                    {foreach from=$lastupdate item=$lastupd}
                      {if $forum["id"] == $lastupd["forumID"]}
                      {foreach from=$lastupdate2 item=$lastupd2}
                        {if $lastupd["editcomID"] == $lastupd2["id"]}
                            <div class="d-none d-md-block col-4">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4"></div>
                                    <div class="media col-8 align-items-center"> <img src="{$lastupd2['avatar']}" alt="" class="d-block ui-w-30 rounded-circle">
                                        <div class="media-body flex-truncate ml-2">
                                            <a href="viewtopic?id={$lastupd['id']}"><div class="line-height-1 text-truncate">{$lastupd2["time"]|date_format:"%d.%m.%Y %H:%M"}</div></a> <a href="profile?id={$lastupd2['userID']}" class="text-muted small text-truncate" data-abc="true">{$lastupd2["username"]}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {/if}
                      {/foreach}
                      {/if}
                    {/foreach}
                </div>
            </div>
            {/foreach}
            <div class="card-header pl-0 pr-0">
                <div class="row no-gutters w-100 align-items-center">
                    <div class="col ml-3">Topics</div>
                    <div class="col-4 text-muted">
                        <div class="row no-gutters align-items-center">
                            <div class="col-4"></div>
                            <div class="col-8"></div>
                        </div>
                    </div>
                </div>
            </div>
            {foreach from=$topics item=$topic}
            <div class="card-body py-3">
                <div class="row no-gutters align-items-center">
                    <div class="col"> <a href="viewtopic?id={$topic['id']}" class="text-big" data-abc="true">{$topic["title"]}</a>
                        <div class="text-muted small mt-1">{$topic["date"]|date_format:"%d.%m.%Y %H:%M"} &nbsp;·&nbsp; <a href="profile?id={$lastupd2['userID']}" class="text-muted" data-abc="true">{$topic["username"]}</a></div>
                    </div>

                    {foreach from=$topics2 item=$topics}
                      {if $topic["id"] == $topics["topicID"]}

                          <div class="d-none d-md-block col-4">
                              <div class="row no-gutters align-items-center">
                                  <div class="col-4">12</div>
                                  <div class="media col-8 align-items-center"> <img src="{$topics['avatar']}" alt="" class="d-block ui-w-30 rounded-circle">
                                      <div class="media-body flex-truncate ml-2">
                                          <a href="viewtopic?id={$topics['topicID']}"><div class="line-height-1 text-truncate">{$topics["time"]|date_format:"%d.%m.%Y %H:%M"}</div></a> <a href="profile?id={$topics['userID']}"class="text-muted small text-truncate" data-abc="true">{$topics["username"]}</a>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      {/if}
                    {/foreach}

                </div>
            </div>
            {foreachelse}
            <div class="card-body py-3">
                <div class="row no-gutters align-items-center">
                    <div class="col"> <a href="javascript:void(0)" class="text-big" data-abc="true">Nič tu nie je ¯\_(ツ)_/¯</a>
                    </div>
                </div>
            </div>
            {/foreach}
        </div>
    </div>
  </div>
{include file="footer.tpl"}
