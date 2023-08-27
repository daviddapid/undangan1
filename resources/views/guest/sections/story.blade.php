 <!-- start story-section -->
 <section class="story-section section-padding" id="story">
   <div class="container">
     <div class="row">
       <div class="wpo-section-title">
         <div class="section-title-icon">
           <i class="fi flaticon-dove"></i>
         </div>
         <h2>Our Sweet Story</h2>
       </div>
     </div>
     <div class="row">
       <div class="col col-xs-12">
         <div class="story-timeline">
           <div class="row">
             <div class="col offset-lg-6 col-lg-6 col-12 text-holder">
               <span class="heart">
                 <i class="fi flaticon-balloon"></i>
               </span>
             </div>
           </div>
           @foreach ($stories as $i => $s)
             @if ($i % 2 == 0)
               <div class="story-timeline-item @if ($i == 0) s1 @endif">
                 <div class="row align-items-center">
                   <div class="col col-lg-6 col-12">
                     <div class="img-holder right-align-text left-site right-heart">
                       <img src="{{ asset('storage/' . $s->photo) }}" alt
                         style="width:510px; height:600px; object-fit: cover"
                         class="img img-responsive wow fadeInLeftSlow" data-wow-duration="1500ms" />
                       <span class="heart">
                         <i class="fi flaticon-dove"></i>
                       </span>
                     </div>
                   </div>
                   <div class="col col-lg-6 col-12">
                     <div class="story-text left-align-text wow fadeInRightSlow" data-wow-duration="2000ms">
                       <h3>{{ $s->title }}</h3>
                       <span class="date">{{ $s->formatedDate() }}</span>
                       <div class="line-shape">
                         <div class="outer-ball">
                           <div class="inner-ball"></div>
                         </div>
                       </div>
                       <p>
                         {{ $s->description }}
                       </p>
                     </div>
                   </div>
                 </div>
               </div>
             @else
               <div class="story-timeline-item">
                 <div class="row align-items-center">
                   <div class="col col-lg-6 col-12 order-lg-1 order-2 text-holder left-text">
                     <div class="story-text right-align-text wow fadeInLeftSlow" data-wow-duration="2000ms">
                       <h3>{{ $s->title }}</h3>
                       <span class="date">{{ $s->formatedDate() }}</span>
                       <div class="line-shape s2">
                         <div class="outer-ball">
                           <div class="inner-ball"></div>
                         </div>
                       </div>
                       <p>
                         {{ $s->description }}
                       </p>
                     </div>
                   </div>
                   <div class="col col-lg-6 col-12 order-lg-2 order-1">
                     <div class="img-holder left-align-text">
                       <img src="{{ asset('storage/' . $s->photo) }}" alt
                         style="width:510px; height:600px; object-fit: cover"
                         class="img img-responsive wow fadeInRightSlow" data-wow-duration="1500ms" />
                       <span class="heart">
                         <i class="fi flaticon-dance"></i>
                       </span>
                     </div>
                   </div>
                 </div>
               </div>
             @endif
           @endforeach
           {{-- <div class="story-timeline-item s1">
             <div class="row align-items-center">
               <div class="col col-lg-6 col-12">
                 <div class="img-holder right-align-text wow fadeInLeftSlow" data-wow-duration="1500ms">
                   <img src="guest/assets/images/story/1.jpg" alt class="img img-responsive" />
                 </div>
               </div>
               <div class="col col-lg-6 col-12">
                 <div class="story-text left-align-text wow fadeInRightSlow" data-wow-duration="2000ms">
                   <h3>First Time We Meet</h3>
                   <span class="date">19 Jan 2018</span>
                   <div class="line-shape">
                     <div class="outer-ball">
                       <div class="inner-ball"></div>
                     </div>
                   </div>
                   <p>
                     Lorem ipsum dolor sit amet,
                     constetur adicng elit.
                     Ultricies nulla mi tempus
                     mcorper for praesent.
                     Ultricies interdum volutpat
                     morbi nam ornare neque elit
                     leo, diam. Malesuada enim ac
                     amurna tempor vel duis.
                   </p>
                 </div>
               </div>
             </div>
           </div>
           <div class="story-timeline-item">
             <div class="row align-items-center">
               <div class="col col-lg-6 col-12 order-lg-1 order-2 text-holder left-text">
                 <div class="story-text right-align-text wow fadeInLeftSlow" data-wow-duration="2000ms">
                   <h3>Our First Date</h3>
                   <span class="date">22 May 2021</span>
                   <div class="line-shape s2">
                     <div class="outer-ball">
                       <div class="inner-ball"></div>
                     </div>
                   </div>
                   <p>
                     Lorem ipsum dolor sit amet,
                     constetur adicng elit.
                     Ultricies nulla mi tempus
                     mcorper for praesent.
                     Ultricies interdum volutpat
                     morbi nam ornare neque elit
                     leo, diam. Malesuada enim ac
                     amurna tempor vel duis.
                   </p>
                 </div>
               </div>
               <div class="col col-lg-6 col-12 order-lg-2 order-1">
                 <div class="img-holder left-align-text">
                   <img src="guest/assets/images/story/2.jpg" alt class="img img-responsive wow fadeInRightSlow"
                     data-wow-duration="1500ms" />
                   <span class="heart">
                     <i class="fi flaticon-dance"></i>
                   </span>
                 </div>
               </div>
             </div>
           </div>
           <div class="story-timeline-item">
             <div class="row align-items-center">
               <div class="col col-lg-6 col-12">
                 <div class="img-holder right-align-text left-site right-heart">
                   <img src="guest/assets/images/story/3.jpg" alt class="img img-responsive wow fadeInLeftSlow"
                     data-wow-duration="1500ms" />
                   <span class="heart">
                     <i class="fi flaticon-dove"></i>
                   </span>
                 </div>
               </div>
               <div class="col col-lg-6 col-12">
                 <div class="story-text left-align-text wow fadeInRightSlow" data-wow-duration="2000ms">
                   <h3>She Said Yes!</h3>
                   <span class="date">15 June 2022</span>
                   <div class="line-shape">
                     <div class="outer-ball">
                       <div class="inner-ball"></div>
                     </div>
                   </div>
                   <p>
                     Lorem ipsum dolor sit amet,
                     constetur adicng elit.
                     Ultricies nulla mi tempus
                     mcorper for praesent.
                     Ultricies interdum volutpat
                     morbi nam ornare neque elit
                     leo, diam. Malesuada enim ac
                     amurna tempor vel duis.
                   </p>
                 </div>
               </div>
             </div>
           </div> --}}
         </div>
       </div>
     </div>
     <!-- end row -->
   </div>
   <!-- end container -->
   <div class="shape-1">
     <div class="sticky-shape">
       <img src="guest/assets/images/rsvp/shape1.png" alt="" />
     </div>
   </div>
   <div class="shape-2">
     <div class="sticky-shape">
       <img src="guest/assets/images/rsvp/shape2.png" alt="" />
     </div>
   </div>
 </section>
 <!-- end story-section -->
