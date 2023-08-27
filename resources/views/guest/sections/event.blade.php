@push('style')
  <style>
    iframe {
      width: 100%;
    }
  </style>
@endpush
@push('script')
  <script>
    function handleClickMap(map) {
      console.log(map);
      $('#modal-body').html(map);
    }
  </script>
@endpush

<!-- start wpo-event-section -->
<section class="wpo-event-section section-padding" id="event" style="padding-bottom: 0">
  <div class="container">
    <div class="row">
      <div class="wpo-section-title-s2">
        <div class="section-title-icon">
          <i class="fi flaticon-dove"></i>
        </div>
        <h2>When & Where</h2>
      </div>
    </div>
    <div class="wpo-event-wrap">
      <div class="row">
        @foreach ($locations as $l)
          <div class="col col-lg-4 col-md-6 col-12">
            <div class="wpo-event-item">
              <div class="wpo-event-text">
                <h2>{{ $l->title }}</h2>
                <ul>
                  <li>
                    {{ $l->getFormatedDate() }} <br />
                    {{ $l->getFormatedTime() }}
                  </li>
                  {{-- <li>
                     Estern Star Plaza, Road 123, USA
                   </li>
                   <li>+1 234-567-8910</li> --}}

                  <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-reception"
                      onclick="handleClickMap('{{ $l->map }}')">See
                      Location</a>
                  </li>
                </ul>
              </div>

            </div>
          </div>
        @endforeach
        {{-- <div class="col col-lg-4 col-md-6 col-12">
           <div class="wpo-event-item">
             <div class="wpo-event-text">
               <h2>The Ceremony</h2>
               <ul>
                 <li>
                   Monday, 25 Sep, 2022 <br />
                   1:00 PM – 4:30 PM
                 </li>
                 <li>
                   Estern Star Plaza, Road 123, USA
                 </li>
                 <li>+1 234-567-8910</li>
                 <li>
                   <a href="#" data-bs-toggle="modal" data-bs-target="#modal-ceremony">See
                     Location</a>
                 </li>
               </ul>
             </div>
           </div>
         </div>
         <div class="col col-lg-4 col-md-6 col-12">
           <div class="wpo-event-item">
             <div class="wpo-event-text">
               <h2>Wedding Party</h2>
               <ul>
                 <li>
                   Monday, 25 Sep, 2022 <br />
                   1:00 PM – 4:30 PM
                 </li>
                 <li>
                   Estern Star Plaza, Road 123, USA
                 </li>
                 <li>+1 234-567-8910</li>
                 <li>
                   <a href="#" data-bs-toggle="modal" data-bs-target="#modal-wedding">See
                     Location</a>
                 </li>
               </ul>
             </div>
           </div>
         </div> --}}
      </div>
    </div>
  </div>
  <!-- end container -->

</section>
<!-- Modal -->
<div class="modal fade" id="modal-reception" tabindex="-1" aria-labelledby="modal-receptionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-receptionLabel">Reception Location</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">
      </div>
    </div>
  </div>
</div>
<!-- end wpo-event-section -->
