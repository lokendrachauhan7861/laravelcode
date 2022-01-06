<div style="border: 5px dotted #b32018;padding: 24px;font-size: 18px;line-height: 37px;width:600px;">
    <div align="center" style="padding-bottom: 10px;font-size: 30px;">
     <span style="color:#B32018; font-size:25px; font-weight: bold;">
     Wellcome - Test Mail</span> 
    </div>


     <div>Hello {{ $name }},
        <br/>
        <br/>This Email For User Verify
        <br/><b>email  :</b>  {{ $email }} .
        <br/> {{ $messagedata }} Please <a href="{{ url('user/verify/'.$email) }}"> Click </a> Here For Activation .
        
        
        <br/>Thanks! <span style="color:#B32018; font-size:20px; font-weight:
      bold;"></span> 
        <br/> <span style="color:#B32018; font-size:20px; font-weight: bold;">
     Test Mail</span> 
       

    </div>

</div>