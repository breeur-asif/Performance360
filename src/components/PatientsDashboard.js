import React ,{Component} from 'react';
import Home from './Home';
 
import { NavLink } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Button ,Navbar ,Form ,Nav ,FormControl ,} from 'react-bootstrap';
import {Redirect} from 'react-router-dom';



  class PatientsDashboard extends Component{


render(){


   if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 1  ){


}else {

return (<Redirect to={'/'}/>)

}


  return (

       <div class="container-fluid">
      
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