import React ,{Component} from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import Axios from 'axios';
import {AppContext} from './Context';
import Home from './Home';
import  { Redirect } from 'react-router-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import ProviderRegister from './ProviderRegister';
import { Helmet } from 'react-helmet';
import Providerdashboard from './Providerdashboard';

    


  class Providers extends Component{
   static contextType=AppContext;

   validateProvider=(event)=>{
       event.preventDefault();
       event.persist();
       Axios.post('http://react.vitruvio.ca/phpreact/providerlogin.php',{

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

              sessionStorage.setItem('userData',data.id);
               sessionStorage.setItem('usertype',data.type);

 window.location.reload(false);
                this.props.history.push("Providerdashboard");


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

   if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 2  ){

return (<Redirect to={'/Providerdashboard'}/>)

}else {



}


   return (
        <div class="container-fluid">
        <Helmet>
<title>Vitruvio - Provider Login</title>
</Helmet>
        <form class="formPatient" onSubmit={this.validateProvider}>
        <h2 class="formh2">Login into Your Provider Account</h2>

        <div class="forminput">
       
        <input type="email" className="form-control" placeholder="Username or Email Address"  ref={(val)=>this.Email=val}  />
    </div>

    <div class="forminput">
    
        <input type="password" className="form-control" placeholder="Password"  ref={(val)=>this.Password=val} />
    </div>
        

      <button type="submit" className="btn btn-primary">Login</button>&nbsp;



       
    </form>
    <h6>Lost your password?| <a href="/ProviderRegister" class="btn">Register</a></h6>
  
    </div>
       
            
    );

 }
 }

 
 
export default Providers;