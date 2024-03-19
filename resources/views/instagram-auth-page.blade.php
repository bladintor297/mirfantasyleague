
@extends('layouts.main-layout')

@section('content')

<section class="mt-5 pt-5">
<a class="btn btn-primary" href="https://api.instagram.com/oauth/authorize
?client_id=302821645742018
&redirect_uri=https://socialsizzle.heroku.com/auth/
&scope=user_profile,user_media
&response_type=code">Click to get Instgram permission</a>
</section>    
@endsection