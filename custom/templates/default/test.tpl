
<!--<endora></endora>-->



{literal}
 <script>

   $(document).ready(function() {
      // check once in five seconds
      setInterval(function() {
        $.get('/script.php', {do: 'new_messages'}, function(response) {
          if(response == 1) {
            window.location.reload();
          }
        });
      }, 1000);
    });

</script>
{/literal}
