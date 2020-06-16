import React, { Component } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {Redirect} from 'react-router-dom'; 
import { Table } from 'semantic-ui-react';
import Axios from 'axios';
 
class Providersubscription extends Component {

  constructor(props) {

    super(props);

    this.state= {

      posts: [],

      isLoading:true,



    };

  }



 componentWillMount=async() => {

    // await Axios.get(url)

     Axios.post('http://react.vitruvio.ca/phpreact/checksubscription.php',{
            id:sessionStorage.getItem('userData'),
           
         })

      .then(response => response.data)




      .then(data => {

   

         this.setState({ posts: data.data })

      })

 

  }

    render() {


       if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 2  ){


}else {

return (<Redirect to={'/'}/>)

}


    return (
        <div className="container-fluid">
        <h1>Provider Payment</h1>
        <p>Your Subscription has {this.state.posts.date}</p>
       
       
        <Table striped bordered hover>
  <thead>
    <tr>
      <th>Plan</th>
      <th>Number of Prescription</th>
      <th>Price</th>
      <th>Select Plan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Basic</td>
      <td>1-100 prescriptions per month</td>
      <td>free</td>
      <td><a href={"https://web.na.bambora.com/scripts/payment/payment.asp?merchant_id=300207178&hashValue=7b52d51be12038d98ee5e4979e0751ca4dab8272&trnAmount=5&trnOrderNumber=" + sessionStorage.getItem('userData')}

      	className="btn btn-success" onClick={this.payPlan} defaultValue="5">Pay $5</a></td>
    </tr>
    <tr>
      <td>Silver</td>
      <td>100-1000 prescriptions per month</td>
      <td>$25 plus HST (13%)</td>
      <td><a href={"https://web.na.bambora.com/scripts/payment/payment.asp?merchant_id=300207178&hashValue=7b52d51be12038d98ee5e4979e0751ca4dab8272&trnAmount=15&trnOrderNumber=" + sessionStorage.getItem('userData')} className="btn btn-success" onClick={this.payPlan} defaultValue="15">Pay $15</a></td>
    </tr>
    <tr>
      <td>Platinum</td>
      <td>1000+ prescriptions per month</td>
      <td>$50 plus HST(13%)</td>
      <td><a href={"https://web.na.bambora.com/scripts/payment/payment.asp?merchant_id=300207178&hashValue=7b52d51be12038d98ee5e4979e0751ca4dab8272&trnAmount=25&trnOrderNumber=" + sessionStorage.getItem('userData')} className="btn btn-success" onClick={this.payPlan} defaultValue="25">Pay $25</a></td>
    </tr>
  </tbody>
</Table>
         <div class="row footsub">
          <div class="col-md-6">
          <footer style={{color:"#0e4958"}}>&copy; COPYRIGHT 2019 VITRUVIO.ALL RIGHTS RESERVED.</footer>
            </div>
          <div clas="col-md-6" style={{color:"#0e4958",paddingRight:"0px"}}>
          <a href="#" class="btn fa fa-facebook"></a>&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="#" class="btn fa fa-linkedin"></a>
          </div>
          </div>
        </div>
        
       
      

    );
}
}
 
export default Providersubscription;