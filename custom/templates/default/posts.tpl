{include file="header.tpl"}
{foreach from=$row2s item=$rowsmarty2}
{/foreach}
<div class="section">
        <div class="container">
          <div class="space-70"></div>
          <div id="contentAreas" class="cd-section">
            <div id="tables">
              <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                      <h6>Články</h6>
                      <div class="card  card-plain">
                        <div class="card-header">
                          <h4 class="card-title"></h4>
                        </div>
                        <div class="section section-comments">
                          <div class="container">
                            <div class="row">
                              <div class="col-md-8 ml-auto mr-auto">
                                <div class="media-area">
                                  <h3 class="title text-center">Najnovšie články</h3>

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
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
{include file="footer.tpl"}
