{include file="header.tpl"}

  <div class="section mt-5">
    <div class="container">
      <!-- <img src="../assets/img/shape-s.png" class="path path3"> -->
      <h2 class="title">Tickety</h2>
      <div class="row flex-row">
        <div class="col-lg-12">
          <div class="card card-plain">

              <div class="card-header d-inline-block">
                <div class="row">
                  <div class="card  card-plain">
                    <div class="card-header">
                     <div class="tools float-right">
                       <div class="dropdown">
                         <a href="createticket">Vytvoriť Ticket</a>
                       </div>
                     </div>
                     <h4 class="card-title">Tickety</h4>
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
                             <th class="text-right">
                               Actions
                             </th>
                           </tr>
                         </thead>
                         <tbody>
                          {foreach from=$tickets item=$ticket}
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
                             <td>
                              {$ticket["statustitle"]}
                             </td>
                             <td>
                              {$ticket["name"]}
                             </td>
                             <td class="text-right">
                               <a href="viewticket?id={$ticket['id']}"><button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                                 <i class="tim-icons icon-settings"></i>
                               </button></a>
                             </td>
                           </tr>
                           {/foreach}
                         </tbody>
                       </table>
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
