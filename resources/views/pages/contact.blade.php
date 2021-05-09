@extends('layouts.index')
@section('title', setting('site.title'))
@section('description', "")
@section('keywords', "")
@section('container')

<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-envelope-open-o bg-orange"></i> Contact us <small
                        class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small>
                </h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->

<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-lg-5">
                            <h4>Who we are</h4>
                            <p>Tech Blog is a personal blog for handcrafted, cameramade photography content, fashion
                                styles from independent creatives around the world.</p>

                            <h4>How we help?</h4>
                            <p>Etiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in
                                sollicitudin ligula congue quis turpis dui urna nibhs. </p>

                            <h4>Pre-Sale Question</h4>
                            <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque
                                blandit hendrerit placerat. Integertis non.</p>
                        </div>
                        <div class="col-lg-7">
                            <form class="form-wrapper">
                                <div class="gridContact">
                                    <h2 class="section-title">Contact Us</h2>
                                    <span id="contactMessageSuccess" style="display:none;color: green">Your Message was
                                        sent!</span>
                                    <span id="contactMessageFail" style="display:none;color: red">There was a problem
                                        try
                                        again!</span>
                                </div>
                                <div class="grid">
                                    <div class="grid-col-sm-12 grid-col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" required>
                                            <label for="firstName">Name:</label>

                                            <span class="text-danger" id="name-error"></span>
                                        </div>
                                    </div>
                                    <div class="grid-col-sm-12 grid-col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="phone_number" id="phone_number" required>
                                            <label for="Phone">Phone:</label>
                                            <span class="text-danger" id="phone_number-error"></span>

                                        </div>
                                    </div>
                                    <div class="grid-col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" required>
                                            <label for="email">Email:</label>
                                            <span class="text-danger" id="email-error"></span>
                                        </div>

                                    </div>

                                    <div class="grid-col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="subject" id="subject" required>
                                            <label for="subject">Subject:</label>
                                            <span class="text-danger" id="subject-error"></span>

                                        </div>
                                    </div>
                                    <div class="grid-col-sm-12">
                                        <div class="form-group">
                                            <textarea name="message" rows="7" cols="80" id="message"
                                                required></textarea>
                                            <label for="message">Message:</label>
                                            <span class="text-danger" id="message-error"></span>

                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-outline-teal" type="submit" id="btnContact" value="Send">
                                <!-- 2 -->
                                <div class="loader loader--style2" id="loaderContact" title="1" style="display: none;">
                                    <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60px"
                                        height="60px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                                        xml:space="preserve">
                                        <path fill="#000"
                                            d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                            <animateTransform attributeType="xml" attributeName="transform"
                                                type="rotate" from="0 25 25" to="360 25 25" dur="0.6s"
                                                repeatCount="indefinite" />
                                        </path>
                                    </svg>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#contact-form').on('submit', function(event){
        document.getElementById("btnContact").style.display = "none";
        document.getElementById("loaderContact").style.display = "block";
        event.preventDefault();
        $('#name-error').text('');
        $('#email-error').text('');
        $('#phone-number-error').text('');
        $('#subject-error').text('');
        $('#message-error').text('');

        name = $('#name').val();
        email = $('#email').val();
        phone_number = $('#phone_number').val();
        subject = $('#subject').val();
        message = $('#message').val();

        $.ajax({
          url: "/contact-form",
          type: "POST",
          data:{
              name:name,
              email:email,
              phone_number:phone_number,
              subject:subject,
              message:message,
          },
          success:function(response){
        //   APAGAR este Log
            console.log(response);
            if (response) {

              $('#success-message').text(response.success);

              $("#contact-form")[0].reset();
                document.getElementById("btnContact").style.display = "block";
                document.getElementById("loaderContact").style.display = "none";
                document.getElementById("contactMessageSuccess").style.display = "block";
                setTimeout(function() {
                    $('#contactMessageSuccess').fadeOut('slow');
                    }, 10000); // <-- time in milliseconds
            }
          },
          error: function(response) {
              $('#name-error').text(response.responseJSON.errors.name);
              $('#email-error').text(response.responseJSON.errors.email);
              $('#phone-number-error').text(response.responseJSON.errors.phone_number);
              $('#subject-error').text(response.responseJSON.errors.subject);
              $('#message-error').text(response.responseJSON.errors.message);
              document.getElementById("btnContact").style.display = "block";
            document.getElementById("loaderContact").style.display = "none";
            document.getElementById("contactMessageFail").style.display = "block";
                setTimeout(function() {
                    $('#contactMessageFail').fadeOut('slow');
                    }, 1000); // <-- time in milliseconds
          }
         });
        });


</script>


@endsection
