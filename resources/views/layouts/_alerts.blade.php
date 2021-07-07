<div class="container-fluid">
@if (session('error'))
  <div class="alert alert-danger status-box alert-dismissable fade show" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;<span class="sr-only">Close</span></a>
    <h4><i class="fas fa-times"></i> Erreur</h4>
    {!! session('error') !!}
  </div>
@endif

@if (session('success'))
  <div class="alert alert-success alert-dismissable fade show" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <h4><i class="icon fa fa-check fa-fw" aria-hidden="true"></i> Succès</h4>
    {!! session('success') !!}
  </div>
@endif

@if (session('info'))
  <div class="alert alert-info alert-dismissable fade show" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <h4><i class="fas fa-info"></i> Info</h4>
    {!! session('info') !!}
  </div>
@endif

@if (session('warning'))
  <div class="alert alert-warning alert-dismissable fade show" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <h4><i class="fas fa-exclamation-triangle"></i> Attention</h4>
    {!! session('warning') !!}
  </div>
@endif

@if (session('errors') && count($errors) > 0)
  <div class="alert alert-danger alert-dismissable fade show" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <h4>
      {{ Lang::get('auth.someProblems') }}
    </h4>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
</div>