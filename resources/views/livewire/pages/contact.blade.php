 <main class="fix">

     <!-- breadcrumb-area-start -->
     <section class="eg-breadcrumb__area theme-bg mb-130 p-relative z-index-1 scene">
         <div class="eg-breadcrumb">
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-lg-12">
                         <div class="">
                             <div class="eg-breadcrumb__title-opacity d-flex justify-content-center">
                                 <h2 class="title">Contact</h2>
                             </div>
                         </div>
                         <div class="eg-breadcrumb__content">
                             <h2 class="title">Contact</h2>
                             <nav aria-label="breadcrumb">
                                 <ol class="eg-breadcrumb__list">
                                     <li class="eg-breadcrumb__item"><a href="{{ asset('home') }}">Home</a></li>
                                     <li class="eg-breadcrumb__item active" aria-current="page">Contact</li>
                                 </ol>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="eg-banner__circle-1"></div>
             <div class="eg-breadcrumb__shape one">
                 <img class="layer" data-depth="0.3" src="{{ asset('assets/img/banner/banner-shape-01.png') }}"
                     alt="img">
             </div>
             <div class="eg-breadcrumb__shape two scene-y">
                 <img class="layer" data-depth="3" src="{{ asset('assets/img/banner/banner-shape-02.png') }}"
                     alt="shape">
             </div>
             <div class="eg-breadcrumb__shape three">
                 <img class="layer" data-depth="0.3" src="{{ asset('assets/img/banner/banner-shape-03.png') }}"
                     alt="shape">
             </div>
             <div class="eg-breadcrumb__shape four">
                 <img class="layer" data-depth="0.3" src="{{ asset('assets/img/banner/banner-shape-04.png') }}"
                     alt="shape">
             </div>
         </div>
     </section>
     <!-- breadcrumb-area-start -->

     <!-- contact form -->
     <section class="eg-contact__area mb-120">
         <div class="container">
             <div class="row">
                 <!-- contact info -->
                 <div class="col-md-5 mb-4">
                     <h3>Get in Touch</h3>
                     <p>
                         Have a question about our products or services?
                         We’d love to hear from you! Reach out using the form
                         or the contact details below.
                     </p>
                     <ul class="list-unstyled">
                         <li><strong>Phone:</strong> ‪+92 300 1234567‬</li>
                         <li><strong>Email:</strong> support@supex.com</li>
                         <li><strong>Address:</strong> 123 Main Street, Karachi, Pakistan</li>
                     </ul>
                 </div>

                 <!-- contact form -->
                 <div class="col-md-7">
                     <form action="send-message.php" method="post" class="p-4 border rounded-3 shadow-sm bg-light">
                         <div class="mb-3">
                             <label for="name" class="form-label">Your Name</label>
                             <input type="text" name="name" id="name" class="form-control" required>
                         </div>
                         <div class="mb-3">
                             <label for="email" class="form-label">Your Email</label>
                             <input type="email" name="email" id="email" class="form-control" required>
                         </div>
                         <div class="mb-3">
                             <label for="message" class="form-label">Message</label>
                             <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                         </div>
                         <button type="submit" class="btn btn-primary">Send Message</button>
                     </form>
                 </div>
             </div>
         </div>
     </section>

 </main>
