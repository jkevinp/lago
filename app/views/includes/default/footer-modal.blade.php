    @if(Session::get('flash_message'))
    <script>
        bootbox.alert("{{Session::pull('flash_message')}}", function() {});
    </script>
    @endif
    <?php 
        Session::forget('flash_message');
    ?>
    <?php $allErrors = "";?>
    @foreach ($errors->all() as $error)
    <?php 
        $allErrors = $allErrors."<li>".$error;

    ?>
    @endforeach

    @if($allErrors)
    <script type="text/javascript">
        bootbox.alert("<font color='Red'>Error Message</font> <hr> {{$allErrors}}", function() {});
    </script>
    @endif