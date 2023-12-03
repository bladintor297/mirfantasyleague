

@extends('layouts.main-layout')

@section('content')

<!-- Hero -->
<section class="position-relative pt-5" style="background-color: #151922;" data-bs-theme="dark">

    <!-- Content -->
    <div class="container position-relative zindex-2 pt-5 pb-2 pb-md-0">

      <div class="row justify-content-center pt-3 mt-3">
        <div class="col-xl-6 col-lg-7 col-md-8 col-sm-10 text-center">
          <h1 class="mb-4 text-warning display-3">Get in Touch</h1>
          <p class="text-white fs-lg pb-3 mb-3">Have a project in mind? To request a quote contact us directly or fill out the form and let us know how we can help.</p>
          <div class="d-flex justify-content-center">
            <a href="https://www.facebook.com/profile.php?id=61551020144213&mibextid=ZbWKwL" class="btn btn-icon btn-secondary btn-facebook rounded-circle mx-2" aria-label="Facebook">
              <i class="bx bxl-facebook"></i>
            </a>
            <a href="https://instagram.com/m5.fantasyleague/" class="btn btn-icon btn-secondary btn-instagram rounded-circle mx-2" aria-label="Instagram">
              <i class="bx bxl-instagram"></i>
            </a>
            <a href="mailto:support@mirfantasyleague.com" class="btn btn-icon btn-secondary btn-google rounded-circle mx-2" aria-label="Google">
              <i class="bx bxl-google"></i>
            </a>
            <a href="https://whatsapp.com/channel/0029Va96uAn6buMQ7bjbrg2N" class="btn btn-icon btn-secondary btn-whatsapp rounded-circle mx-2" aria-label="Whatsapp">
              <i class="bx bxl-whatsapp"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom shape -->
    <div class="d-flex position-absolute top-100 start-0 w-100 overflow-hidden mt-n5 " style="color: #151922;">
      <div class="position-relative start-50 translate-middle-x flex-shrink-0 mt-n5 mt-md-n3 mt-lg-n1" style="width: 3788px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="3788" height="144" viewBox="0 0 3788 144"><path fill="currentColor" d="M0,0h3788.7c-525,90.2-1181.7,143.9-1894.3,143.9S525,90.2,0,0z"/></svg>
      </div>
    </div>
  </section>


 


  <!-- FAQ (Accordion) -->
  <section class="container py-5 my-md-2 my-lg-4 my-xl-5">
    <div class="bg-secondary rounded-3 py-5 px-3 px-sm-4 px-md-0">
      <h2 class="text-center pt-md-1 pt-lg-3 pt-xl-4 pb-4 mt-xl-1 mb-2">Frequently Asked Questions</h2>
      <div class="row justify-content-center pb-lg-4 pb-xl-5">
        <div class="col-xl-8 col-lg-9 col-md-10 pb-md-2">
          <div class="accordion" id="faq">

            <!-- Item -->
            <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
              <h3 class="accordion-header">
                <button class="accordion-button shadow-none rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#q-1" aria-expanded="true" aria-controls="q-1">How to join this MIR Fantasy League?</button>
              </h3>
              <div class="accordion-collapse collapse show" id="q-1" data-bs-parent="#faq">
                <div class="accordion-body fs-sm pt-0">
                  <p align="justify">
                    Sign up your team at the “SIGN IN” tab. Check for any on-going tournament in the LEAGUE tab and select the tournament that you want to participate. Read and accept the Rules & Regulations, start to build up your strongest team by choosing the best players. Save your team, watch the tournament and see the winners in the SCOREBOARD tab!
                  </p>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
              <h3 class="accordion-header">
                <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q-2" aria-expanded="false" aria-controls="q-2">Is there any participation fee?</button>
              </h3>
              <div class="accordion-collapse collapse" id="q-2" data-bs-parent="#faq">
                <div class="accordion-body fs-sm pt-0">
                  <p align="justify">
                    For now, there’s no participation fee. You are free to join!
                  </p>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
              <h3 class="accordion-header">
                <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q-4" aria-expanded="false" aria-controls="q-4">
                  What are the prizes for a certain Fantasy League/tournament?
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="q-4" data-bs-parent="#faq">
                <div class="accordion-body fs-sm pt-0">
                  <p align="justify">
                    You can check the prize pool in the PRIZES tab. Sometimes, the prize pool will be announced late (after the Fantasy League started). So, just stay tune for the prize pool update and stay supporting us!
                  </p>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
              <h3 class="accordion-header">
                <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q-3" aria-expanded="false" aria-controls="q-3">
                  Other official social media?
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="q-3" data-bs-parent="#faq">
                <div class="accordion-body fs-sm pt-0">
                  <p align="justify">
                    In conjunction with on-going M5 World Championship, we have Facebook page; 
                    <a target="_blank" href="https://www.facebook.com/profile.php?id=61551020144213&mibextid=ZbWKwL" class="text-warning">Fantasy League M5 World Championship</a>,
                    Instagram page; <a href="https://www.instagram.com/mlbbm5.fantasyleague" class="text-warning" target="_blank" >@mlbbm5.fantasyleague</a>,
                    English WhatsApp channel; <a href="https://whatsapp.com/channel/0029Va96uAn6buMQ7bjbrg2N" class="text-warning" target="_blank">Fantasy League M5 World Championship</a>
                    and Malay WhatsApp channel; <a href="https://whatsapp.com/channel/0029VaCOMyAInlqSntuhiR0J" class="text-warning" target="_blank">Liga Fantasi M5 World Championship</a>. 
                    Please follow our social medias for the latest updates!
                  </p>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
              <h3 class="accordion-header">
                <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q-5" aria-expanded="false" aria-controls="q-5">How the team score is calculated</button>
              </h3>
              <div class="accordion-collapse collapse" id="q-5" data-bs-parent="#faq">
                <div class="accordion-body fs-sm pt-0">
                  <p>
                    Each role (EXP Laner, Jungler, Mid Laner, Gold Laner and Roamer) has different point calculation based on player’s KDA during a certain match, please refer table below. Besides, there are bonus points too from team winning point and multiplier (refer table below), MVP point (+5 points) and getting triple kill (+1 point) or maniac (+2 points) or savage (+3 points).
                  </p>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Role</th>
                        <th>Kill Point</th>
                        <th>Death Point</th>
                        <th>Assist Point</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>EXP Laner</td>
                        <td>2</td>
                        <td>-1</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <td>Jungler</td>
                        <td>1</td>
                        <td>-3</td>
                        <td>2</td>
                      </tr>
                      <tr>
                        <td>Mid Laner</td>
                        <td>1</td>
                        <td>-2</td>
                        <td>2</td>
                      </tr>
                      <tr>
                        <td>Gold Laner</td>
                        <td>1</td>
                        <td>-2</td>
                        <td>2</td>
                      </tr>
                      <tr>
                        <td>Roamer</td>
                        <td>3</td>
                        <td>-1</td>
                        <td>1</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div class="accordion-item border-0 rounded-3 shadow-sm">
              <h3 class="accordion-header">
                <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q-6" aria-expanded="false" aria-controls="q-6">How the winners will be contacted to claim their prizes?</button>
              </h3>
              <div class="accordion-collapse collapse" id="q-6" data-bs-parent="#faq">
                <div class="accordion-body fs-sm pt-0">
                  <p>
                    The organizer will contact the winners through the phone number (WhatsApp) and email provided. Make sure to fill in the correct informations in the team details!
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection