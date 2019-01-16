<section class="Smile__tempelate">
  <div class="Smile__wrapper">
    <div class="newsmile__wrapper">
      <div class="newsmile">
        <h1 class="h--3">Hey
          <?php echo $cust_name; ?>, we're excited to meet you.</h1>
        <p>Your appointment is
          <?php echo $schedule_class->timeStart; ?>,
          <?php echo $appt_date_alp; ?> at
          <?php echo $schedule_class->location; ?>. During your visit, which will take 30 minutes, you'll be able to
          see an image of your teeth. We'll use that to create your new smile. See your appointment confirmation email
          for more details.
          <br /><br />
          Please email us at <a href="mailto:info@puresmilesonline.com">info@puresmilesonline.com</a> if you have any
          questions!
        </p>
        <div class="text__center">
         <div class="ctas-a__buttons">
            <a href="http://puresmilesonline.com/reschedule/?patientid=<?php echo $cust_pt_id; ?>&scheduleid=<?php echo $cust_sheduleid; ?>" target="" class="ctas-a__button button button--primary">RESCHEDULE VISIT</a>
          </div> <!-- 
          <p>Call us at</p>
          <h1 class="h--3">(800) 688-4010</h1>
          <p>Monday-Friday 7am-5pm CST</p>
          <p>Saturday 8am-9pm CST</p> -->
        </div>
      </div>
    </div>
    <div class="futuresmile__wrapper">
      <div class="futuresmile">
        <img src="/wp-content/uploads/2019/01/icon.jpg" alt="">
        <h1 class="h--3">Ask Away</h1>
        <p>Please find the answers to all your burning aligner questions in our FAQ section.</p>
        <div class="ctas-a__buttons">
          <a href="#" target="" class="ctas-a__button button button--primary">VIEW THE FAQ</a>
        </div>
      </div>
    </div>
  </div>
  <div class="detail__news" style="display:none;">
    <div class="newsmile">
      <h1 class="h--3">Detailed Directions</h1>
      <p>Our Birmingham SmileShop is conveniently located within Sola Salons at 710 inverness Corners, Birmingham, AL
        35424</p>
      <h1 class="h--3">Helpful hints</h1>
      <ul>
        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
      </ul>
    </div>
  </div>
</section>