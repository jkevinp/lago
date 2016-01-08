{{Form::open()}}
    <div class="alert alert-info">
        <p class="">Select the Reservation ID of the reservation you wish to pay then enter the reference/booking code that you received from the bank.</p>
        <p class="">Our staff will verify if the payment has been made. After verification, the reservation will be confirmed.</p>
        <p>For any notes or instruction, please specify at notes field.</p>
    </div>
    <table class="table table-responsive" style="width:80%" align="Center">
    <tr>
        <td width="10%">Booking ID:</td>
        <?php 
            $bookArray = [];
        ?>
        @foreach($booking as $book)
            <?php 
                array_push($bookArray, $book['bookingid']);
            ?>
        @endforeach
        <td  width="90%" >  {{ Form::select('bookingId', $bookArray , null , array('class' => 'padded-text form-control '))}}</td>
    </tr>
    <tr>
        <td>Deposit Code/Reference:</td>
        <td> {{Form::text('sender' , '', array('class' => 'padded-text','placeholder' => '123ABC'))}}</td>
    </tr>
    <tr>
        <td colspan=2  width=100%>
        {{ Form::textarea('notes', null, ['class' => 'form-control','size' => '300x10' ,'style' => 'resize:none;witdh:100%;height:300px', 'placeholder' => 'Notes']) }}
        </td>
    </tr>
    <tr>
        <td width=50%>{{Form::submit('Send Payment Request', ['class' => 'btn btn-primary' , 'style' => 'width:100%'])}}</td>
        <td width=50%>{{Form::reset('Reset',['class' => 'btn btn-default' ,'style' => 'width:100%'])}}</td>
    </tr>
    </table>
    {{Form::close()}}