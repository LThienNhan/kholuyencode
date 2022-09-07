@extends('site.app')
@section('title', 'Homepage')
@section('content')
<style type="text/css">
  label{
    padding-left:70px;
    color:black;
    font-size:17px;
    font-weight:normal;
  }
  h1{
    font-weight:bold;
  }
  .img {
  padding: 30px;
  transform: scale(1);
  transition: all 0.5ks;
}
.img:hover {
transform: scale(1.1);
}
#noop-top{
  width: 50px;
  height: 50px;
  background-color: tomato;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  position: fixed;
  bottom: 40px;
  right: 20px;
  cursor: pointer;
        }
.infomation{
  list-style-type: none;

}
.infomation li {
width:300px;
  float: left;
text-align:center;
}
</style>
   
<div class="container">
<div class="row">
  
<div style="text-align:left;margin-top:20px" class="col-md-6">
    <div data-aos="fade-right" data-aos-duration="1500">
<h1 style="font-size:35px"><font style="color:black; font-weight: bold;">About</font> 
<font style="color:gray; font-weight: bold;">CERESCAR</font></h1>
</div>
<div data-aos="fade-right" data-aos-duration="1500">
<label style="font-size:17px;padding-left:50px">
With many years of operation and development in the field of production, processing, trading,
business, with many type type and other lines of a way
best for domestic as well as international market.
We always give our customers a wide range of products to choose from
Quality products and guaranteed not to work with customers
CERES CART is must fail.
</label><br>

<h1  style="font-size:25px;color:gray;padding-left:20px"><i class="fas fa-thumbs-up" style="font-size:35px;color:black;">&ensp;</i>Safe</h1>
<label  style="font-size:17px;padding-left:50px">Safe, Attractive, Strong, our products will surely bring the best feeling to you.
</label><br>
<h1  style="font-size:25px;color:gray;padding-left:20px"><i class="fas fa-shipping-fast" style="font-size:35px;color:black;">&ensp;</i>Free shipping</h1>
<label  style="font-size:17px;padding-left:50px">Car transportation all over the country</label>

<h1  style="font-size:25px;color:gray;padding-left:20px"><i class="fas fa-check-circle" style="font-size:35px;color:black;">&ensp;</i>Product quality</h1>
<label>Perfect quality products are absolutely certified with user.
</label>
</div>
</div>
<div class="col-md-6" style="text-align:center;">  
<div data-aos="fade-left" data-aos-duration="1500">
<img src="images/products/super-bike-motor-sport-logo-design-vector-197271890.jpg" style="margin-top:50px"width="80%" height="80%" alt="">
</div>
</div>
</div>

<div class="row" style="background-image:url(images/products/anh-nen-ducati-mau-trang.jpg);background-color: transparent;margin-top:">

<div class="col-md-12" style="margin-top:40px;margin-bottom:40px">
    <div data-aos="fade-up" data-aos-duration="1500">
    <center><h1 style="color:white;font-size:40px;font-weight: bold;">WHY CHOOSE CERESCAR</h1></center>
    <hr style="width:30%;background-color:gray">  
    <center>
    </div>
 <div data-aos="fade-up" data-aos-duration="1500">
     <ul class="infomation">
         	 <li style="font-size:70px;color:#dddd;font-weight: bold;">46
	<div class="form-group" style="font-size:20px;">Market branch</div>
	<div class="form-group" style="font-size:17px;width:100%">Widely distributed branches at home and abroad</div>
          	</li>


          	<li style="font-size:70px;color:#dddd;font-weight: bold;">89%
	<div class="form-group" style="font-size:20px;">Reliability</div>
	<div class="form-group" style="font-size:17px;width:100%">Power, Speed, Prestige is definitely an ideal choice</div>
	</li>


         	 <li style="font-size:70px;color:#dddd;font-weight: bold;">70+
	<div class="form-group" style="font-size:20px">Human Resources</div>
	<div class="form-group" style="font-size:17px;width:100%">Staff Enthusiastic, Friendly and experienced in this field</div>
	</li>

          	<li style="font-size:70px;color:#dddd;font-weight: bold;">83
	<div class="form-group" style="font-size:20px">Satisfying Needs</div>
	<div class="form-group" style="font-size:17px;width:100%">Suitable for customers who are passionate about speed</div>
	</li>

 </ul>
    </center>
       </div>
    </div>
</div>
<br><br>
</div>
@stop
