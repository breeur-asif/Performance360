import React ,{Component} from 'react';
import Home from './Home';
 
import { NavLink } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Button ,Navbar ,Form ,Nav ,FormControl ,} from 'react-bootstrap';
import {Redirect} from 'react-router-dom';



  class PatientsDashboard extends Component{

     logout  =() => {

    sessionStorage.clear();
   this.props.history.push("/");
}



render(){

   if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 1  ){

}else {

return (<Redirect to={'/'}/>)

}



  return (



       <div class="container-fluid">
       <Navbar  expand="lg">
       <Navbar.Brand href="/">
       <img
         src={require('../images/logo.png')}
         width="100"
         height="100"
         className="d-inline-block align-top"
         alt="React Bootstrap logo"
   
       />
       </Navbar.Brand>
       

       <Navbar.Toggle aria-controls="basic-navbar-nav" />
       <Navbar.Collapse id="basic-navbar-nav">
         <Nav className="justify-content-end" style={{ width: "100%" ,fontSize:"20px" }}>
           <Nav.Link href="#">Dashboard</Nav.Link>
           <Nav.Link href="/Patientsprofile">Profile</Nav.Link>
           <Nav.Link href="/Customerorders">Orders</Nav.Link>
           <Nav.Link href="/Customerbooking">Bookings</Nav.Link>
           <Nav.Link href="/Customerbookservice">Book Service</Nav.Link>
           <Nav.Link href="/Booksappointment">Book Appointment</Nav.Link>
           <Nav.Link href="#">Logout</Nav.Link>
            
         </Nav>
        
       </Navbar.Collapse>
     </Navbar>
<h1>Favourites</h1>
   <div class="row">
   <div class="col-md-3">
   <h2>Pharmacy</h2>
   <p>No favourite added yet</p>
   </div>
   <div class="col-md-3">
   <h2>Physiotherapy</h2>
   <p>No favourite added yet</p>
   </div>
   <div class="col-md-3">
   <h2>Chiropractor</h2>
   <p>No favourite added yet</p>
   </div>
   <div class="col-md-3">
   <h2>Naturopath</h2>
   <p>No favourite added yet</p>
   </div>
  
   </div>
   <div class="row">
   <div class="col-md-3">
   <h2>Counselling</h2>
   <p>No favourite added yet</p>
   </div>
   <div class="col-md-3">
   <h2>Chiropodist/Podiatrist</h2>
   <p>No favourite added yet</p>
   </div>
   <div class="col-md-3">
   <h2>Speech Language Pathologist</h2>
   <p>No favourite added yet</p>
   </div>
   <div class="col-md-3">
   <h2>Dentist</h2>
   <p>No favourite added yet</p>
   </div>
   </div>
  

       </div>
    );

  }

      
  }



 
export default PatientsDashboard;