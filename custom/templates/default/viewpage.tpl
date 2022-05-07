{include file="header.tpl"}
<div class="wrapper">
    <div class="page-header page-header-small header-filter">
      <div class="page-header-image" data-parallax="true" style="background-image: url('../../uploads/pagebackgrounds/{$page["backgroundimg"]}');">
      </div>
      <div class="content-center">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto text-center">
            <h1 class="title">
      				{$page["title"]}
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
              {$page["text"]}
            </div>
          </div>
        </div>
      </div>
    </div>

{include file="footer.tpl"}
