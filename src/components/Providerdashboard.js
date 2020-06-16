import React, { Component } from 'react';
import Home from './Home'; 
import { NavLink } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Button ,Navbar ,Form ,Nav ,FormControl, Row ,} from 'react-bootstrap';
import {Redirect} from 'react-router-dom'; 
 import Axios from 'axios';
class Providerdashboard extends Component{

  constructor(props) {
        super(props);
   this.state = {
    posts: [],
    isLoading: true,
    errors: null
  };
        
}
    logout  =() => {


    sessionStorage.clear();
   this.props.history.push("/");
}



 getPosts() {
   
      Axios.post('http://react.vitruvio.ca/phpreact/providerdashboarddata.php',{
            id:sessionStorage.getItem('userData'),
         })
  
      .then(response => { 
        console.log(response);
        this.setState({
          posts: response.data.msg,
          isLoading: false
        });
      })

     
      .catch(error => this.setState({ error, isLoading: false }));
  }

  // Let's our app know we're ready to render the data
  componentDidMount() {

    this.getPosts();
  }


  
  render(){
   if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 2  ){


}else {

return (<Redirect to={'/'}/>)

}

  const { isLoading, posts } = this.state;
    return (
      <React.Fragment>

        <div>
          {!isLoading ? (
            posts.map(post => {

                         // const { _id, title, content } = post;
                        

 const { count ,totalorder } = post;
                        

    return (
      <div class="container-fluid">   
<h1>Completed Orders: {totalorder}</h1>
<h1>Free Orders Pending: {count}</h1>
 <footer>
 <div class="row">
 <div class="col-md-2">
 <img
 src={require('../images/logo.png')}
 width="100"
 height="100"
 className="d-inline-block align-top"
 alt="React Bootstrap logo"
/>
 </div>
 <div class="col-md-2">
 <h2>Core Link</h2>
 <p>Team Member</p>
 <p>Pricing Plan</p>
 <p>Google Plan</p>
 <p>App Store</p>
 <p>About Company</p>
 </div>
 <div class="col-md-2">
 <h2>Information</h2>
 <address>
 113 momo street,bd 721 NY 20012
 </address>
 <email>
 kabbohelp@gmail.com
 </email>

 <h5>+88 (0) 29292162</h5>
 </div>

 <div class="col-md-3">
 <h2>Stay in Loop</h2>
 <p>
 Subscribe to receive biweekly tips on creative automation and digital advertising!
 </p>
 <input type="email" placeholder="What's Your email"></input>
 </div>

 <div class="col-md-2">
 <h2>About Company</h2>
 <p>How it works</p>
 <p>Development</p>
 <p>Digital marketing</p>
 <p>Services</p>
 <p>Security</p>
 </div>

 </div>
 <div class="row">
 <div class="col-md-3"></div>
<div><Button>App Store</Button><Button>Play Store</Button>
<br/>
<p>&Company 2018 All rights reserved</p>
</div>
 </div>
 <div></div>
 </footer>

      </div>
   );
            })
          ) : (
            <p>Loading...</p>
          )}
        </div>
      </React.Fragment>
    );
  }
}
 

 
export default Providerdashboard;
