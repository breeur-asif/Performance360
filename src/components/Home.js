import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Segment, Image } from 'semantic-ui-react';
import { Helmet } from 'react-helmet';
import { Button ,Navbar ,Form ,Nav ,FormControl ,} from 'react-bootstrap';
import 'font-awesome/css/font-awesome.min.css';
import '@fortawesome/fontawesome-free/css/fontawesome.min.css';
import '../Style.css';
import PatientsDashboard from './PatientsDashboard';
import {Redirect} from 'react-router-dom';



const src = './logo.png';
const home = () => {
const styleObj = {
textAlign: "justify",
paddingTop: "100px",
}

   if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 1  ){
return (<Redirect to={'/PatientsDashboard'}/>)
}else {



}


return (
<Segment className="Segment">
<Helmet>
<title>Vitruvio - Changing Healthcare in Canada</title>
<link rel="icon" type="image/png" href="logo.png" sizes="16x16" />
</Helmet>
  <div class="container-fluid" >
      <div class="row">
      
         <div class="col-md-6">
       
            <h1 class="wow fadeInUp" style={{color:"#4d8a7c"}}>COMMITTED TO ACCESSIBLE HEALTH</h1>
            <p>A new way for patients to choose healthcare providers that recognizes their commitment to making their services accessible to everyone.</p>

            <Button as="input" className="mr-2" type="submit" value="LEARN MORE   >" id="b1" style={{backgroundColor:"#0e4958"}} />
         </div>
         <div class="col-md-6">
           <img
               src={require('../images/bannar-img-2.png')}
               width="auto"
               height="auto"
               className="img-thumbnail"
               alt="React Bootstrap logo"
               id="img1"
               
         />
         </div>
   </div>
   <div>
      <p style={{fontSize:"20px",paddingLeft:"40px"}}>VITRUVIO IS THE SOLUTION TO </p>
      
   </div>

   <div class="row">
   <div class="col-md-6">
      <h1 class="wow fadeInUp" style={{color:"#4d8a7c"}}>THE HEALTHCARE AFFORDABILITY CRISIS.</h1>
      <Button as="input" className="mr-2" type="submit" value="LEARN MORE" id="b2" />
      </div>
   <div class="col-md-6">
      <p>
         The fact is that many honest and hard working Canadians don’t have medical benefits. Vitruvio allows people with benefits to help those without at no cost.
      </p>
   </div>
</div>
<div id="works">
<h1 style={{color:"#4d8a7c",textAlign:"center"}}> HOW IT WORKS </h1>
<p style={{color:"#0e4958",textAlign:"center"}}>We all have a role to play in making our healthcare system work for everyone</p>
</div>
<div class="row">
   <div class="col-md-1" id="pic1">
   <i class="fa fa-angle-double-right fa-5x" aria-hidden="true"></i>
   </div>
   <div class="col-md-5" id="pic1" >
   
      <p id="text1"> One of the pharmacies in your community commits to accessible health by registering with Vitruvio. They have set a goal to reach in order to be able to give a prescription away for free.</p>
   </div>
   <div class="col-md-6 div1">
      <img
         src={require('../images/img3.jpg')}
         className="d-inline-block align-top"
         alt="React Bootstrap logo"
         id="img2"
      
         />
   </div>
</div>
<div class="row">
   <div class="col-md-6 div1">
      <img
         src={require('../images/img2.jpg')}
        id="img2"
         className="d-inline-block align-top"
         alt="React Bootstrap logo"
         />
   </div>
   <div class="col-md-1" id="pic1">
   <i class="fa fa-angle-double-right fa-5x" aria-hidden="true"></i>
   </div>
   <div class="col-md-5" id="pic1" >
      <p id="text1"> You and your family choose this pharmacy because you want to help make healthcare accessible. You submit your prescription to this pharmacy to help them reach their target.</p>
   </div>
</div>
<div class="row">
<div class="col-md-1" id="pic1">
<i class="fa fa-angle-double-right fa-5x" aria-hidden="true"></i>
</div>
<div class="col-md-5" id="pic1" >
   <p id="text1"> Your neighbour needs to fill a prescription but doesn't have any benefits and can't afford it. They see that the pharmacy has achieved its target and has a free prescription available for them. They submit their prescription and get their medicine for free.</p>
   </div>
   <div class="col-md-6 div1">
      <img
         src={require('../images/img4.jpg')}
       id="img2"
         className="d-inline-block align-top"
         alt="React Bootstrap logo"
         />
   </div>
</div>
<div class="row">
   <div class="col-md-6 div1">
      <img
         src={require('../images/img5.jpg')}
      id="img2"
         className="d-inline-block align-top"
         alt="React Bootstrap logo"
         />
   </div>
   <div class="col-md-1" id="pic1">
   <i class="fa fa-angle-double-right fa-5x" aria-hidden="true"></i>
   </div>
   <div class="col-md-5" id="pic1" >
      <p id="text1">Your choice to use this pharmacy has supported them and allowed them to make their service more accessible to your neighbour who can't afford their medicines.</p>
   </div>
</div>
<div class="row maincard">
<div class="card col-md-5 carddiv">

         <div class="card-body">

<i  className="fas fa-user-md"></i> 

         <h5 class="card-title" id="h5">Healthcare Providers</h5>
         <hr></hr>
        <p class="card-text" id="ct1">We know you care about your patients and do everything you can to make your products and services available to those who struggle to afford it. Sliding scale payment, free medications, pro bono services – we know you do all of it.
        </p> 
        <p id="ct1">We believe you should be recognized for the efforts you make to provide your services to those marginalized people.
        </p> <p id="ct1">        Vitruvio was made for you</p>
    


        <a href="#" class="btn" id="cb1">Sign up here</a>
         </div>

</div>
<div class="card col-md-5 carddiv1">
    <div class="card-body">
         <h5 class="card-title" id="h5">Patients</h5>
         <hr></hr>
        <p class="card-text" id="ct1">Patients with benefits </p> 
        
        <p id="ct1">Did you know you could help someone get their medicine for free just by taking yours? If you knew you could help them get access to free physiotherapy by using your physiotherapy benefits on yourself, would you help?
        </p>
        <p id="ct1">Patients without benefits</p>
        <p id="ct1">Are you in a job without benefits, an entrepreneur, a contract worker? Do you need help?
        </p>
        
        <p id="ct1"></p>
       
        <a href="#" class="btn" id="cb1">Sign up here</a>
</div>
</div>
</div>

<div class="row chatdiv">
<div class="col-md-6">
<h2 style={{color:"darkblue"}}>Do You Believe Healthcare
Services Should Be More Accessible?</h2>
<h3 id="chath3" >
Sign up below and spread the word.
</h3>
<div class="divbtn"><a href="#" class="btn btn-primary"><i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;Facebook</a>&nbsp;<a href="#" class="btn btn-primary"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;Twitter</a>&nbsp;<a href="#" class="btn btn-primary"><i class="fa fa-linkedin-square" aria-hidden="true"></i>&nbsp;Linkedin</a></div>
</div>
<div class="col-md-6" id="chat">
<img
src={require('../images/chat.png')}
width="auto"
height="auto"
className="img-fluid"
alt="React Bootstrap logo"

/>
</div>
</div>



   
<div class="row signup">
<div class="col-md-6">
<h1 style={{color:"white",fontSize:"50px"}}>SIGN UP NOW!</h1>

<p style={{color:"white",fontSize:"30px"}}>Join our mailing list.  Show healthcare providers how committed we are to making services accessible to people who cannot afford it and encourage them to join us.

</p><p style={{color:"white",fontStyle:"italic",fontSize:"15px"}}>
*Remember to click on the verification link in your email after you sign up. (Check your “junk/spam” folder).</p>
</div>
<div class="col-md-6">
<form class="subform">
                

                <div className="form-group ">
                <label>Email</label>
                <input type="email" class="form-control subfom_input" placeholder="Please enter your email address" />
            </div>

            <div className="form-group ">
                <label>Password</label>
                <input type="password" class="form-control subfom_input" placeholder="Please enter your first name" />
            </div>
                
<div> We Take your Privacy Seriously <span style={{color:"green"}}><strong>Terms of Use</strong></span> and <span style={{color:"green"}}>Privacy Policy.</span> </div>
              

                <button type="submit" className="btn btn-primary" style={{backgroundColor:"4d8a7c"}} >Send</button>&nbsp;
                
               
            </form>
</div>
</div>
<div class="row lastdiv">
<div class="col-md-6">
<footer style={{color:"#0e4958"}}>&copy; COPYRIGHT 2019 VITRUVIO.ALL RIGHTS RESERVED.</footer>
  </div>
<div clas="col-md-6" style={{color:"#0e4958",paddingRight:"0px"}}>
<i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-linkedin-square" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div>
 </div> {/* End of container div*/}
</Segment>
);
}
export default home;