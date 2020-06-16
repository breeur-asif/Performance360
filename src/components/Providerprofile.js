
import React, { Component } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {Redirect} from 'react-router-dom'; 
 
 import Home from './Home';
 import Axios from 'axios';
import {AppContext} from './Context';
class Providerprofile extends Component {

       constructor(props) {
        super(props);
   this.state = {
    posts: [],
    isLoading: true,
      file:null,
    errors: null
  };

  
      this.onChange = this.onChange.bind(this)
       this.uploadFile = this.uploadFile.bind(this)
        
}

  onChange(e) {
        this.setState({file:e.target.files[0]})
    }


 async uploadFile(file){
        

        const formData = new FormData();
        
        formData.append('avatar',file)
        formData.append('user',sessionStorage.getItem('userData'))
      

    


        
        return  await Axios.post('http://react.vitruvio.ca/phpreact/update-providerprofile.php', formData,{
            headers: {
                'content-type': 'multipart/form-data'
            }
        });

      }

 

   updatetProvider=(event)=>{


       event.preventDefault();
       let res =  this.uploadFile(this.state.file);
       console.log(res.data);
       event.persist();
       Axios.post('http://react.vitruvio.ca/phpreact/update-providerprofile.php',{



           name:this.Name.value,
           email:this.Email.value,
           address:this.Address.value,
           city:this.City.value,
           postcode:this.Postcode.value,
           phone:this.Phone.value,

  
           type:this.Type.value,
           fax:this.Fax.value,

           about:this.About.value,
           what:this.What.value,
           freelimit:this.freelimit.value,


           image:this.state.file,
                   
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
           }
           else{
  
               alert(data.msg);
                 window.location.reload(false);    
           }
       }.bind(this))
       .catch(function (error) {
       // console.log(error);
       });

   }


 getPosts() {
   

      Axios.post('http://react.vitruvio.ca/phpreact/all-provider.php',{
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







    render() {
   

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
                        

 const { cid, name, email,address,city,postcode,phone,proxy,fax ,about,what,description,type,freelimit,logo} = post;
                        
  return (
        
 <form onSubmit={this.updatetProvider}>


          <h1>Provider Profile</h1>
           <img src={logo} alt="profile image" className="img-responsive"/>
          <div className="form-group col-6">
                <input type="file" className="form-control " onChange={this.onChange} />
            </div>
            <div className="form-group col-6">
          
            </div>
 
                <div className="form-group col-6">
                <label>Name</label>
                <input type="text" className="form-control "  defaultValue={name} placeholder="Enter Name"  ref={(val)=>this.Name=val} />
            </div>
                <div className="form-group col-6">
                    <label>Email</label>
                    <input type="email" className="form-control " defaultValue={email} placeholder="Enter Email ID" ref={(val)=>this.Email=val} />
                </div>
                <div className="form-group col-6">
                <label>Phone</label>
                <input type="number" className="form-control " placeholder="Enter Phone Number" defaultValue={phone} ref={(val)=>this.Phone=val} />
            </div>
            <div className="form-group col-6">
            <label>Fax</label>
            <input type="number" className="form-control " placeholder="Enter Fax Number" defaultValue={fax} ref={(val)=>this.Fax=val} />
        </div>
        <div className="form-group col-6">
        <label for="sel1">Type:</label>
        <select class="form-control" id="sel1"  defaultValue={type} ref={(val)=>this.Type=val}>
          <option>Pharmacy</option>
       
        </select>  </div>   
                <div className="form-group col-6">
                    <label>Address</label>
                    <input type="text" className="form-control " placeholder="Enter Address" defaultValue={address} ref={(val)=>this.Address=val} />
                </div>
                <div className="form-group col-6">
                    <label>City</label>
                    <input type="text" className="form-control " placeholder="Enter City" defaultValue={city} ref={(val)=>this.City=val} />
                </div>
                <div className="form-group col-6">
                    <label>Postcode</label>
                    <input type="text" className="form-control " placeholder="Enter Postcode" defaultValue={postcode} ref={(val)=>this.Postcode=val} />
                </div>
               

                <div className="form-group col-6">
                <label>About</label>
                <input type="text" className="form-control " placeholder="Enter Description" defaultValue={about} ref={(val)=>this.About=val} />
            </div>
            <div className="form-group col-6">
            <label>What does accessible healthcare mean to you?</label>
            <input type="text" className="form-control "  defaultValue={what} ref={(val)=>this.What=val}  />
        <label>How will you commit to making your service accessible</label>
            </div>
            <div className="form-group col-6">
            <label>I will provide 1 free prescription for every</label>
            <input type="text" className="form-control "   defaultValue={freelimit} ref={(val)=>this.freelimit=val} />
        <label>prescription</label>
            </div>

      
          
              

        &nbsp;&nbsp;  <button type="submit" className="btn btn-primary ">Update Information</button>&nbsp;
   
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
 
export default Providerprofile;