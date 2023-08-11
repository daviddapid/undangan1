@extends('guest.layouts.main')

@section('content')
  <audio id="backsound" controls autoplay src="{{ asset('guest/assets/audio/backsound.mp3') }}">
  </audio>

  @include('guest.sections.hero')
  @include('guest.sections.couple')
  @include('guest.sections.video')
  @include('guest.sections.story')
  @include('guest.sections.wpo-cta')
  @include('guest.sections.portfolio')
  @include('guest.sections.contact')
  @include('guest.sections.team')
  @include('guest.sections.event')
  @include('guest.sections.partner')
  @include('guest.sections.comment')




  <!-- color-switcher -->
  <div class="color-switcher-wrap">
    <div class="color-switcher-item">
      <div class="color-toggle-btn">
        <i class="fa fa-cog"></i>
      </div>
      <ul id="switcher">
        <li class="btn btn1" id="Button1"></li>
        <li class="btn btn2" id="Button2"></li>
        <li class="btn btn3" id="Button3"></li>
        <li class="btn btn4" id="Button4"></li>
        <li class="btn btn5" id="Button5"></li>
        <li class="btn btn6" id="Button6"></li>
        <li class="btn btn7" id="Button7"></li>
        <li class="btn btn8" id="Button8"></li>
        <li class="btn btn9" id="Button9"></li>
      </ul>
    </div>
  </div>
@endsection