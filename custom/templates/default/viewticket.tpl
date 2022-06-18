{include file="header.tpl"}

  <div class="section mt-5">
    <div class="container">
      <!-- <img src="../assets/img/shape-s.png" class="path path3"> -->
      <h2 class="title">{$ticket["title"]}</h2>
      <div class="row flex-row">
        <div class="col-lg-12">
          <div class="card card-plain">

              <div class="card-header d-inline-block">
                <div class="row">
                  <div class="card  card-plain">
                   <div class="card-header">
                     <h4 class="card-title"></h4>
                   </div>
                   <div class="card-body">
                     <div class="table-responsive">
                       <table class="table tablesorter " id="">
                         <thead class="">
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
                             <td >
                              {$status}
                             </td>
                             <td>
                              {$catname}
                             </td>
                           </tr>
                         </tbody>
                       </table>
                     </div>
                   </div>
               </div>
                </div>
              </div>

            <div class="card-body">
              {foreach from=$rowcom item=$rowcoms}
                {if $rowcoms["type"] == 0}
                <div class="row justify-content-end text-right">
                  <div class="col-auto">
                    <div class="card bg-primary text-white">
                      <div class="card-body p-2">
                        <p class="mb-1">
                          {$rowcoms["desc"]}
                        </p>
                        <div>
                          {$rowcoms["username"]} <small class="opacity-60"><i class="far fa-clock"></i> {$rowcoms["time"]|date_format:"%d.%m.%Y %H:%M"}</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {else}
                <div class="row justify-content-start">
                  <div class="col-auto">
                    <div class="card ">
                      <div class="card-body p-2">
                        <p class="mb-1">
                            {$rowcoms["desc"]}
                        </p>
                        <div>
                          {$rowcoms["username"]} <small class="opacity-60"><i class="far fa-clock"></i> {$rowcoms["time"]|date_format:"%d.%m.%Y %H:%M"}</small>
                          <i class="tim-icons icon-check-2"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {/if}
              {/foreach}
            </div>
            <div class="card-footer d-block">
              <form class="align-items-center" method="post">
                <div class="input-group d-flex">
                  <div class="input-group-prepend d-flex">
                    <span class="input-group-text"><i class="tim-icons icon-pencil"></i></span>
                  </div>
                  <input type="text" name="desc" class="form-control form-control-lg" placeholder="Your message">
                  <button class="btn btn-simple btn-primary ml-2" type="submit" name="submit">
                    <i class="tim-icons icon-send"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

{include file="footer.tpl"}
