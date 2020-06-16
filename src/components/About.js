import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../Style.css';
import { Helmet } from 'react-helmet';
const About = () => {
    return (
       <div class="container-fluid">
       <Helmet>
<title>Vitruvio - About</title>
</Helmet>
          <h1>ABOUT US</h1>
          <div class="row" style={{marginBottom:"40px"}}>
          <div class="col-md-6">
          </div>
          <div class="col-md-6 align"> <h2 >How we started</h2></div>
          </div>
        
          <div class="row">
          <div class="col-md-6" id="clin">
          <img
src={require('../images/clinton1.jpg')}
height="500px"
width="300px" 
className="d-inline-block align-top"
alt="React Bootstrap logo"
/><div class="clinborder">
<div class="elementor-testimonial-details">
<div class="elementor-testimonial-name">Clinton Baretto NP (Ont)</div>
<div class="elementor-testimonial-job">Founder</div>
</div>
</div></div>
          
          <div class="col-md-6">
         
         
       
<p id="p">Vitruvio was founded on a simple premise: to get medications for my patients who don’t have access to a health benefit program. Entrepreneurs, part time workers, gig economy workers, people forced into early retirement who are too young for the government insurance plans – how could I help my patients?</p>

<p id="p">I am a Nurse Practitioner in family practice. I also volunteer as the primary care clinician for a mobile clinic serving individuals who are homeless or at risk of homelessness where I also teach medical residents. I have a small network of healthcare providers who are committed to making care available who have helped my patients over the years. But the need is bigger and their numbers are too few.</p>

<p id="p">I started working on Vitruvio in 2016 and have slowly built it by squirrelling money away from my paycheck each month. I’m not an entrepreneur, just a clinician trying to help the most vulnerable patients in our care.</p>

<p id="p">Vitruvio is the place where we can all help make care accessible for everyone.
</p>
<p id="p">I hope you will join us.</p>
          </div>
          </div>
         
          <div class="healthdiv">
          <img
          src={require('../images/medicalstory.png')}
          height="auto"
          width="auto"
          className="img-fluid"
          alt="React Bootstrap logo"
          />
         
<h2>Health services that work for everyone</h2>


<p id="p1">There was a patient, a young man, who was stuck on a vicious cycle. He struggled with his mental health but when he took his medication, he was well. He could work and he WANTED to work, so he did. But the only jobs he could get were ones where there were no benefits and he would have to pay for his medications.</p>
<p id="p1">A large portion of his paycheque went to pay for his medication and he had to decide if he paid for his medications or for his food. He never went out partying, didn&rsquo;t smoke or drink, and didn&rsquo;t have the latest tech. All he could do with his paycheque was pay his rent and buy his medication. So he was stuck on the welfare system where his medications were covered but he couldn&rsquo;t work.</p>
<p id="p1">It wasn&rsquo;t until we found a generous pharmacist that would give him his medications for free that he was able to break the cycle and realize his full potential. He was so happy that he told everyone he met to use that pharmacy so that the pharmacist would be rewarded with more business&hellip; and THAT is where the concept of Vitruvio came from.</p>


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
          width="450"
          height="400"
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
          <i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-linkedin-square" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
          </div>    </div>
    );
}
 
export default About;