<?php

  $value = $_POST['conhecimento'];

?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Custom Range Slider | CodingNepal</title>
    <link rel="stylesheet" href="style.css">


    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  text-align: center;
  place-items: center;
  background: #664AFF;
}
.range{
  height: 80px;
  width: 380px;
  background: #fff;
  border-radius: 10px;
  padding: 0 65px 0 70px;
  box-shadow: 2px 4px 8px rgba(0,0,0,0.1);
}
.sliderValue{
  position: relative;
  width: 100%;
}
.sliderValue span{
  position: absolute;
  height: 45px;
  width: 45px;
  transform: translateX(-70%) scale(0);
  font-weight: 500;
  top: -40px;
  line-height: 55px;
  z-index: 2;
  color: #fff;
  transform-origin: bottom;
  transition: transform 0.3s ease-in-out;
}
.sliderValue span.show{
  transform: translateX(-70%) scale(1);
}
.sliderValue span:after{
  position: absolute;
  content: '';
  height: 100%;
  width: 100%;
  background: #664AFF;
  border: 3px solid #fff;
  z-index: -1;
  left: 50%;
  transform: translateX(-50%) rotate(45deg);
  border-bottom-left-radius: 50%;
  box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
  border-top-left-radius: 50%;
  border-top-right-radius: 50%;
}
.field{
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  position: relative;
}
.field .value{
  position: absolute;
  font-size: 18px;
  color: #664AFF;
  font-weight: 600;
}
.field .value.left{
  left: -60px;
}
.field .value.right{
  right: -43px;
}
.range input{
  -webkit-appearance: none;
  width: 100%;
  height: 3px;
  background: #ddd;
  border-radius: 5px;
  outline: none;
  border: none;
  z-index: 2222;
}
.range input::-webkit-slider-thumb{
  -webkit-appearance: none;
  width: 20px;
  height: 20px;
  background: red;
  border-radius: 50%;
  background: #664AFF;
  border: 1px solid #664AFF;
  cursor: pointer;
}
.range input::-moz-range-thumb{
  -webkit-appearance: none;
  width: 20px;
  height: 20px;
  background: red;
  border-radius: 50%;
  background: #664AFF;
  border: 1px solid #664AFF;
  cursor: pointer;
}
.range input::-moz-range-progress{
  background: #664AFF;
}

    </style>
  </head>
  <body>
    <form method="post"
    action="<?php echo $_SERVER['PHP_SELF'];?>
    ">
    <div class="range">
        <div class="sliderValue">
          <span class="sliderValue-span">100</span>
        </div>
            <div class="field">
            <div class="value left">Baixo</div>
                <input type="range" class="input-value" name="conhecimento" id="conhecimento" min="10" max="200" value="100" steps="1">
            <div class="value right">Alto</div>
            </div>
        </div>
        <?php echo $value;?><br />
        <input type="submit">
        </form>

<script>
      const slideValue = document.querySelector(".sliderValue-span");
      const inputSlider = document.querySelector(".input-value");
      inputSlider.oninput = (()=>{
        let value = inputSlider.value;
        slideValue.textContent = value;
        slideValue.style.left = (value/2) + "%";
        slideValue.classList.add("show");
      });
      inputSlider.onblur = (()=>{
        slideValue.classList.remove("show");
      });
    </script>

  </body>
</html>

