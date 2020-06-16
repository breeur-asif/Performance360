import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../Style.css';
import { Helmet } from 'react-helmet';
const Contact = () => {
    return (
      <div class="container-fluid">
      <Helmet>
<title>Vitruvio - Learn More</title>
</Helmet>
      <h1>LEARN MORE</h1>
      <div class="learndiv">
      <h2 id="learnh2">Vitruvio Is The Solution To The Healthcare Affordability Crisis</h2>
     <p id="p">
     The inequality gap is growing and people without insurance are suffering because they can’t afford their medication. They have to choose between their health and paying their rent, food, utilities. It’s a struggle I see all too often in my family practice.</p>

<p id="p">It’s easy to blame the costs on brand name drugs (e.g. Advil) but even generics (e.g. Ibuprofen) are unaffordable for some people. For some, even a few bucks will break their finances.</p>



<p id="p">It’s not just that medication has become more expensive, everything has become expensive!
     </p>
      </div>
      
     <div class="container-fluid container1">
     <img
     src={require('../images/brooke.jpg')}
     height="auto"
     width="100%"
     className="img-fluid"
     alt="React Bootstrap logo"
     />
  
     <div class="text-fluid top-left">The fact is that many honest, and hard working Canadians don’t have medical benefits. Vitruvio allows people with benefits to help those without at no cost.</div>
     
   </div>
     <div class="learndiv">
     <p id="p">
     As the inequality rises, so do the corporate giant pharmacies that push out the small independent pharmacies. Even when the government slashes what it will pay for drugs, it disproportionately hurts the community pharmacies.</p>

<p id="p">These small pharmacies have historically been the ones that knew the community, knew who was in need and gave them their medications for free or at cost price. They were the ones who took pride in serving their neighbours and friends and brought esteem to their profession.</p>

<p id="p">Corporate pharmacies are more focused on scripts per hour (source: CBC Marketplace), which compromises patient care. They don’t give medications away for free or at cost price as it hurts their bottom line. I have had patients who were turned away from such pharmacies simply because they were paying for the medications themselves and didn’t have an insurance plan.</p>

<p id="p">Many pharmacies, both corporate and independent, are starting to game the system to “maximize” benefit plans at the cost of the healthcare system and patient care. Patients are sent back to their family doctor to get a prescription for something available over the counter under the guise that “It will be covered for you” but in reality, the pharmacy makes more money from billing the insurance plan. Meanwhile the healthcare system has to pay for the cost of the additional visit, but more importantly, our time is taken away from helping other patients. Adding insult to injury, the pharmacy even sends the patient to the walk-in clinic attached to them – which they own!</p>

<p id="p">Vitruvio is a platform that allows communities to reward pharmacies for their commitment to their patients and makes healthcare more affordable for people in need.
     </p>
     </div>
     <div class="row chatdiv" style={{backgroundColor:"rgba(77,138,124,0.23)"}}>
<div class="col-md-6">
<h2 style={{color:"darkblue"}}>Do You Believe Healthcare
Services Should Be More Accessible?</h2>
<h3 id="chath3" >
Sign up below and spread the word.
</h3>
<div class="divbtn"> 
<a href="#" class="btn btn-primary"><i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;Facebook</a>&nbsp;
<a href="#" class="btn btn-danger"><i class="fa fa-google-plus" aria-hidden="true"></i>&nbsp;Google plus</a>&nbsp;
<a href="#" class="btn btn-primary"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;Twitter</a>&nbsp;
<a href="#" class="btn btn-primary"><i class="fa fa-linkedin-square" aria-hidden="true"></i>&nbsp;Linkedin</a></div>
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
<div clas="col-md-6" style={{color:"#0e4958",paddingRight:"0px",textAlign:"right"}}>
<i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-linkedin-square" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div> </div>
    );
}
 
export default Contact;