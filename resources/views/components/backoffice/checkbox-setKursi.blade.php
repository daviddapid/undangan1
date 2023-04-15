@props(['chair'])

<div class="col-lg-2 col-6 mb-3">
  <div class="card card-kursi" style="position: relative;">
    <input type="checkbox" style="position: absolute; width: 100%; height: 100%; opacity: 0;" value="{{ $chair }}"
      class="checkbox-kursi" name="chairs[]">
    <div class="card-body text-center ">
      {{ $chair->number }}
    </div>
  </div>
</div>
