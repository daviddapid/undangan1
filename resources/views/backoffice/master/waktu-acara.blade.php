@extends('backoffice.layouts.app')
@section('nav-waktu-acara', 'active')
@section('style')
  <link href="https://unpkg.com/@pqina/flip/dist/flip.min.css" rel="stylesheet">
  <style>
    <style>.tick {
      font-size: 1rem;
      white-space: nowrap;
      font-family: arial, sans-serif;
    }

    .tick-flip,
    .tick-text-inline {
      font-size: 2.5em;
    }

    .tick-label {
      margin-top: 1em;
      font-size: 1em;
    }

    .tick-char {
      width: 1.5em;
    }

    .tick-text-inline {
      display: inline-block;
      text-align: center;
      min-width: 1em;
    }

    .tick-text-inline+.tick-text-inline {
      margin-left: -.325em;
    }

    .tick-group {
      margin: 0 .5em;
      text-align: center;
    }

    .tick-text-inline {
      color: rgb(90, 93, 99) !important;
    }

    .tick-label {
      color: rgb(90, 93, 99) !important;
    }

    .tick-flip-panel {
      color: rgb(255, 255, 255) !important;
    }

    .tick-flip {
      font-family: !important;
    }

    .tick-flip-panel-text-wrapper {
      line-height: 1.45 !important;
    }

    .tick-flip-panel {
      background-color: rgb(59, 61, 59) !important;
    }

    .tick-flip {
      border-radius: 0.12em !important;
    }
  </style>
@endsection
@section('script')
  <script src="https://unpkg.com/@pqina/flip/dist/flip.min.js"></script>

  <script>
    function handleTickInit(tick) {
      // format of due date is ISO8601
      // https://en.wikipedia.org/wiki/ISO_8601

      // '2018-01-31T12:00:00'        to count down to the 31st of January 2018 at 12 o'clock
      // '2019'                       to count down to 2019
      // '2018-01-15T10:00:00+01:00'  to count down to the 15th of January 2018 at 10 o'clock in timezone GMT+1

      // create the countdown counter
      var counter = Tick.count.down('{{ $countDownTime }}');

      counter.onupdate = function(value) {
        tick.value = value;
      };
    }
  </script>
@endsection
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex align-items-center">
          <li class="breadcrumb-item fs-4 text-primary active"><a href="{{ route('admin.comment.index') }}">Waktu Acara</a>
          </li>
        </ol>
      </nav>
      <div>
        <button class="btn btn-primary align-middle" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
            class='bx bxs-edit me-2'></i>Update Waktu Acara</button>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Waktu Acara</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('master.waktu-acara.update', $dday->id) }}" method="post" id="form-update">
              @csrf
              <input type="datetime-local" class="form-control" value="{{ $countDownTime }}" name="date_time">
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" form="form-update">Update</button>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-5 justify-content-center">
      <div class="tick" data-did-init="handleTickInit">

        <div data-repeat="true" data-layout="horizontal fit" data-transform="preset(d, h, m, s) -> delay">

          <div class="tick-group">

            <div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">

              <span data-view="flip"></span>

            </div>

            <span data-key="label" data-view="text" class="tick-label"></span>

          </div>

        </div>

      </div>
    </div>
  </div>
@endsection
