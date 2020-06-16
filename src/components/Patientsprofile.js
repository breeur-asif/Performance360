
import React, { Component } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {Redirect} from 'react-router-dom';
import Home from './Home';
 import Axios from 'axios';
import {AppContext} from './Context';
class Patientsprofile extends Component {



   state = {
    posts: [],
    isLoading: true,
    errors: null
  };




       static contextType=AppContext;


   updatetUser=(event)=>{
       event.preventDefault();
       event.persist();
       Axios.post('http://react.vitruvio.ca/phpreact/update-userprofile.php',{
           name:this.Name.value,
           email:this.Email.value,
           address:this.Address.value,
           city:this.City.value,
           postcode:this.Postcode.value,
           phone:this.Phone.value,
           doctor:this.Doctor.value,
           proxy:this.Proxy.value,
           id:sessionStorage.getItem('userData'),

  
       })
       .then(function ({data}) {


           if(data.success == 1){

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


 getPosts() {
   

      Axios.post('http://react.vitruvio.ca/phpreact/all-users.php',{
            id:sessionStorage.getItem('userData'),
         })
  
      .then(response => { 

        console.log(response);


        this.setState({
          posts: response.data.users,
          isLoading: false
        });
      })

     
      .catch(error => this.setState({ error, isLoading: false }));
  }

  // Let's our app know we're ready to render the data
  componentDidMount() {
    this.getPosts();
  }
  // Putting that data to use
  render() {

       if (sessionStorage.getItem('userData') >= 0 && sessionStorage.getItem('usertype') == 1  ){


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
                        

                          const { cid, name, email,address,city,postcode,phone,doctor,proxy } = post;
                        
  return (
        
        <form onSubmit={this.updatetUser}>
          <h1>Customer Profile</h1>
                <div className="form-group col-6">
                <label>Name</label>
                <input type="text" className="form-control " id= "name1" defaultValue={name} placeholder="Enter Name"  ref={(val)=>this.Name=val}/>
            </div>
                <div className="form-group col-6">
                    <label>Email</label>
                    <input type="email" className="form-control " id= "email1" defaultValue={email} placeholder="Enter Email ID" ref={(val)=>this.Email=val} />
                </div>

                <div className="form-group col-6">
                    <label>Address</label>
                    <input type="text" className="form-control " placeholder="Enter Address" defaultValue={address} ref={(val)=>this.Address=val} />
                </div>
                <div className="form-group col-6">
                    <label>City</label>
                    <input type="text" className="form-control " placeholder="Enter City"  defaultValue={city}  ref={(val)=>this.City=val} />
                </div>
                <div className="form-group col-6">
                    <label>Postcode</label>
                    <input type="text" className="form-control " placeholder="Enter Postcode" defaultValue={postcode} ref={(val)=>this.Postcode=val} />
                </div>
                <div className="form-group col-6">
                    <label>Phone</label>
                    <input type="number" className="form-control " placeholder="Enter Phone Number" defaultValue={phone}  ref={(val)=>this.Phone=val} />
                </div>

                <div className="form-group col-6">
                <label>Family Doctor (Optional)</label>
                <input type="text" className="form-control " placeholder="Enter Family Doctor's Name" defaultValue={doctor} ref={(val)=>this.Doctor=val} />
            </div>
            <div className="form-group col-6">
            <label>Proxy (Optional)</label>
            <input type="text" className="form-control " placeholder="Enter Proxy" defaultValue={proxy} ref={(val)=>this.Proxy=val} />
        </div>

      
          
              

        &nbsp;&nbsp;  <button type="submit" className="btn btn-primary ">Update</button>&nbsp;
   
            </form>
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
 
export default Patientsprofile;