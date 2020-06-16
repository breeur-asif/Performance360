import React, { Component } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {Redirect} from 'react-router-dom'; 

import {  MDBDataTable, Row, Col, Card, CardBody  } from 'mdbreact';
 import Axios from 'axios';

class Providerorder extends Component {
  
  constructor(props) {

    super(props);

    this.state= {

      posts: [],

      isLoading:true,

      tableRows: [],

    };

  }




  componentWillMount=async() => {

    // await Axios.get(url)

     Axios.post('http://react.vitruvio.ca/phpreact/pharmacyorder.php',{
            id:sessionStorage.getItem('userData'),
            
         })

      .then(response => response.data)




      .then(data => {

         console.log(data.data);
         // alert(data.data);

         // if (err) throw err;

         this.setState({ posts: data.data })

      })

      .then(async() => {

         this.setState({ tableRows:this.assemblePosts(), isLoading:false })

         // console.log(this.state.tableRows);

      });

  }




  assemblePosts= () => {

    let posts =this.state.posts.map((post) => {




      return (

        {

           bid: post.bid,

           upload: post.upload,

           description: post.description,

          name: post.name,
          email: post.email,
     
          date: post.date,
          time: post.time,
          reason: post.reason,
          status: post.status,

        }

      )

    });

    return posts;

  }


  render() {

    const data = {

      columns: [

        // {

        //   label:'#',

        //   field:'number',

        // },

        {

         label: 'OrderID',
       field: 'bid',

        },

        {

        label: 'Prescription',
       field: 'upload',
        },

        {

          label: 'Description',
       field: 'description',
        }, {

       label: 'Patient Name',
       field: 'name',

        }, {

        label: 'email',
       field: 'email',

        }, {

         label: 'Date',
       field: 'date',

        }, {

       label: 'Time',
       field: 'time',
        }, {

       label: 'Notes',
        field: 'reason',
        },{

      label: 'Status',
        field: 'status',
        },

      ],

      rows:this.state.tableRows,

    }


   if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 2  ){


}else {

return (<Redirect to={'/'}/>)

}


    return (
      // <RowclassName="mb-4">

      //   <Col md="12">

          <Card>

        <h1>Provider  Orders</h1>
       <div class="row">
        <a href="#" class="btn btn-primary btn-lg" >ALL</a>    
        <a href="#" class="btn btn-primary btn-lg" >PLACED</a>    
        <a href="#" class="btn btn-primary btn-lg" >ACCEPTED</a>    
         <a href="#" class="btn btn-primary btn-lg" >REJECTED</a>
         <a href="#" class="btn btn-primary btn-lg" >DELIVERED</a>
 </div>

            <CardBody>

              <MDBDataTable

                striped

                bordered

                hover

                data={data}

              />

            </CardBody>

          </Card>

        // </Col>

      // </Row>

    )

  }

}


 
export default Providerorder;
