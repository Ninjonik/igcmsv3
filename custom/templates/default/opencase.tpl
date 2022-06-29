{include file="header.tpl"}

  <div class="section mt-5">
    <div class="container">
      <!-- <img src="../assets/img/shape-s.png" class="path path3"> -->
      <h2 class="title">Case Opening</h2>
      <div class="row flex-row">
        <div class="col-lg-6">
          <div class="card card-plain">
              {$WelcomeMessage}
              {$WinMessage}
              
              <form method="post">
                <br></br>
                <input type="submit" name="opencase" value = "Open ({$CasePrice} ß)">
              </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card card-plain">
            <div class="border-style:solid;color:red">
            <!--{var_dump($CaseToOpen->get_items())}-->

            
              {foreach $CaseToOpen->get_items() as $item}
                <li id="sikokot">{$item["id"]}</li>
                <script>
                  setInterval(function() {
                    var variablename = document.getElementById("sikokot");
                    variablename.parentNode.removeChild(variablename);
                  }, 500)
                  
                </script>
            
              {/foreach}
              
            
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>

{include file="footer.tpl"}
