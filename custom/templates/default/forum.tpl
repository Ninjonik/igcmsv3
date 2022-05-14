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
                {foreach from=$categories item=$category}
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header pr-0 pl-0">
                            <div class="row no-gutters align-items-center w-100">
                                <div class="col font-weight-bold pl-3">{$category["title"]}</div>
                                <div class="d-none d-md-block col-6 text-muted">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-3">Threads</div>
                                        <div class="col-3">Replies</div>
                                        <div class="col-6">Last update</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          {foreach from $forums item=$forum}
                            {$forum["parent"]}
                            <div class="card-body py-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col"><a href="viewforum?id=id" class="text-big font-weight-semibold" data-abc="true">title</a></div>
                                    <div class="d-none d-md-block col-6">
                                        <div class="row no-gutters align-items-center">
                                                <div class="col-3">
                                                  threadscount
                                                </div>

                                                <div class="col-3">
                                                  postcount
                                                </div>
                                              <div class="media col-6 align-items-center"> <img src="avatar" alt="" class="d-block ui-w-30 rounded-circle">
                                                  <div class="media-body flex-truncate ml-2"> <a href="viewtopic?id={$lastupd['id']}" class="d-block text-truncate" data-abc="true">desc|truncate:15</a>
                                                      <div class="text-muted small text-truncate">lastupdate &nbsp;·&nbsp; <a href="profile?id=profileid" class="text-muted" data-abc="true">username</a></div>
                                                  </div>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          {/foreach}
                    </div>
                </div>
                {/foreach}
            </div>
          </div>
        </div>
      </div>
    </div>
{include file="footer.tpl"}
