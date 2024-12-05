<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woodify</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="main.css">
    <style>
        .chatbot-btn {
            position: fixed;
            bottom: 30px;
            right: 20px;
            z-index: 1000;
            background-color: #007bff; 
            color: white;
            border-radius: 50px;
            width: 70px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .chatbot-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="bg-footer" >
    <a href="https://cdn.botpress.cloud/webchat/v2/shareable.html?botId=2517dcdc-eb07-47ef-9801-b438aa68355c" class="chatbot-btn">
        <img src="pic/robot.png" alt="" height="50" width="50"> 
    </a>
        <div class="footer-flex" >
            <div class="footer1">
                <h2>Woodify</h2>
                <section class="foot">
                    Woodify is a revolutionary online platform that combines the ease of buying and selling pre-loved furniture with the power of cutting-edge machine learning. 
                    We understand the desire for beautiful and unique pieces that reflect your personal style, all while making environmentally conscious choices.
                </section>
            </div>
            <div class="footer1">
                <h2>helpful links</h2>
                <li><a href="#">about us</a></li>
                <li><a href="#">our blog</a></li>
                <li><a href="#">visit site</a></li>
                <li><a href="#">contact us</a></li>
                <li><a href="#">apply a job</a></li>
            </div>
            <div class="footer1">
                <h2>shopping</h2>
                <li><a href="#">online cards</a></li>
                <li><a href="#">return policy</a></li>
                <li><a href="#">privacy policy</a></li>
                <li><a href="#">shipping</a></li>
                <li><a href="#">inventory</a></li>
            </div>
            <div class="footer1">
                <h2>payment methods</h2>
                <section>
                    Select one of the most common ways to Pay a Money for our Products.
                </section>
                <div class="footer-logo">
                    <img src="pic/payment meathod.png" alt="">
                </div>
            </div>
        </div>
        <hr>
        <div class="copy">
            <section>
                copyright &copy; at 2024 by <span> Moarij,Taha and Sawaira</span>
            </section>
        </div>
    </div>

    
    

    <div class="top">
        <i class="fas fa-chevron-up"></i>
    </div>

    
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        autoplay: true,
        speed: 600,
        breakpoints: {
          576: {
            slidesPerView: 2,
            spaceBetween: 30,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 10,
          },
          991: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
        },
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>
    
