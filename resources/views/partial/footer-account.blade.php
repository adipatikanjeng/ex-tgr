<div class="account_form after_clear" style="margin:20px 0 0 0">
    <h2>Untuk informasi lebih lanjut, silahkan hubungi kami di:</h2>

    <div class="row_input">
        <div class="col_input">
            <p>
                {!! $contact['name'] !!}<br/>
                {!! $contact['address'] !!}
            </p>

        </div>
    </div>
    <div class="row_input contact_us">
        <div class="col_input">
            <div class="after_clear">
                <img src="{{ asset('images') }}/material/mail.png"/>
                <span class="mail">{{ $contact['email'] }}</span>
            </div>
            <div>
                <img src="{{ asset('images') }}/material/cs.png"/>
                <span class="phone">{{ $contact['telephone'] }}</span>
            </div>

        </div>
    </div>
</div>