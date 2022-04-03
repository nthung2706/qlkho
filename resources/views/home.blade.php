@extends('layouts.app')

@section('content')
<!--Main layout-->
<main class=" m-0 p-0">
  <div class="container-fluid m-0 p-0">

    <!--Google map-->
    <div id="map-container-google-4" class="z-depth-1-half map-container-4" style="height: 300px">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.6272291080872!2d105.43015021406795!3d10.371661069371978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a731e7546fd7b%3A0x953539cd7673d9e5!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBBbiBHaWFuZyAtIMSQSFFHIFRQSENN!5e0!3m2!1svi!2s!4v1647246441443!5m2!1svi!2s" frameborder="0"
        style="border:0" ></iframe>
    </div>
    

  </div>
</main>
<!--Main layout-->
<style>
.map-container-4{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
max-height:600px;
}
.map-container-4 iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
</style>
@endsection
