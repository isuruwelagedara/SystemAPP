<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- radio button with calss -->
<input name="collapseGroup" type="radio" class="yes" data-toggle="collapse" data-target="#collapseOne"/> Yes
<input name="collapseGroup" type="radio" class="no" data-toggle="collapse" data-target="#collapseOne" checked/> No
<!-- content to show/hide -->
<p>
   content
 </p>

<script>
    $('p').slideUp();  //to hide
    $(document).ready(function(){
        $('.yes').click(function(){
            $('p').slideDown(); //to show
        });
        $('.no').click(function(){
            $('p').slideUp();  //to hide
        });
    });
</script>