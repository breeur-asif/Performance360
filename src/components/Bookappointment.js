
import React, { Component } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

 import {Redirect} from 'react-router-dom'; 
 import { MDBDataTable } from 'mdbreact';
 
 const DatatablePage = () => {
     const data = {
       columns: [
         {
           label: 'Provider Name',
           field: 'pname',
           sort: 'asc',
           width: 150
         },
           {
             label: 'Address',
             field: 'add',
             sort: 'asc',
             width: 100
           },
         {
           label: 'City',
           field: 'city',
           sort: 'asc',
           width: 200
         },
         {
           label: 'Pincode',
           field: 'pin',
           sort: 'asc',
           width: 100
         },
         {
           label: 'Free Limit',
           field: 'time',
           sort: 'asc',
           width: 100
         },
         {
           label: 'Book',
           field: 'Book',
           sort: 'asc',
           width: 100
         }
       ],
       rows: [
         
       ]
     };
   
     return (
       <MDBDataTable
         striped
         bordered
         small
         data={data}
       />
     );
   }
 class Bookappointment extends Component {
    render() {


       if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 1  ){


}else {

return (<Redirect to={'/'}/>)

}
        
        return (
            <div class="container-fluid">
        <h1>List of Healthcare Providers</h1>
        <label for="sel1">Type:</label>
        <select class="form-control" id="sel1" ref={(val)=>this.Users=val}>
          <option>Pharmacy</option>
          
     
        </select>
        <DatatablePage />
        </div>
           
                
        );
    }
   
}
 
export default Bookappointment;