import React, { Component } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import Providerview from './Providerview';
 import {Redirect} from 'react-router-dom'; 
import {  MDBDataTable, Row, Col, Card, CardBody  } from 'mdbreact';
 import Axios from 'axios';
 


    
 class Customerbookservice extends Component {

  
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


     Axios.post('http://react.vitruvio.ca/phpreact/Pharmacypatient.php',{
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
          Pharmacyid:post.pid,
           phname: post.name,

           address: post.address,

           city: post.city,

          pin: post.postcode,
          freelimit: post.freelimit,
          Order:(<a href={'/Providerview?pval=' + post.pid}  defaultvalue={post.pid}>Book Order </a>),
    
    

        }

      )

    });

    return posts;

  }


  render() {



    const data = {

      columns: [

        {

          label:'Id',

          field:'Pharmacyid',

        },

        {

         label: 'Pharmacy Name',
            field: 'phname',

        },

        {

        label: 'Address',
             field: 'address',

        },

        {

          label: 'City',
           field: 'city',

        }, {

        label: 'Pincode',
           field: 'pin',

        },  {

         label: 'Free Limit',
           field: 'freelimit',

        }, {

        label: 'Order',
            field: 'Order',
        },

      ],

      rows:this.state.tableRows,

    }

   if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 1  ){


}else {

return (<Redirect to={'/'}/>)

}

    return (
      // <RowclassName="mb-4">

      //   <Col md="12">

          <Card>

        <h1>Booking Service </h1>
 

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

export default Customerbookservice;
