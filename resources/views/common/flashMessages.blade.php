<div class="row">
    <div class="col-xs-12">
        <section class="alerts" style="margin-left: -1.5rem; margin-right: -1.5rem;">
            @if(session()->has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {!! session()->get('success')!!}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {!! session()->get('error') !!}
                </div>
            @endif
        </section>
    </div>
 </div>