    @if(Session::get('flash_message'))
    <script>
        m_alert("{{Session::pull('flash_message')}}");
    </script>
    @endif
    <?php 
        Session::forget('flash_message');
    ?>
    <?php $allErrors = "";?>
    @foreach ($errors->all() as $error)
    <?php 
        $allErrors = $allErrors."<li>".$error."</li>";
    ?>
    @endforeach

    @if($allErrors)
    <script type="text/javascript">
        m_alert("<font color='Red'>Error Message</font> <hr> {{$allErrors}}<br/><br/>");
    </script>
    @endif