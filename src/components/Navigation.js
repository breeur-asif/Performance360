import React from 'react';
 import Home from './Home';
import { NavLink } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Button ,Navbar ,Form ,Nav ,FormControl ,} from 'react-bootstrap';

 
 class Navigation extends React.Component{


     logout  =() => {


    sessionStorage.clear();

       window.location.reload(false);
      this.props.history.push('/'); 
}




  render(){



    if(sessionStorage.getItem('usertype') == 1  ){

    return (
       <div>
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
           <Nav.Link href="/">Dashboard</Nav.Link>
           <Nav.Link href="/Patientsprofile">Profile</Nav.Link>
           <Nav.Link href="/Customerorders">Orders</Nav.Link>
        
           <Nav.Link href="/Customerbookservice">Book Service</Nav.Link>
        
              <Nav.Link onClick={this.logout}>Logout</Nav.Link>
            
        </Nav>
        
       </Navbar.Collapse>
     </Navbar>
       </div>
    );

} else if(sessionStorage.getItem('userData') === null){

    return (
       <div>
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
           <Nav.Link href="/">Home</Nav.Link>
           <Nav.Link href="/about">About</Nav.Link>
           <Nav.Link href="/contact">Learn More</Nav.Link>
           <Nav.Link href="/patients">Patient</Nav.Link>
           <Nav.Link href="/providers">Providers</Nav.Link>
            
         </Nav>
        
       </Navbar.Collapse>
     </Navbar>
       </div>
    );
  }  else if(sessionStorage.getItem('usertype') == 2){

    return (
       <div>
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
          <Nav.Link href="/Providerdashboard">Dashboard</Nav.Link>
          <Nav.Link href="/Providerprofile">Profile</Nav.Link>
          <Nav.Link href="/Providerteam">Team</Nav.Link>
          <Nav.Link href="/Providerorders">Orders</Nav.Link>
          <Nav.Link href="/Providersubscription">Subscription</Nav.Link>
          <Nav.Link onClick={this.logout} >Logout</Nav.Link>
           
        </Nav>
        
       </Navbar.Collapse>
     </Navbar>
       </div>
    );
  }

}
  }
 




 
export default Navigation;
