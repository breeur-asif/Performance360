import React ,{Component} from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import Axios from 'axios';
import {AppContext} from './Context';
import Patient from './Patients';
import  { Redirect } from 'react-router-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import PatientsDashboard from './PatientsDashboard';
  class Register extends Component{
   static contextType=AppContext;

   insertUser=(event)=>{
       event.preventDefault();
       event.persist();
       Axios.post('http://react.vitruvio.ca/phpreact/add-user.php',{
           name:this.Name.value,
           email:this.Email.value,
           Password:this.Password.value,
  
       })
       .then(function ({data}) {


           if(data.success == 1){


               
               // this.context.addNewUser(data.id,this.Name.value,
               //  this.Email.value,
               //  this.Password.value,
               //  this.Users.value);
               event.target.reset();


               alert(data.msg);

                this.props.history.push("patients");


           }
           else{
               alert(data.msg);
           }
       }.bind(this))
       .catch(function (error) {
       // console.log(error);
       });

   }

      render(){


       if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 1  ){

return (<Redirect to={'/PatientsDashboard'}/>)
}else {



}

        return (
        
            <form onSubmit={this.insertUser}>
                    <h3>Register</h3>
                    <div className="form-group col-6">
                    <label>Name</label>
                    <input type="text" className="form-control " placeholder="Enter Name" ref={(val)=>this.Name=val} />
                </div>
                    <div className="form-group col-6">
                        <label>Email</label>
                        <input type="email" className="form-control " placeholder="Enter Email ID" ref={(val)=>this.Email=val} />
                    </div>
    
                    <div className="form-group col-6">
                        <label>Password</label>
                        <input type="password" className="form-control " placeholder="Enter password" ref={(val)=>this.Password=val} />
                    </div>
                    <div class="form-group col-6">


    </div>
    
                  
    
                    <button type="submit" className="btn btn-primary">Submit</button>&nbsp;
                
                   
                </form>
        );
      }
        
      
    }

    

 
export default Register;