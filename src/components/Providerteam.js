import React, { Component } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {Redirect} from 'react-router-dom'; 
 
import {  MDBDataTable, Row, Col, Card, CardBody  } from 'mdbreact';

 import Home from './Home';
 import Axios from 'axios';
import {AppContext} from './Context';
class Providerteam extends Component {

       constructor(props) {
        super(props);
   this.state = {
    posts: [],
       users:[],
    isLoading: true,
      file:null,
    errors: null
  };

  
      this.onChange = this.onChange.bind(this)
       this.uploadFile = this.uploadFile.bind(this)
        
}




   updatetProvider=(event)=>{

       // window.location.reload(false);
       event.preventDefault();
       let res =  this.uploadFile(this.state.file);
       console.log(res.data);
       event.persist();
       Axios.post('http://react.vitruvio.ca/phpreact/providerteam.php',{
           name:this.Name.value,
           title:this.Title.value,
                   
           id:sessionStorage.getItem('userData'),
       },{

         headers: {
                'content-type': 'multipart/form-data'
            }
  
       })
       .then(function ({data}) {


           if(data.success == 1){

               event.target.reset();
               alert(data.msg);
               window.location.reload(false);
                // this.props.history.push("patients");
           }
           else{
               alert(data.msg);
           }
       }.bind(this))
       .catch(function (error) {
       // console.log(error);
       });

   }

 onChange(e) {
        this.setState({file:e.target.files[0]})
    }


 async uploadFile(file){
        

        const formData = new FormData();
        
        formData.append('avatar',file)
        formData.append('user',sessionStorage.getItem('userData'))
        formData.append('name',this.Name.value)
        formData.append('title',this.Title.value)
              return  await Axios.post('http://react.vitruvio.ca/phpreact/providerteam.php', formData,{
            headers: {
                'content-type': 'multipart/form-data'
            }
        });

      }


  componentWillMount=async() => {

    // await Axios.get(url)

     Axios.post('http://react.vitruvio.ca/phpreact/pharmacyteam.php',{
            id:sessionStorage.getItem('userData'),
            
         })

      .then(response => response.data)

      .then(data => {

         console.log(data.data);
      
         // if (err) throw err;

         this.setState({ posts: data.data })

      })

      .then(async() => {

         this.setState({ tableRows:this.assemblePosts(), isLoading:false })

         // console.log(this.state.tableRows);

      });

  }




    handleDelete = (id) => {
  
        
        Axios.post('http://react.vitruvio.ca/phpreact/providerteam-delete.php',{
            id:id
        })
        .then(({data}) => {
            if(data.success === 1){
               alert(data.msg);
                window.location.reload(false);
            }
            else{
                alert(data.msg);

            }
        })
        .catch(error => {
            console.log(error);
        });
    }




  assemblePosts= () => {

    let posts =this.state.posts.map((post) => {

      return (

        {
          name: post.name,
          title: post.title,
          image: (<img src={post.photo} class="img-fluid" /> ),
          // action:(<a href={'/Providerview?pval=' + post.tid}  defaultvalue={post.pid}>Delete member </a>),
          action:( <button onClick={() => this.handleDelete(post.tid)} className="btn btn-danger">Delete</button>),

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

         label: 'Name',
       field: 'name',

        },

        {

        label: 'Title',
       field: 'title',
        },

        {

          label: 'Image',
       field: 'image',
        }, {

       label: 'Action ',
       field: 'action',

        }, 

      ],

      rows:this.state.tableRows,

    }



if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 2  ){
}else {
return (<Redirect to={'/'}/>)
}

    return (
           <div>
        <form onSubmit={this.updatetProvider} >
          <h1>Provider Team</h1>


                <div className="form-group col-6">
                <label>Photograph</label>
               <input type="file" className="form-control " onChange={this.onChange} />
            </div>
       
                <div className="form-group col-6">
                <label>Name</label>
             <input type="text" className="form-control "  placeholder="Enter Name"  ref={(val)=>this.Name=val} />
   
            </div>
                <div className="form-group col-6" >
                    <label>Title</label>
                    <input type="text" className="form-control "  placeholder="Enter Name"  ref={(val)=>this.Title=val} />
                </div>
    
                   &nbsp;&nbsp;  <button type="submit" className="btn btn-primary " >Add</button> &nbsp;


            </form>


                     
                              <Card>
                             <center>  <h1> Team Member  </h1> </center>
                                  <CardBody>

                                              <MDBDataTable

                                              striped

                                              bordered

                                              hover

                                              data={data}

                                              />

                                  </CardBody>
                              </Card>

                        </div>





    );
}
}
 
export default Providerteam;