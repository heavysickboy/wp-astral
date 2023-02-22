<?php
//Template Name: Thank you
get_header();
?>   
<style>
.wrapper-1 {
  width: 100%;
  height: 100vh;
  display: flex;
  flex-direction: column;
}
.wrapper-2 {
  padding: 30px;
  text-align: center;
}
h1 {
  /*font-family: "Kaushan Script", cursive;*/
  font-size: 4em;
  letter-spacing: 3px;
  /*color: #5892ff;*/
  margin: 0;
  margin-bottom: 20px;
}
.wrapper-2 p {
  margin: 0;
  font-size: 1.3em;
  color: #aaa;
  letter-spacing: 1px;
  line-height: 1.5;  
}
.go-home {
  color: #fff;
  background: #a56d5a;
  border: none;
  padding: 10px 50px;
  margin: 30px 0;
  border-radius: 30px;
  text-transform: capitalize;
  box-shadow: 0 10px 16px 1px rgb(165 109 90 / 50%);
}
.footer-like {
  margin-top: auto;
  background: #f5f5f5;
  padding: 6px;
  text-align: center;
}
.footer-like p {
  margin: 0;
  padding: 4px;
  color: #000;
  font-family: "Source Sans Pro", sans-serif;
  letter-spacing: 1px;
}
.footer-like p a {
  text-decoration: none;
  color: #000;
  font-weight: 600;
}

@media (min-width: 360px) {
  h1 {
    font-size: 4.5em;
  }
  .go-home {
    margin-bottom: 20px;
  }
}

@media (min-width: 600px) {
  .content {
    max-width: 1000px;
    margin: 0 auto;
  }
  .wrapper-1 {
    height: initial;
    max-width: 620px;
    margin: 0 auto;
    margin-top: 50px;
    box-shadow: 0 10px 16px 1px rgb(165 109 90 / 50%);
  }
}

</style>
<div class="pageWrapper" id="sticky-anchor">
  <!-- About Section -->
  <section>
     <div class="container py-5 mt-5 position-relative">
      <div class="row mt-5">
      <div class="wrapper-1 col-12">
        <div class="wrapper-2">
          <h1>Thank you !</h1>
          <p>for the enquiry & your valued interest. </p>
          <p class="mb-3">Our team will connect with you shortly.</p>
          <a href="https://astralbathware.com" class="go-home">
            go home
          </a>
        </div>
        <div class="footer-like">
          <p>Do you want to know more about us?
            <a href="https://astralbathware.com/aboutus">Click here</a>
          </p>
        </div>
      </div>
    </div>
    </div>
  </section>
</div>
 <?php get_footer(); ?>