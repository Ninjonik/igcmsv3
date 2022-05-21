{include file="header.tpl"}
      <div class="wrapper">
         <div class="page-header">
            <img src="../../custom/templates/default/assets/img/dots.png" class="dots">
            <img src="../../custom/templates/default/assets/img/path4.png" class="path">
            <div class="container align-items-center">
               <div class="row">
                  <div class="col-lg-6 col-md-6">
                     <h1 class="profile-title text-left">{$profile["username"]}</h1>
                     <h3 class="profile-title text-left">{$profile["first_name"]} {$profile["last_name"]}</h3>
                     <h1 class="text-on-back">BIO</h1>
                     <p class="profile-description">{$profile["descr"]}</p>
                  </div>
                  <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                     <div class="card card-coin card-plain">
                        <div class="card-header">
                           <img src="{$avatar}" class="img-center img-fluid rounded-circle">
                        </div>
                        <div class="card-body">
                           <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                              <li class="nav-item">
                                 <a class="nav-link active" data-toggle="tab" href="#linka">
                                 Basic
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#linkb">
                                 Skills
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#linkc">
                                 Other
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content tab-subcategories">
                              <div class="tab-pane active" id="linka">
                                 <div class="table-responsive">
                                    <table class="table tablesorter " id="plain-table">
                                       <thead class=" text-primary">
                                          <tr>
                                             <th class="header">
                                                Location
                                             </th>
                                             <th class="header">
                                                Phone Number
                                             </th>
                                             <th class="header">
                                                Gender
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>
                                                {$profile["location"]}
                                             </td>
                                             <td>
                                                {$profile["phone_number"]}
                                             </td>
                                             <td>
                                                {if $profile["gender"] == 0}
                                                    Male
                                                {else}
                                                    Female
                                                {/if}
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                              <div class="tab-pane" id="linkb">
                                 {$profile["skills"]}
                              </div>
                              <div class="tab-pane" id="linkc">
                                 <div class="table-responsive">
                                   <div class="table-responsive">
                                    <table class="table tablesorter " id="plain-table">
                                       <thead class=" text-primary">
                                          <tr>
                                             <th class="header">
                                                Join Time
                                             </th>
                                             <th class="header">
                                                Group
                                             </th>
                                             <th class="header">
                                                User's ID
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>
                                                {$profile["joinTime"]|date_format:"%d.%m.%Y %H:%M"}
                                             </td>
                                             <td>
                                                <span class="badge badge-primary"><strong><i class="fas fa-crown"></i>{$profile["title"]}</strong></span>
                                             </td>
                                             <td>
                                                {$profile["memberID"]}
                                             </td>
                                          </tr>
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