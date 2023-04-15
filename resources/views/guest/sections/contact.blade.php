<!-- start of wpo-contact-section -->
<section class="wpo-contact-section section-padding" id="RSVP">
  <div class="container">
    <div class="wpo-contact-section-wrapper">
      <div class="wpo-contact-form-area">
        <div class="wpo-section-title">
          <div class="section-title-icon">
            <i class="fi flaticon-dove"></i>
          </div>
          <h2>Your Detail</h2>
        </div>

        @auth
          @php
            $u = Auth::user();
          @endphp
          @if ($u->role == 'guest')
            @php
              $g = $u->guest;
            @endphp
            <form method="post" action="{{ route('rsvp.store') }}" class="contact-validation-active">
              @csrf
              <div>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                  value="{{ $u->name }}" />
              </div>
              <div>
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number"
                  value="{{ $g->phone }}" />
              </div>
              <div>
                <select name="number_of_person" class="form-control">
                  <option disabled="disabled" selected value="">
                    Number Of Guests
                  </option>
                  <option value="1" @if ($g->number_of_person == 1) selected @endif>01</option>
                  <option value="2" @if ($g->number_of_person == 2) selected @endif>02</option>
                  <option value="3" @if ($g->number_of_person == 3) selected @endif>03</option>
                  <option value="4" @if ($g->number_of_person == 4) selected @endif>04</option>
                  <option value="5" @if ($g->number_of_person == 5) selected @endif>05</option>
                </select>
              </div>
              <div class="radio-buttons">
                <p>
                  <input type="radio" id="status-attend" name="status" value="attend"
                    @if ($g->status == 'attend') checked @endif />
                  <label for="status-attend">Yes, I will be there</label>
                </p>
                <p>
                  <input type="radio" id="status-absent" name="status" value="absent"
                    @if ($g->status == 'absent') checked @endif />
                  <label for="status-absent">Sorry, I can’t come</label>
                </p>
              </div>
              <div class="submit-area">
                <button type="submit" class="theme-btn-s3">
                  Update My Attendance
                </button>
                <div id="c-loader">
                  <i class="ti-reload"></i>
                </div>
              </div>
              <div class="clearfix error-handling-messages">
                <div id="success">Thank you</div>
                <div id="error">
                  Error occurred while sending email.
                  Please try again later.
                </div>
              </div>
            </form>
          @else
            <form method="post" action="{{ route('rsvp.store') }}" class="contact-validation-active">
              @csrf
              <div>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" />
              </div>
              <div>
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number" />
              </div>
              <div>
                <select name="number_of_person" class="form-control">
                  <option disabled="disabled" selected>
                    Number Of Guests
                  </option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                </select>
              </div>
              <div class="radio-buttons">
                <p>
                  <input type="radio" id="status-attend" name="status" checked value="attend" />
                  <label for="status-attend">Yes, I will be there</label>
                </p>
                <p>
                  <input type="radio" id="status-absent" name="status" value="absent" />
                  <label for="status-absent">Sorry, I can’t come</label>
                </p>
              </div>

              <div class="submit-area">
                <button type="submit" class="theme-btn-s3">
                  Send An Inquiry
                </button>
                <div id="c-loader">
                  <i class="ti-reload"></i>
                </div>
              </div>
              <div class="clearfix error-handling-messages">
                <div id="success">Thank you</div>
                <div id="error">
                  Error occurred while sending email.
                  Please try again later.
                </div>
              </div>
            </form>
          @endif
        @endauth

        @guest
          <form method="post" action="{{ route('rsvp.store') }}" class="contact-validation-active">
            @csrf
            <div>
              <input type="text" class="form-control" name="name" id="name" placeholder="Name" required />
            </div>
            <div>
              <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number"
                required />
            </div>
            <div>
              <select name="number_of_person" class="form-control" required>
                <option disabled="disabled" selected>
                  Number Of Guests
                </option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
              </select>
            </div>
            <div class="radio-buttons">
              <p>
                <input type="radio" id="status-attend" name="status" checked value="attend" />
                <label for="status-attend">Yes, I will be there</label>
              </p>
              <p>
                <input type="radio" id="status-absent" name="status" value="absent" />
                <label for="status-absent">Sorry, I can’t come</label>
              </p>
            </div>

            <div class="submit-area">
              <button type="submit" class="theme-btn-s3">
                Send An Inquiry
              </button>
              <div id="c-loader">
                <i class="ti-reload"></i>
              </div>
            </div>
            <div class="clearfix error-handling-messages">
              <div id="success">Thank you</div>
              <div id="error">
                Error occurred while sending email.
                Please try again later.
              </div>
            </div>
          </form>
        @endguest

        <div class="border-style"></div>
      </div>
      <div class="vector-1">
        <img src="guest/assets/images/rsvp/flower1.png" alt="" />
      </div>
      <div class="vector-2">
        <img src="guest/assets/images/rsvp/flower2.png" alt="" />
      </div>
    </div>
  </div>
  <div class="shape-1">
    <img src="guest/assets/images/rsvp/shape1.png" alt="" />
  </div>
  <div class="shape-2">
    <img src="guest/assets/images/rsvp/shape2.png" alt="" />
  </div>
</section>
<!-- end of wpo-contact-section -->
