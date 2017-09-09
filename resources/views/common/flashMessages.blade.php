<div class="row">
    <div class="col-xs-12">
        <section class="alerts">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {!! session()->get('success')!!}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {!! session()->get('error') !!}
                </div>
            @endif
        </section>
    </div>
 </div>