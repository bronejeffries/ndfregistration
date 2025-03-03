@if (session()->has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong><i class="fa fa-info-circle"></i></strong> {{ session()->get('success') }}
</div>
@endif
@if (session()->has('warning'))
<div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong><i class="fa fa-info-circle"></i></strong> {{ session()->get('warning') }}
</div>
@endif
@if (session()->has('danger'))
<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong><i class="fa fa-info-circle"></i></strong> {{ session()->get('danger') }}
</div>
@endif
@if (session()->has('info'))
<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong><i class="fa fa-info-circle"></i></strong> {{ session()->get('info') }}
</div>
@endif
@if (session()->has('denied access'))
<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong><i class="fa fa-info-circle"></i></strong> {{ session()->get('denied access') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <p>
                <strong><i class="fa fa-info-circle fa-2x"></i></strong> Sorry, the information you provided unfortunately is not as required.
                Please check through the form for the provided corrections and re-submit. <br> Thank you.
        </p>
</div>
@endif
